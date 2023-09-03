<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Utils;
use Dflydev\DotAccessData\Util;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

class ControllerFactory
{
    public static function createOne($Class, $validationRules, $returnView = '')
    {   
        //function responsibility:
        //get request data
        //validate request data
        //filter request data
        //create the object
        return function (Request $request) use ($Class, $validationRules, $returnView) {
            $v = Validator::make($request->all(), $validationRules);
            if ($v->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $v->messages()], 400);
            }
            
            $filteredRequest = Utils::filterObject($request->all(), Schema::getColumnListing((new $Class)->getTable()));
            $item = $Class::create($filteredRequest);

            Utils::handleImages($request,$item->id);





            if (empty($returnView))
                return response()->json(['message' => 'Created successfuly', $item], 201);
            $message = 'Created successfuly';
            return view($returnView, compact('item'), compact('message'));
        };
    }


    public static function updateOne($Class, $validationRules, $returnView = '')
    {
        return function ($id, Request $request) use ($Class, $validationRules, $returnView) {
            $v = Validator::make($request->all(), $validationRules);
            if ($v->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $v->messages()], 400);
            }
            //dont forget to add ->all() T_T
            $filteredRequest = Utils::filterObject($request->all(), Schema::getColumnListing((new $Class)->getTable()));
            $item = $Class::find($id);
            $item->update($filteredRequest);
            if ($request->hasFile('images')) {
                //handling images upload
                $images = [];
                //make sure to send all images with name "images[]" for this factory method to work correctly.
                foreach ($request->file('images') as $image) {
                    $images[] = ['item_id' => $item->id, 'name' => Utils::saveImage($image)];
                }
                if (!empty($images))
                    Image::insert($images);
            }
            //images are set, time to delete old ones.
            //handling images delete again use "deletedImages[]" for this to work correctly
            if ($request->has('deletedImages'))
                foreach ($request->input('deletedImages') as $image) {
                    Utils::deleteImage($image);
                }
            if (empty($returnView))
                return response()->json(['message' => 'Updated successfuly', $item], 200);
            $message = 'Updated successfuly';
            return view($returnView, compact('item'), compact('message'));
        };
    }

    public static function deleteOne($Class, $returnView = '')
    {
        return function ($id) use ($Class, $returnView) {
            $item = $Class::find($id);
            if($item==null)
            {
                if (empty($returnView))
                    return response()->json(['message' => 'Not found'], 404);
                return view($returnView, ['message' => 'Not found','item'=>null]);
            }
            $item->delete();
            $images=Image::where('item_id',$id)->get();
            foreach ($images as $image) {
                Utils::deleteImage($image->name_on_disk);
            }
            if (empty($returnView))
                return response()->json(['message' => 'Deleted successfuly'], 204); //btw 204 will not return any content
            $message = 'Deleted successfuly';
            return view($returnView, compact('item'), compact('message'));
        };
    }

    public static function getAll($Class, $returnView = '')
    {
        return function () use ($Class, $returnView) {
            $items = $Class::all();
            if (empty($returnView))
                return response()->json($items, 200);
            return view($returnView, compact('items'));
        };
    }
    public static function getOne($Class, $returnView)
    {
        return function ($id) use ($Class, $returnView) {   
            $item = $Class::find($id);
         
            
            if ($item==null) {
                if (empty($returnView))
                    return response()->json(['message' => 'Not found'], 404);
                return view($returnView, ['message' => 'Not found','item'=>null]);
            }
            if (empty($returnView))
                return response()->json($item, 200);
            return view($returnView, compact('item'));
        };
    }
    public static function getWhere($Class, $returnView = '')
    {
        return function ($query) use ($Class, $returnView) {
            $items = $Class::where($query)->get();
            if (empty($returnView))
                return response()->json($items, 200);
            return view($returnView, compact('items'));
        };
    }
}
