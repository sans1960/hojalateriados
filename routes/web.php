<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductoController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/admin/categories', CategoryController::class)->middleware('auth')->names('admin.categories');
Route::resource('/admin/subcategories', SubCategoryController::class)->middleware('auth')->names('admin.subcategories');
Route::resource('/admin/productos', ProductoController::class)->middleware('auth')->names('admin.productos');
Route::get('get-subcategories',[ProductoController::class,'getSubcategories'])->middleware('auth')->name('getsubcategories');
