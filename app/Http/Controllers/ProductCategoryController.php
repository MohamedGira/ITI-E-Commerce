<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function storeMany(Request $request)
    {       
        $product_id=$request->input('product_id');
        $categories=$request->input('categories');
        $product_category=[];
        foreach($categories as $category)
        {
            $product_category[]=[
                'id'=>Str::uuid(),
                'product_id'=>$product_id,
                'category_id'=>$category
            ];
        }
        ProductCategory::insert($product_category);
        return redirect()->route('home');

    }
    public function put(Request $request)
    {       
        $product_id=$request->input('product_id');
        ProductCategory::where('product_id',$product_id)->delete();
        $this->StoreMany($request);
        return response()->json(['message'=>'success'],204);
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
