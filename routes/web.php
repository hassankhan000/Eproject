<?php

use App\Http\Controllers\productCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function(){
    return view('dashboard.index');
});
Route::get('dashboard/product-category', [ProductCategoryController::class,'index']);
Route::get('dashboard/add-product-category', [ProductCategoryController::class,'addProductCategory']);
Route::post('dashboard/store-product-category', [ProductCategoryController::class,'storeProductCategory']);
Route::get('dashboard/edit-product-category/{id}', [productCategoryController::class, 'editProductCategory']);
Route::post('dashboard/update-product-category/{id}', [ProductCategoryController::class,'updateProductCategory']);
Route::get('dashboard/delete-product-category/{id}', [ProductCategoryController::class,'deleteProductCategory']);



Route::get('dashboard/product', [ProductController::class,'index']);
Route::get('dashboard/add-product', [ProductController::class,'addProduct']);
Route::post('dashboard/store-product', [ProductController::class,'storeProduct']);
Route::get('dashboard/edit-product/{id}', [productControllerProductController::class, 'editProduct']);
Route::post('dashboard/update-product/{id}', [ProductController::class,'updateProduct']);
Route::get('dashboard/delete-product/{id}', [ProductController::class,'deleteProduct']);
