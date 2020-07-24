<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'nameOffice',
        'address_id',
        'phone'
    ];

    protected $table = 'offices';
}
