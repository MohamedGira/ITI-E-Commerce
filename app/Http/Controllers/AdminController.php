<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function viewProducts()
   {
    return ControllerFactory::getAll(Product::class,'admin.products')();
   }

   public function viewCategories()
   {
    return ControllerFactory::getAll(Category::class,'admin.categories')();
   }
   public function viewCategory($id)
   {
    return ControllerFactory::getOne(Category::class,'customer.category')($id);
   }

   public function search(Request $request)
   {
    $query=$request->input('query');
    $products=Product::where('name','like',"%$query%")->get();
    $categories=Category::where('name','like',"%$query%")->get();
    return view('customer.results',compact('query','products','categories'));
   }
   public function cart(Request $request)
   {
   $cart=json_decode(($request->cookie('cart')));
   $products=Product::whereIn('id',$cart)->get();
   return view('customer.cart',compact('products'));
   }
   public function viewProduct($id)
   {
    return ControllerFactory::getOne(Product::class,'customer.product')($id);
   }

}
