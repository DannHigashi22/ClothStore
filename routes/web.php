<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;  

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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'redirectUser'])->name('home');

Route::middleware([Admin::class])->group(function(){
    Route::get('/admin',[AdminController::class,'dashboard'])->name('admin');
    //users
    Route::get('/admin/users',[AdminController::class,'allUsers'])->name('a-users');
    Route::get('/admin/user/register',[AdminController::class,'userRegister'])->name('a-user-register');
    Route::post('/admin/user/save',[AdminController::class,'userSave'])->name('a-user-save');
    Route::get('/admin/user/edit/{id}',[UserController::class,'edit'])->name('a-user-edit');
    Route::post('/admin/user/edit/update/{id}',[UserController::class,'update'])->name('a-user-update');
    Route::get('/admin/user/edit/delete/{id}',[UserController::class,'delete'])->name('a-user-delete');
    //category
    Route::get('/admin/categories',[CategoryController::class,'getAll'])->name('a-categories');
    Route::get('/admin/categories/create',[CategoryController::class,'create'])->name('a-category-create');
    Route::post('/admin/categories/save',[CategoryController::class,'save'])->name('a-category-save');
    Route::get('/admin/categories/edit/{id}',[CategoryController::class,'edit'])->name('a-category-edit');
    Route::post('/admin/categories/update/',[CategoryController::class,'update'])->name('a-category-update');
    Route::get('/admin/categories/delete/{id}',[CategoryController::class,'delete'])->name('a-category-delete');
    //products 
    Route::get('/admin/product',[ProductController::class,'getAll'])->name('a-products');
    Route::get('/admin/product/create',[ProductController::class,'create'])->name('a-product-create');
    Route::post('/admin/product/save',[ProductController::class,'save'])->name('a-product-save');
});
