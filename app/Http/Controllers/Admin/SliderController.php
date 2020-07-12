<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Slider;
use Storage;


class SliderController extends Controller
{

    public function index(Request $request)
    {
        $sliders = Slider::where(function($q) use($request){
            return $q->when($request->search,function($query) use($request){
                return $query->where('title' , 'like' , '%' . $request->search . '%')
                ->orWhere('sub_title','like','%' . $request->search . '%');
            });
        })->latest()->paginate(3);
        return view('admin.slider.index',compact('sliders'));

    }

    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(Request $request)
    {
        try{

            $request->validate([
                'title'=> 'required',
                'sub_title'=> 'required',
                'image'=> 'required|mimes:jpg,jpeg,png',
            ]);

            $request_data = $request->except(['image']);

            if($request->image)
            {
                Image::make($request->image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/backend/img/slider/'.$request->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            }

            $sliders = Slider::create($request_data);

            session()->flash('success' , ('Slider Added Successfully'));

            return redirect()->route('slider.index');

        }
        catch (\Exception $ex){

            session()->flash('error' , ('هناك خطا في البيانات'));

            return redirect()->route('slider.index');
        }

    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try{
            $sliders = Slider::find($id);

            $request->validate([
                'title'=> 'required',
                'sub_title'=> 'required',
                'image' => 'required_without:id|mimes:jpg,jpeg,png',
            ]);

            $request_data = $request->except(['image']);

            if($request->image){

                if($sliders->image != 'default.png'){
                     Storage::disk('public_uploads')->delete('backend/img/slider/'.$sliders->image);
                }//end of inner if


                Image::make($request->image)->resize(300, null, function ($constraint) {

                    $constraint->aspectRatio();

                })->save(public_path('/backend/img/slider/'.$request->image->hashName()));

                $request_data['image'] = $request->image->hashName();
            }



            $sliders->update($request_data);


            session()->flash('success' , (' Updated Successfully'));

            return redirect()->route('slider.index');

        }
        catch (\Exception $ex){

            dd($ex);
            session()->flash('error' , __('هناك خطا'));

            return redirect()->route('slider.index');
        }

    }


    public function destroy(Slider $slider)
    {
        if($slider->image != 'default.png'){

            Storage::disk('public_uploads')->delete('/backend/img/slider'. $slider->image);

        }// end of if

        $slider->delete();

        session()->flash('success' , ('Deleted Successfully'));

        return redirect()->route('slider.index');
    }
}
