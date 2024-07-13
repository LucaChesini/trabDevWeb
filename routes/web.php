<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
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
    return view('home');
});

Route::prefix('categories')->group(function() {
    Route::get('', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
});

Route::prefix('brands')->group(function() {
    Route::get('', [BrandsController::class, 'index'])->name('brands.index');
    Route::get('create', [BrandsController::class, 'create'])->name('brands.create');
    Route::post('', [BrandsController::class, 'store'])->name('brands.store');
    Route::get('{id}', [BrandsController::class, 'edit'])->name('brands.edit');
    Route::put('{id}', [BrandsController::class, 'update'])->name('brands.update');
    Route::delete('{id}', [BrandsController::class, 'destroy'])->name('brands.destroy');
});


Route::prefix('products')->group(function() {
    Route::get('', [ProductsController::class, 'show'])->name('products.index');
    Route::post('', [ProductsController::class, 'store'])->name('products.store');
    Route::put('{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::put('{id}/adiciona-estoque', [ProductsController::class, 'adicionaEstoque'])->name('products.adiciona-estoque');
    Route::put('{id}/remove-estoque', [ProductsController::class, 'removeEstoque'])->name('products.remove-estoque');
    Route::put('{id}/balanceia-estoque', [ProductsController::class, 'balanceiaEstoque'])->name('products.balanceia-estoque');
});