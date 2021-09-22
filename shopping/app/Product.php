<?php

namespace App;
use app\ProductImage;
use app\Tag;
use app\category;
use app\productImages;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use softDeletes;
    protected $guarded = [];
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }
    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }
    public function productImage(){
        return $this->hasMany(productImage::class,'product_id');
    }
}
