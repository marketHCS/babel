<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    protected $fillable = [
      'sex'
    ];

    protected $hidden = [
      'created_at',
      'updated_at'
    ];

    protected $table = 'sexs';

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
