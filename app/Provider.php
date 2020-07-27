<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'phone',
        'nameProvider',
        'apProvider',
        'amProvider',
        'companyProvider',
        'descriptionProvider',
        'emailProvider',
        'rfcProvider',
        'status'
    ];

    protected $table = 'providers';
}
