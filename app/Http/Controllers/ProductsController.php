<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function show()
    {
        $products = Product::with('brand')->with('category')->get();

        return response()->json(['products' => $products]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required",
            "price" => "required"
        ],[
            "name.required" => "O campo de nome deve ser preenchido",
            "description.required" => "O campo de descrição deve ser preenchido",
            "price.required" => "O campo de preço deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro na validação dos campos',
                'erros' => $validator->errors()
            ]);
            // return back()->withErrors($validator)->withInput();
        }

        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => 0,
            'photo' => $request->photo,
            'photo_mini' => $request->photo_mini,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);

        $product->save();

        return response()->json(['product' => $product]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "description" => "required"
        ],[
            "name.required" => "O campo de nome deve ser preenchido",
            "description.required" => "O campo de descrição deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro na validação dos campos',
                'erros' => $validator->errors()
            ]);
            // return back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->photo = $request->photo;
        $product->photo_mini = $request->photo_mini;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;

        $product->save();

        return response()->json(['product' => $product]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json(['product' => $product]);
    }

    public function adicionaEstoque($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "stock" => "required"
        ],[
            "stock.required" => "O campo de estoque deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro na validação dos campos',
                'erros' => $validator->errors()
            ]);
            // return back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);

        $product->stock += $request->stock;

        $product->save();

        return response()->json(['product' => $product]);
    }

    public function removeEstoque($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "stock" => "required"
        ],[
            "stock.required" => "O campo de estoque deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro na validação dos campos',
                'erros' => $validator->errors()
            ]);
            // return back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);

        if ($product->stock - $request->stock < 0) {
            $product->stock = 0;
        } else {
            $product->stock -= $request->stock;
        }

        $product->save();

        return response()->json(['product' => $product]);
    }

    public function balanceiaEstoque($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "stock" => "required"
        ],[
            "stock.required" => "O campo de estoque deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro na validação dos campos',
                'erros' => $validator->errors()
            ]);
            // return back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);

        $product->stock = $request->stock;

        $product->save();

        return response()->json(['product' => $product]);
    }
}
