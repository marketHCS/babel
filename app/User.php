<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

// use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, Billable;
    // use HasApiTokens;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
}
