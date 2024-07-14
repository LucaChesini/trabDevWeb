<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('brands.list', [
            'brands' => $brands
        ]);
    }

    public function create()
    {
        $brand = new Brand();

        return view('brands.form', [
            'brand' => $brand
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            "name.required" => "O campo de nome deve ser preenchido",
            "photo.required" => "O campo de foto deve ser preenchido",
            'photo.mimes' => 'O arquivo deve ser uma imagem',
            'photo.max' => 'O arquivo deve ser menor que 2MB',
            'photo.image' => 'O arquivo deve ser uma imagem',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $brand = new Brand();
        $brand->name = $request->name;
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('brand_photos', 'public');
            $brand->photo = $photoPath;
        }
    
        $brand->save();

        return redirect()->route('brands.index');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('brands.form', [
            'brand' => $brand
        ]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            "name.required" => "O campo de nome deve ser preenchido",
            'photo.mimes' => 'O arquivo deve ser uma imagem',
            'photo.max' => 'O arquivo deve ser menor que 2MB',
            'photo.image' => 'O arquivo deve ser uma imagem',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $brand = Brand::find($id);

        $brand->name = $request->name;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('brand_photos', 'public');
            $brand->photo = $photoPath;
        }

        $brand->save();

        return redirect()->route('brands.index');
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return redirect()->route('brands.index');
    }
}
