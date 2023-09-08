<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        if (empty($params))
            return ControllerFactory::getAll(Category::class, 'category.index')();
        return ControllerFactory::getWhere(Category::class, 'category.index')($params);
    }

    public function show($id)
    {
        return ControllerFactory::getOne(Category::class, 'category.show')($id);
    }




    public function store(Request $request)
    {
        return ControllerFactory::createOne(
            Category::class,
            [
                'name' => 'required',
                'description' => 'required',
                'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        )($request);
    }




    public function update(Request $request, $id)
    {   
        return ControllerFactory::updateOne(
            Category::class,
            [
                'name' => 'required',
                'description' => 'required',
                'banner' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]
        )($id, $request);
    }

    public function destroy($id)
    {
        return ControllerFactory::deleteOne(Category::class)($id);
    }

    public function create()
    {
        $categories = Category::get();
        return view('category.create', compact('categories'));
    }
    public function edit($id, Request $request)
    {
        //must do it recursivley to eleminate all children. but nah
        $category = Category::find($id);
        $categories = Category::where('parent_id', '!=', $id)->orWhereNull('parent_id')->where('id', '!=', $id)->get();
        return view('category.edit', compact('category', 'categories'));
    }
}
