<?php

namespace App;
use Illuminate\Support\Facades\File; 

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
}
