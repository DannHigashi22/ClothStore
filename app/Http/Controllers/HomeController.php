<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function redirectUser(){
        $route='index';
        
        if(Auth::user()->role->name=='Admin'){
            $route='admin';
        }

        return redirect()->route($route);
    }

    public function index(){
        $categories=Category::all();
        $products=Product::all()->take(6);
        return view('index',[
            'products'=>$products
        ]);
    }
}
