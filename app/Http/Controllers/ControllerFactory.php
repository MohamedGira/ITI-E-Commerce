<?php
namespace App\Http\Controllers;

use App\Models\Image;
use App\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ControllerFactory{
    public static function createOne($Class,$validationRules=[],$returnView=''){
        //function responsibility:
        //get request data
        //validate request data
        //filter request data
        //create the object
        return function(Request $request) use($Class,$validationRules){
            $request->validate($validationRules);
            $filteredRequest=Utils::filterObject($request,Schema::getColumnListing((new $Class)->getTable()));
            $item=$Class::create($filteredRequest);

            //handling images upload
            $images=[];
            //make sure to send all images with name "images[]" for this factory method to work correctly.
            foreach($request->file('images') as $image){
                $images[]=['item_id'=>$item->id,'name'=>Utils::saveImage($image)];
            }
            if (!empty($images))
                Image::insert($images);
            if (empty($returnView))
                return response()->json(['message' => 'Created successfuly'], 201);
                return view($returnView,compact('item'));
        };
    }

    
    function updateOne($Class){

    }

    function deleteOne($Class){

    }

    function getAll($Class){

    }
    function getOne($Class){

    }
    function getWhere($Class){

    }

}