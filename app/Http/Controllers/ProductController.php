<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();
        if (empty($params))
            return ControllerFactory::getAll(Product::class, 'product.index')();
        return ControllerFactory::getWhere(Product::class, 'product.index')($params);
    }

    public function show($id)
    {
        return ControllerFactory::getOne(Product::class, 'product.show')($id);
    }


    public function store(Request $request)
    {
        return ControllerFactory::createOne(
            Product::class,
            [
                'name' => 'required',
                'original_price' => 'required',
                'brand' => 'required',
                'description' => 'required',
                'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        )($request);
    }

    public function create()
    {
        $categories = Category::get();
        return view('product.create', compact('categories'));
    }



    public function update(Request $request, $id)
    {
        return ControllerFactory::updateOne(
            Product::class,
            [
                'name' => 'required',
                'original_price' => 'required',
                'brand' => 'required',
                'description' => 'required',
                'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        )($id, $request);
    }

    public function destroy($id)
    {
        return ControllerFactory::deleteOne(Product::class)($id);
    }



    public function edit($id, Request $request)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('product.edit', compact('product', 'categories'));
    }
}
