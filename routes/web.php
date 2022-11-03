<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/admin/users',[AdminController::class,'allUsers'])->name('a-users');
    Route::get('/admin/user/register',[AdminController::class,'userRegister'])->name('a-user-register');
    Route::post('/admin/user/save',[AdminController::class,'userSave'])->name('a-user-save');
    Route::get('/admin/product/create',[AdminController::class,'productCreate'])->name('a-product-create');
    Route::post('/admin/product/save',[AdminController::class],'productSave')->name('a-product-save');
});
