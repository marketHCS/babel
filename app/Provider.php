<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'nameProvider',
        'apProvider',
        'amProvider',
        'companyProvider',
        'descriptionProvider',
        'emailProvider',
        'rfcProfider',
        'phone',
        'adress_id'
    ];

    protected $table = 'providers';
}
