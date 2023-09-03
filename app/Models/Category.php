<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Category extends Model
{       
    use HasUuids;


    use HasUuids;
    use HasFactory;
    protected $guarded= [];
    function images(){
        return $this->hasMany(Image::class,'item_id');
    }
    function subCategories(){
        return $this->hasMany(Category::class,'parent_id');
    }
    function productsCategories(){
        return $this->hasMany(ProductCategory::class,'category_id');

        /* $parents=[$this->id];
        $parentID=$this->id;
        while($parentID){
            $parentID=Category::where('parent_id',$parentID)->value('id');
            $parents[]=$parentID;
        }*/
    }
    
}
