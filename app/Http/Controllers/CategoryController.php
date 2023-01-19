<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getAll(){
        $categories=Category::all();
        return view('admin.category.c-all',['categories'=>$categories]);
    }

    public function create(){
        return view('admin.category.c-create');
    }

    public function save(Request $request){
        $validate=$this->validate($request, [
            'name' => ['required','not_regex:/[0-9|_|-|$|@]/','max:50','unique:categories'],
        ]);

        $name=Str::ucfirst($request->input('name'));

        $cat=new Category();
        $cat->name=$name;

        $cat->save();
        return \redirect()->route('a-categories')->with(['message'=>'Categoria añadida correctamente']);
    }

    public function edit($id){
        $cate=Category::findorfail($id);
        return view('admin.category.c-edit',['category'=>$cate]);
    }

    public function update(Request $request){
        $validate=$this->validate($request,[
            'id'=>['exists:App\Models\Category,id'],
            'name'=>['required','not_regex:/[0-9|_|-|$|@]/','string','unique:categories,$id']
        ]);
        $id=$request->input('id');
        $name=$request->input('name');
        $cate=Category::find($id);
        $cate->name=$name;

        $cate->update();

        return redirect()->route('a-categories')->with(['message'=>'Categoria actualizada correctamente']);
    }
    public function delete($id){
        $cate=Category::findorfail($id);
        $cate->delete();
        return redirect()->route('a-categories')->with(['message'=>'Categoria borrada correctamente']);
    }
}
