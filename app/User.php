<?php

namespace App;

/**
 * Document: User model
 * Created on: July 8th, 2020
 * Author: Hector Jama Escobedo
 * Project: Babel
 * Subject: Web
 * Description: In this controller, we going to declare the user model.
 */

// Required imports

use App\Sex;
use App\Address;
use App\TypeUser;
use App\WishList;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * User model class
 */
class User extends Authenticatable
{
    // Using interface for hypothetic notifications (Socialite library), payments (Cashier and stripe library) and api tokens (Passport library).
    use Notifiable, Billable, HasApiTokens;

    // Params that we can fill on the system.
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

    // Params that never we going to show to the final user.
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Params that ever needs cast for the data types on php - mysql
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Table on database, for the database connection
    protected $table = 'users';

    // Relation with other object on the system.
    public function typeUSer()
    {
        return $this->hasOne(TypeUser::class);
    }

    // Relation with other object on the system.
    public function sex()
    {
        return $this->hasOne(Sex::class);
    }

    // Relation with other object on the system.
    public function address()
    {
        return $this->hasMany(Address::class);
    }

    // Relation with other object on the system.
    public function wishList()
    {
        return $this->hasMany(WishList::class);
    }
}
