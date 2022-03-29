<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('dashboard',compact('users'));
})->name('dashboard');


// All category

Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/pdelete/category/{id}',[CategoryController::class, 'Pdelete']);
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit'])->name('Edit');
Route::post('/category/update/{id}',[CategoryController::class, 'Update']);


//all product

Route::get('/product/all',[ProductController::class, 'AllProduct'])->name('all.product');
Route::post('/product/add',[ProductController::class, 'AddProduct'])->name('store.product');
Route::get('/prdelete/product/{id}',[ProductController::class, 'Prdelete']);


Route::get('/image/all',[ImageController::class, 'AllImage'])->name('all.image');
Route::post('/image/add',[ImageController::class, 'AddImage'])->name('store.image');
