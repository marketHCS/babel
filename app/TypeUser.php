<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $fillable=[
      'role',
    ];

    protected $table = 'typeusers';


    public function user()
    {
        return $this->hasMany(User::class);
    }
}
