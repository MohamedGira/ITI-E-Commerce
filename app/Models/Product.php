<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{    use HasUuids;


    use HasFactory;
    protected  $guarded=[];

    function getPriceAttribute(){
        return $this->original_price*(1-$this->discount/100);
    }
    function images(){
        return $this->hasMany(Image::class,'item_id');
    }
    function categories(){
        return $this->hasMany(ProductCategory::class);
    }
}
