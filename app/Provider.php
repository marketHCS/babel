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
        'phone_id',
        'adress_id'
    ];

    protected $table = 'providers';
}
