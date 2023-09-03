<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
   {
        $params=$request->all();
        if(empty($params))
            return ControllerFactory::getAll(Category::class,'category.index')();
        return ControllerFactory::getWhere(Category::class,'category.index')($params);
   }

   public function show($id)
   {
       return ControllerFactory::getOne(Category::class,'category.show')($id);
   }

 


   public function store(Request $request)
   {    
       return ControllerFactory::createOne(Category::class,
       [
        'name'=>'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ],'category.create')($request);
   }



  
   public function update(Request $request, $id)
   {
    return ControllerFactory::updateOne(Category::class,
    [
     
    ])($id,$request);
   }

   public function destroy($id)
   {
       return ControllerFactory::deleteOne(Category::class)($id);
   }


   public function create()
   {
       //
   }
   public function edit($id,Request $request)
   {
 
   }
}
