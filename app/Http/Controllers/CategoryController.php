<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll(){
        $categories=Category::all();
        return view('admin.category.categories',['categories'=>$categories]);
    }

    public function create(){
        return view('admin.category.create');
    }

    public function save(Request $request){
        $validate=$this->validate($request, [
            'name' => 'required|alpha|max:25|unique:categories',
        ]);

    }
}
