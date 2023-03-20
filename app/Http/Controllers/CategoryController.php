<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $cat->slug=Str::slug($name,'-');

        $cat->save();
        return \redirect()->route('a-categories')->with(['message'=>'Categoria añadida correctamente']);
    }

    public function edit($slug){
        $cate=Category::where('slug','=',$slug)->firstOrFail();
        return view('admin.category.c-edit',['category'=>$cate]);
    }

    public function update(Request $request){
        $id=$request->input('id');
        $validate=$this->validate($request,[
            'id'=>['exists:App\Models\Category,id'],
            'name'=>['required','not_regex:/[0-9|_|-|$|@]/','string',"unique:categories,name,$id"]
        ]);
        
        $name=$request->input('name');

        $cate=Category::find($id);
        $cate->name=$name;
        $cate->slug=Str::slug($name,'-');

        $cate->update();

        return redirect()->route('a-categories')->with(['message'=>'Categoria actualizada correctamente']);
    }
    public function delete(Request $request){
        $id=$request->id;
        $cate=Category::findorfail($id);
        $cate->delete();
        return redirect()->route('a-categories')->with(['message'=>'Categoria borrada correctamente']);
    }

    /*Store functions */
    public function getProductsCat($slug){
        $category=Category::where('slug','=',$slug)->firstOrFail();
        $products=Product::where('category_id','=',$category->id);
        if (isset($_GET['sort']) && !empty($_GET['sort'])) {
            $sort=$_GET['sort'];
            switch ($sort) {
                case 'name':
                    $products->orderBy('name','Asc');
                    break;
                
                case 'price':
                    $products->orderby('price','Asc');
                    break;
                
                case 'most-sale':
                    $products->orderby('stock','Asc');
                    break;    
            }
        }
        $products=$products->get();
        return view('products.category',[
            'category'=>$category,
            'products'=>$products]);
    }
}