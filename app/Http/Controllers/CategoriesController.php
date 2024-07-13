<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.list', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $category = new Category();

        return view('categories.form', [
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ],[
            'name.required' => 'O campo de nome deve ser preenchido',
            'description.required' => 'O campo de descrição deve ser preenchido'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $category = new Category([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.form', [
            'category' => $category
        ]);
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ],[
            'name.required' => 'O campo de nome deve ser preenchido',
            'description.required' => 'O campo de descrição deve ser preenchido'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
