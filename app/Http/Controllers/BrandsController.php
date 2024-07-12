<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandsController extends Controller
{
    public function show()
    {
        $brands = Brand::all();

        return response()->json(['brands' => $brands]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required"
        ],[
            "name.required" => "O campo de nome deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro na validação dos campos',
                'erros' => $validator->errors()
            ]);
            // return back()->withErrors($validator)->withInput();
        }

        $brand = new Brand([
            'name' => $request->name,
            'photo' => $request->photo,
        ]);

        $brand->save();

        return response()->json(['brand' => $brand]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required"
        ],[
            "name.required" => "O campo de nome deve ser preenchido"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro na validação dos campos',
                'erros' => $validator->errors()
            ]);
            // return back()->withErrors($validator)->withInput();
        }

        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->photo = $request->photo;

        $brand->save();

        return response()->json(['brand' => $brand]);
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        return response()->json(['brand' => $brand]);
    }
}
