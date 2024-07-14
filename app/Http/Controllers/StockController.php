<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Importar o Validator

class StockController extends Controller
{
    public function index()
{
    $products = Product::with('stock')->get();

    return view('stock.index', [
        'products' => $products
    ]);
}

public function edit($id)
{
    $product = Product::with('stock')->findOrFail($id);

    return view('stock.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'operation' => 'required|in:add,remove',
        'quantity' => 'required|integer|min:1'
    ],[
        'operation.required' => 'A operação é obrigatória',
        'operation.in' => 'Operação inválida',
        'quantity.required' => 'A quantidade é obrigatória',
        'quantity.integer' => 'A quantidade deve ser um número inteiro',
        'quantity.min' => 'A quantidade deve ser no mínimo :min'
    ]);

    if ($validator->fails()) {
        return redirect()->route('stock.edit', $id)
            ->withErrors($validator)
            ->withInput();
    }

    $product = Product::findOrFail($id);
    $stock = $product->stock;

    if ($stock) {
        if ($request->operation === 'add') {
            $stock->quantity += $request->quantity;
        } else if ($request->operation === 'remove') {
            $stock->quantity -= $request->quantity;
        }
        $stock->save();
    } else {
        Stock::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity
        ]);
    }

    return redirect()->route('stock.index')->with('success', 'Estoque atualizado com sucesso!');
}

}
