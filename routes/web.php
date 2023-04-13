<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', [HomeController::class, 'redirectUser'])->name('home');
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/product/{slug}',[ProductController::class,'getProduct'])->name('s-product');
Route::get('/product',[ProductController::class,'searchProduct'])->name('search');
Route::get('/category/{slug}',[CategoryController::class,'getProductsCat'])->name('s-category');

//carrito routes
Route::get('/cart',[CarritoController::class,'index'])->name('cart');
Route::post('/cart-add',[CarritoController::class,'add'])->name('add-cart');
Route::post('/cart-remove',[CarritoController::class,'remove'])->name('cart-remove');
Route::post('/cart-update',[CarritoController::class,'update'])->name('cart-update');
Route::get('/cart-clear',[CarritoController::class,'clear'])->name('cart-clear');


Auth::routes();

Route::middleware([Admin::class])->group(function(){
    Route::get('/admin',[AdminController::class,'dashboard'])->name('admin');
    Route::get('/admin/analytics',[AdminController::class,'analytics'])->name('a-analytics');
    //users
    Route::get('/admin/users',[AdminController::class,'allUsers'])->name('a-users');
    Route::get('/admin/users/register',[AdminController::class,'userRegister'])->name('a-user-register');
    Route::post('/admin/users/save',[AdminController::class,'userSave'])->name('a-user-save');
    Route::get('/admin/users/edit/{id?}',[UserController::class,'edit'])->name('a-user-edit');
    Route::post('/admin/users/edit/update/{id}',[UserController::class,'update'])->name('a-user-update');
    Route::delete('/admin/users/edit/delete',[UserController::class,'delete'])->name('a-user-delete');
    //category
    Route::get('/admin/categories',[CategoryController::class,'getAll'])->name('a-categories');
    Route::get('/admin/categories/create',[CategoryController::class,'create'])->name('a-category-create');
    Route::post('/admin/categories/save',[CategoryController::class,'save'])->name('a-category-save');
    Route::get('/admin/category/{slug}',[CategoryController::class,'getOne'])->name('a-category');
    Route::get('/admin/categories/edit/{slug}',[CategoryController::class,'edit'])->name('a-category-edit');
    Route::post('/admin/categories/update',[CategoryController::class,'update'])->name('a-category-update');
    Route::delete('/admin/categories/delete',[CategoryController::class,'delete'])->name('a-category-delete');
    //products 
    Route::get('/admin/products',[ProductController::class,'getAll'])->name('a-products');
    Route::get('/admin/products/create',[ProductController::class,'create'])->name('a-product-create');
    Route::post('/admin/products/save',[ProductController::class,'save'])->name('a-product-save');
    Route::get('/admin/products/{slug}',[ProductController::class,'getOne'])->name('a-product');
    Route::get('/admin/products/image/{filename}',[ProductController::class,'getImage'])->withoutMiddleware([Admin::class])->name('a-product-image');
    Route::get('/admin/products/edit/{slug}',[ProductController::class,'edit'])->name('a-product-edit');
    Route::post('/admin/products/update',[ProductController::class,'update'])->name('a-product-update');
    Route::delete('/admin/products/delete',[ProductController::class,'delete'])->name('a-product-delete');
    //orders
    Route::get('admin/orders',[AdminController::class,'allOrders'])->name('a-orders');
    Route::get('admin/order/{id}',[AdminController::class,'order'])->name('a-order');
});
