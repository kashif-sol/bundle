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
    Route::get('/', [MasterProductController::class, 'bundle'])->name('home');
    Route::get('create-bundle/{id?}', [MasterProductController::class, 'createbundle']);
    Route::delete('bundle/{id}', [MasterProductController::class, 'destroy'])->name('bundle.destroy');
    Route::get('productview/{id?}', [MasterProductController::class, 'view'])->name('bundle.view');
    Route::post('product', [ProductController::class, 'index']);

    Route::post('sku', [ProductController::class, 'sku']);
    Route::post('save-prod', [ProductController::class, 'prod_save']);
    Route::post('save-product', [MasterProductController::class, 'index']);
});
