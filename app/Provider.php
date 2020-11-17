<?php

namespace App;

use App\Product;
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

    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    protected $table = 'providers';
}
