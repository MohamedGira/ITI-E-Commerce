<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
         $params=$request->all();
         if(empty($params))
             return ControllerFactory::getAll(ProductCategory::class,'productCategory.index')();
         return ControllerFactory::getWhere(ProductCategory::class,'productCategory.index')($params);
    }
 
    public function show($id)
    {
        return ControllerFactory::getOne(ProductCategory::class,'productCategory.show')($id);
    }
 
  
 
 
    public function store(Request $request)
    {    
        
        return ControllerFactory::createOne(ProductCategory::class,
        [
         'product_id'=>'required',
         'category_id'=>'required',
        ],'productCategory.create')($request);
    }
 
 
 
   
    public function update(Request $request, $id)
    {
     return ControllerFactory::updateOne(ProductCategory::class,
     [
      
     ])($id,$request);
    }
 
    public function destroy($id)
    {
        return ControllerFactory::deleteOne(ProductCategory::class)($id);
    }
 
 
    public function create()
    {
        //
    }
    public function edit($id,Request $request)
    {
  
    }
}
