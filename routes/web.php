<?php

use App\Http\Controllers\MasterProductController;
use App\Http\Controllers\ProductController;
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
Route::group(['middleware' => 'verify.shopify'], function () {
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::post('product',[ProductController::class,'index']);
Route::post('sku',[ProductController::class,'sku']);
Route::post('save-product',[MasterProductController::class,'index']);
// Route::post('all-product',[ProductController::class,'index']);
});
