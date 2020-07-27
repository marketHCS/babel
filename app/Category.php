<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nameCategory',
        'status'
    ];

    protected $table = 'categories';
    // public $timestamps = false;
}
