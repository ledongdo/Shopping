<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    public function categoryChildren()
    {
        return $this->hasMany(category::class,'parent_id');
    }
    public function products()
    {
        return $this->hasMany(product::class,'category_id');
    }
}
