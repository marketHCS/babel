<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $fillable = [
      'sex'
    ];

    protected $table = 'sexs';
}