<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'nameProvider', 'apProvider', 'amProvider', 'descriptionProvider',
        'emailProvider', 'rfcProfider'
    ];
}
