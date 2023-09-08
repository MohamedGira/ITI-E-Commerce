<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Utils;
use Dflydev\DotAccessData\Util;
use Exception;
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
            try {
                $v = Validator::make($request->all(), $validationRules);
                if ($v->fails()) {
                    return response()->json(['message' => 'Validation failed', 'errors' => $v->messages()], 400);
                }

                $filteredRequest = Utils::filterObject($request->all(), Schema::getColumnListing((new $Class)->getTable()));
                $item = $Class::create($filteredRequest);

                Utils::handleImages($request, $item->id);

                if (empty($returnView))
                    return response()->json(['message' => 'Created successfuly', 'item' => $item], 201);
                $message = 'Created successfuly';
                return view($returnView, compact('item'), compact('message'));
            } catch (Exception $e) {
                return response()->json(['message' => 'something went wrong', 'errors' => $e->getMessage()], 400);
            }
        };
    }


    public static function updateOne($Class, $validationRules, $returnView = '')
    {

        return function ($id, Request $request) use ($Class, $validationRules, $returnView) {
            try {
                $v = Validator::make($request->all(), $validationRules);
                if ($v->fails()) {
                    return response()->json(['message' => 'Validation failed', 'errors' => $v->messages()], 400);
                }
                //dont forget to add ->all() T_T
                $filteredRequest = Utils::filterObject($request->all(), Schema::getColumnListing((new $Class)->getTable()));
                $item = $Class::find($id);
                $item->update($filteredRequest);
                Utils::handleImages($request, $item->id);

                //handling images delete again use "deletedImages[]" for this to work correctly
                if ($request->has('deletedImages')) {
                    $q=Image::where('item_id', $id)->whereIn('id', $request->input('deletedImages'));
                    $imagesToDelete=$q->get();
                    $q->delete();
                    foreach ($imagesToDelete as $image) {
                        Utils::deleteImage($image->name_on_disk);
                    }
                }
                if (empty($returnView))
                    return response()->json(['message' => 'Updated successfuly', $item], 200);
                $message = 'Updated successfuly';
                return view($returnView, compact('item'), compact('message'));
            } catch (Exception $e) {
                return response()->json(['message' => 'something went wrong', 'errors' => $e->getMessage()], 400);
            }
        };
    }

    public static function deleteOne($Class, $returnView = '')
    {

        return function ($id) use ($Class, $returnView) {
            try {
                $item = $Class::find($id);
                if ($item == null) {
                    if (empty($returnView))
                        return response()->json(['message' => 'Not found'], 404);
                    return view($returnView, ['message' => 'Not found', 'item' => null]);
                }
                $item->delete();
                $images = Image::where('item_id', $id)->get();
                foreach ($images as $image) {
                    Utils::deleteImage($image->name_on_disk);
                }
                if (empty($returnView))
                    return response()->json(['message' => 'Deleted successfuly'], 204); //btw 204 will not return any content
                $message = 'Deleted successfuly';
                return view($returnView, compact('item'), compact('message'));
            } catch (Exception $e) {
                return response()->json(['message' => 'something went wrong', 'errors' => $e->getMessage()], 400);
            }
        };
    }

    public static function getAll($Class, $returnView = '')
    {

        return function () use ($Class, $returnView) {
            try {
                $items = $Class::all();
                if (empty($returnView))
                    return response()->json($items, 200);
                return view($returnView, compact('items'));
            } catch (Exception $e) {
                return response()->json(['message' => 'something went wrong', 'errors' => $e->getMessage()], 400);
            }
        };
    }
    public static function getOne($Class, $returnView)
    {

        return function ($id) use ($Class, $returnView) {
            try {



                $item = $Class::find($id);
                if ($item == null)
                    return Utils::handleReturn($returnView, 'Not found', 404);
                if (empty($returnView))
                    return response()->json($item, 200);
                return view($returnView, compact('item'));
            } catch (Exception $e) {
                return response()->json(['message' => 'something went wrong', 'errors' => $e->getMessage()], 400);
            }
        };
    }
    public static function getWhere($Class, $returnView = '')
    {
        return function ($query) use ($Class, $returnView) {
            try {
                $items = $Class::where($query)->get();
                if (empty($returnView))
                    return response()->json($items, 200);
                return view($returnView, compact('items'));
            } catch (Exception $e) {
                return response()->json(['message' => 'something went wrong', 'errors' => $e->getMessage()], 400);
            }
        };
    }
}
