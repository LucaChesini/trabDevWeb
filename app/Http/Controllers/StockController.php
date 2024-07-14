<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
{
    $products = Product::get();

    return view('stock.index', [
        'products' => $products
    ]);
}

public function edit($id)
{
    $product = Product::findOrFail($id);

    return view('stock.edit', compact('product'));
}

}
