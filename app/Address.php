<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'exteriorNumberAddress',
        'interiorNumberAddress',
        'suburb',
        'city',
        'estate',
        'cp',
        'user_id',
        'provider_id'
    ];

    protected $table = 'addresses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
