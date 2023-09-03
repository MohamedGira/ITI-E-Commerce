<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $params=$request->all();
        if(empty($params))
            return ControllerFactory::getAll(Product::class,'product.index')();
        return ControllerFactory::getWhere(Product::class,'product.index')($params);
   }

   public function create()
   {
       //
   }

   public function store(Request $request)
   {    
       return ControllerFactory::createOne(Product::class,
       [
        'name'=>'required',
        'original_price'=>'required',
        'brand'=>'required',
       ],'product.create')($request);
   }

   public function show($id)
   {
       return ControllerFactory::getOne(Product::class,'product.show')($id);
   }

  
   public function edit($id,Request $request)
   {
 
   }

  
   public function update(Request $request, $id)
   {
    return ControllerFactory::updateOne(Product::class,
    [
     
    ])($id,$request);
   }

   public function destroy($id)
   {
 
       return ControllerFactory::deleteOne(Product::class)($id);
   }
}
