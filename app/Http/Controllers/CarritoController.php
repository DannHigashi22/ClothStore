<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CarritoController extends Controller{
    public function index(){
        $cart=\Cart::getContent();
        return view('carrito.index',['cart'=>$cart]);
    }

    public function add(Request $request){
        $slug=$request->input('product');
        $product=Product::where('slug','=',$slug)->firstOrFail();
        \Cart::add(array(
            'id'=>"40".$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'quantity'=>1,
            'attributes'=>array(
                'image'=>$product->images[0]->image_path,
            )
        )
        );
        return redirect()->route('cart');
    }

    public function update(Request $request){
        $validate=$this->validate($request, [
            'id'=>['required','int'],
            'quantity'=>['required','integer','between:1,10']
        ]);
        
        if(($request->input('quantity'))!=0){
            \Cart::update($request->id,array(
                'quantity'=>[
                    'relative'=>false,
                    'value'=>$request->input('quantity')
                ]
            ));
        }

        return redirect()->route('cart');
    }

    public function remove(Request $request){
        $validate=$this->validate($request, [
            'id'=>['required','int']
        ]);
        \Cart::remove($request->id);

        return redirect()->route('cart');
    }

    public function clear(){
        if(!\Cart::isEmpty()){
            \Cart::clear();
        }
        return redirect()->route('cart');
    }

}
