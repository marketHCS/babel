<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $fillable = [
        'usuario', 'old_precio', 'new_precio'
    ];

    protected $table = 'audits';
}
