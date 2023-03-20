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
    /* Admin Functions*/
    public function getAll(){
        $products=Product::all();
        return view('admin.product.p-all',['products'=>$products]);
    }

    public function create(){
        $categories=Category::all();

        if($categories->isEmpty()){
            return redirect()->route('a-products')->with(['message_error'=>'No puede crear un producto sin una categoria creada']);
        }
        return view('admin.product.p-create',['categories'=> $categories]);
    }

    public function save(Request $request){
       $validate=$this->validate($request, [
            'name' => ['required','not_regex:/[0-9|_|-|$|@]/','max:50','unique:products,name'],
            'description' => ['required','string'],
            'price' => ['required','int'],
            'stock' => ['required','int'],
            'barcode' => ['required','int','unique:products,barcode'],
            'category' => ['required','exists:App\Models\Category,id','int'],
            'images'=>['required','array','max:4'],
            'images.*'=>['mimes:jpeg,png,jpg,svg','image','max:2048']
        ]);
        if($images =$request->file('images')){
            $product=new Product();
            $product->name=Str::ucfirst($request->input('name'));
            $product->slug=Str::slug($request->input('name'),'-');
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

    public function getOne($slug){
        $product=Product::where('slug','=',$slug)->firstOrFail();
        return view('admin.product.p-detail',['product'=>$product]);
    }

    public function getImage($filename){
        $file=Storage::disk('images')->get($filename);
        return new Response($file,200);
    }
    

    public function edit($slug){
        $product=Product::where('slug','=',$slug)->firstOrFail();
        $cate=Category::all();
        return view('admin.product.p-edit',[
            'product'=>$product,
            'categories'=>$cate]);
    }

    public function update(Request $request){
        $id=$request->input('id');
        $validate=$this->validate($request, [
            'id'=>['required','exists:App\Models\Product,id'],
            'name' => ['required','not_regex:/[0-9|_|-|$|@]/','max:50',"unique:products,name,$id"],
            'description' => ['required','string'],
            'price' => ['required','int'],
            'stock' => ['required','int'],
            'barcode' => ['required','int',"unique:products,barcode,$id"],
            'category' => ['required','int','exists:App\Models\Category,id'],
            'images'=>['array','max:4'],
            'images.*'=>['mimes:jpeg,png,jpg,svg','image','max:2048']
        ]);
        $product=Product::findorfail($id);
        $product->name=Str::ucfirst($request->input('name'));
        $product->slug=Str::slug($request->input('name'),'-');
        $product->description=Str::ucfirst($request->input('description'));
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->barcode=$request->input('barcode');
        $product->category_id=$request->input('category');

        $product->save();
        if($images =$request->file('images')){
            foreach ($product->images as $img) {
                Storage::disk('images')->delete($img->image_path);
            }
            $product->images()->delete();

            foreach ($images as $image) {
                $image_path=time().$image->getClientOriginalName();
                Storage::disk('images')->put($image_path,\File::get($image));
               
                $product->images()->create([
                    'image_path'=>$image_path
                ]);
            }       
        }
        return redirect()->route('a-products')->with(['message'=>'Producto actualizada correctamente']);
    }

    public function delete(Request $request){
        $id=$request->id;
        $product=Product::findorfail($id);
        foreach ($product->images as $img) {
            Storage::disk('images')->delete($img->image_path);
        }
        $product->images()->delete();
        $product->delete();
        return redirect()->route('a-products')->with(['message'=>'Producto borrada correctamente']);
    }

    /*Store Functions*/

    public function getProduct($slug){
        $product=Product::where('slug','=',$slug)->firstOrFail();
        return view('products.product',['product'=>$product]);
    }

    public function searchProduct(Request $request){
        $validate=$this->validate($request, [
            'search' => ['required','not_regex:/[0-9|_|-|$|@]/','max:50']
        ]);
        $search=$request->input('search');
        $products=Product::where('name','LIKE','%'.$search.'%');

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
        return view('products.search',[
            'products'=>$products,
            'search'=>$search
        ]);
    }


}
