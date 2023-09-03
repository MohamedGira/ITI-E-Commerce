<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProductCategory extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded= [];

    function product(){
        return $this->belongsTo(Product::class);
    }
    function category(){
        return $this->belongsTo(Product::class);
    }
}
