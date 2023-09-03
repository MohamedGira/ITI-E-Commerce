<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Category extends Model
{        use HasUuids;



    use HasUuids;
    use HasFactory;
    protected $guarded= [];
    function images(){
        return $this->hasMany(Image::class,'item_id');
    }
    function categories(){
        return $this->hasMany(ProductCategory::class);
    }
    
}
