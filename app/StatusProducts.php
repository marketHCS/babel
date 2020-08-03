<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProducts extends Model
{
    protected $fillable=[
      'nameStatus'
    ];

    protected $table = 'statusproducts';
}
