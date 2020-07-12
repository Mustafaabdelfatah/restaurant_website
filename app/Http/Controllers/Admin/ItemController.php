<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Storage;
class ItemController extends Controller
{

    public function index(Request $request)
    {
        $items = Item::where(function($q) use($request){
            return $q->when($request->search,function($query) use($request){
                return $query->where('name' , 'like' , '%' . $request->search . '%');
            });
        })->latest()->paginate(3);
        return view('admin.item.index',compact('items'));

    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $rules = [
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ];

        $request->validate($rules);

        $request_data = $request->all();

        if ($request->image) {
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('/backend/img/items/'.$request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        Item::create($request_data);
        session()->flash('success', (' Item Added Successfully'));
        return redirect()->route('items.index');

        }



    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        return view('admin.item.edit',compact('item','categories'));
    }


    public function update(Request $request,Item $item)
    {

        try{
            $rules = [
                'category_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'image' => 'required|mimes:jpeg,jpg,bmp,png',
            ];

            $request->validate($rules);

            $request_data = $request->all();

            if ($request->image) {

                if ($item->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/backend/imag/item/' . $item->image);

                }//end of if

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('/backend/img/items/'.$request->image->hashName()));

                $request_data['image'] = $request->image->hashName();

            }//end of if

            $item->update($request_data);
            session()->flash('success', (' updated_successfully'));
            return redirect()->route('items.index');

        }catch(Exception $ex){
            dd($ex);
            session()->flash('error',  ('هناك خطا'));
            return redirect()->route('items.index');

        }


    }


    public function destroy(Item $item)
    {
        if($item->image != 'default.png'){

            Storage::disk('public_uploads')->delete('/backend/img/item'. $item->image);

        }// end of if

        $item->delete();


        session()->flash('success' , ('Deleted Successfully'));

        return redirect()->route('items.index');
    }
}
