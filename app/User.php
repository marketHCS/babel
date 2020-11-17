<?php

namespace App;

use App\Sex;
use App\Address;
use App\TypeUser;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, Billable, HasApiTokens;

    protected $fillable = [
      'typeUser_id',
      'name',
      'ap',
      'am',
      'email',
      'email_verified_at',
      'password',
      'profilePicture',
      'birthdate',
      'rfc',
      'sex_id',
      'address_id',
      'phone',
      'stripe_id',
      'card_brand',
      'card_last_four',
      'trial_ends_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    public function typeUSer()
    {
        return $this->hasOne(TypeUser::class);
    }

    public function sex()
    {
        return $this->hasOne(Sex::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }
}
