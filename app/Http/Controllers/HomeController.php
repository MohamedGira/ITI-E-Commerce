<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index(Request $request)
   {
    return ControllerFactory::getAll(Category::class,'customer.home')();
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

}