<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Setting extends Model
{
    use softDeletes;
    protected $guarded = [];
}
