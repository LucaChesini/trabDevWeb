<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('categories')->group(function() {
    Route::get('', [CategoriesController::class, 'show']);
    Route::post('', [CategoriesController::class, 'store']);
    Route::put('{id}', [CategoriesController::class, 'update']);
    Route::delete('{id}', [CategoriesController::class, 'destroy']);
});

Route::prefix('brands')->group(function() {
    Route::get('', [BrandsController::class, 'show']);
    Route::post('', [BrandsController::class, 'store']);
    Route::put('/{id}', [BrandsController::class, 'update']);
    Route::delete('/{id}', [BrandsController::class, 'destroy']);
});


Route::prefix('products')->group(function() {
    Route::get('', [ProductsController::class, 'show']);
    Route::post('', [ProductsController::class, 'store']);
    Route::put('{id}', [ProductsController::class, 'update']);
    Route::delete('{id}', [ProductsController::class, 'destroy']);
    Route::put('{id}/adiciona-estoque', [ProductsController::class, 'adicionaEstoque']);
    Route::put('{id}/remove-estoque', [ProductsController::class, 'removeEstoque']);
    Route::put('{id}/balanceia-estoque', [ProductsController::class, 'balanceiaEstoque']);
});