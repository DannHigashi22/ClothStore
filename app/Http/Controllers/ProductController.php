<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getAll(){
        $products=Product::all();
        return view('admin.product.products',['products'=>$products]);
    }

    public function create(){
        $categories=Category::all();

        if($categories->isEmpty()){
            return redirect()->route('a-products')->with(['message_error'=>'No puede crear un producto sin una categoria creada']);
        }
        return view('admin.product.create',['categories'=> $categories]);
    }

    public function save(Request $request){
       $validate=$this->validate($request, [
            'name' => ['required','not_regex:/[0-9|_|-|$|@]/','max:50','unique:products,name'],
            'description' => ['required','string'],
            'price' => ['required','int'],
            'stock' => ['required','int'],
            'barcode' => ['required','int','unique:products,barcode'],
            'category' => ['required','int','exists:App\Models\Category,id'],
            'images'=>['required','array','max:4'],
            'images.*'=>['mimes:jpeg,png,jpg,svg','image','max:2048']
        ]);
        if($images =$request->file('images')){
            $product=new Product();
            $product->name=Str::ucfirst($request->input('name'));
            $product->description=Str::ucfirst($request->input('description'));
            $product->price=$request->input('price');
            $product->stock=$request->input('stock');
            $product->barcode=$request->input('barcode');
            $product->category_id=$request->input('category');

            $product->save();
           
           foreach ($images as $image) {
            $image_path=time().$image->getClientOriginalName();
            Storage::disk('images')->put($image_path,\File::get($image));
           
            $product->images()->create([
                'image_path'=>$image_path
            ]);
           }        
        }
        return \redirect()->route('a-products')->with(['message'=>'Producto añadido correctamente']);
        
    }

    public function getOne($id){
        $product=Product::findorfail($id);
        return view('admin.product.product',['product'=>$product]);
    }

    public function getImage($filename){
        $file=Storage::disk('images')->get($filename);
        return new Response($file,200);
    }
    

    /*public function edit($id){
        $cate=Product::findorfail($id);
        return view('admin.category.category-edit',['category'=>$cate]);
    }

    public function update(Request $request){
        $validate=$this->validate($request,[
            'id'=>['exists:App\Models\Category,id'],
            'name'=>['required','not_regex:/[0-9|_|-|$|@]/','string','unique:categories,$id']
        ]);
        $id=$request->input('id');
        $name=$request->input('name');
        $cate=Product::find($id);
        $cate->name=$name;

        $cate->update();

        return redirect()->route('a-categories')->with(['message'=>'Categoria actualizada correctamente']);
    }
    public function delete($id){
        $cate=Product::findorfail($id);
        $cate->delete();
        return redirect()->route('a-categories')->with(['message'=>'Categoria borrada correctamente']);
    }*/

}
