<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::where(function($q) use($request){
            return $q->when($request->search,function($query) use($request){
                return $query->where('name' , 'like' , '%' . $request->search . '%')
                ->orWhere('slug','like','%' . $request->search . '%');
            });
        })->latest()->paginate(3);
        return view('admin.category.index',compact('categories'));

    }


    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {

        try{
            $data = $this->validate(request(),[
                'name'              => 'required',
                'slug'              => 'required',

            ],[],[]);

            Category::create($data);

            session()->flash('success' , ('Category Added Successfully'));

            return redirect()->route('categories.index');

        }
        catch (\Exception $ex){

             session()->flash('error' , ('هناك خطا في البيانات'));

            return redirect()->route('categories.index');
        }
    }



    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        try{

            $categories = Category::find($id);

            $data = $this->validate(request(),[
                'name'              => 'required',
                'slug'              => 'required',

            ],[],[]);



            $categories->update($data);


            session()->flash('success' , (' Updated Successfully'));

            return redirect()->route('categories.index');

        }
        catch (\Exception $ex){

            session()->flash('error' , ('هناك خطا'));

            return redirect()->route('categories.index');
        }
    }


    public function destroy($id)
    {
       Category::find($id)->delete();


       session()->flash('success' , ('Deleted Successfully'));

       return redirect()->route('categories.index');
    }
}
