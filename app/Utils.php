<?php

namespace App;

use App\Models\Image;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Utils
{
    public static function filterObject($object, $filter)
    {
        $filtered = [];
        foreach ($object as $key => $value) {
            if (in_array($key, $filter))
                $filtered[$key] = $value;
        }
        return $filtered;
    }
    public static function saveImage($image)
    {
        $filename = uniqid() . "." . $image->extension();
        $image->move(public_path('Images'), $filename);
        return $filename;
    }
    public static function deleteImage($image)
    {
        File::delete(public_path('Images/' . $image));
    }
    public static function handleImages($request, $owner_id)
    {
        //images can have name or be anonymous;
        //for example banner image must have a name so we can retreieve it
        //but product images needn't have one
        //so to be dynamic, if we recieved image arr, this means they can be annon
        // if we recieved image obj, this means they must have a name, so we use the filed name
        //handling images upload
        $images = [];
        //make sure to send all images with name "images[]" for this factory method to work correctly.

        foreach ($request->file() as $key => $input) {
            if (is_array($input)) {
                foreach ($input as $image) {
                    $images[] = [
                        'item_id' => $owner_id,
                        'name' => 'anonymous',
                        'name_on_disk' => Utils::saveImage($image),
                        'id' => Str::uuid()
                    ];
                }
            } else {
                $images[] = [
                    'item_id' => $owner_id,
                    'name' => $key,
                    'name_on_disk' => Utils::saveImage($input),
                    'id' => Str::uuid()
                ];
            }
        }
        if (!empty($images))
            Image::insert($images);
    } // t
    public static function handleReturn($returnView, $message, $status)
    {
        if (empty($returnView))
            return response()->json([$message], $status);
        return view($returnView, ['message' => $message, 'item' => null]);
    }
}
