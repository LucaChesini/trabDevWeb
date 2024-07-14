<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('products.form', [
            'brands' => $brands,
            'categories' => $categories 
        ]);
    }

        

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $path = $request->file('photo')->store('photos', 'public');

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'photo' => $path,
            'photo_mini' => $path,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.edit', compact('product', 'brands', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo' => 'nullable|image',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $product->photo = $path;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();


        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso.');
    }

    public function adicionaEstoque($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "stock" => "required"
        ],[
            "stock.required" => "O campo de estoque deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
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
            return redirect()->back()->withErrors($validator)->withInput();
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
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);

        $product->stock = $request->stock;

        $product->save();

        return response()->json(['product' => $product]);
    }
}
