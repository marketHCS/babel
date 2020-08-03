<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
      'nameProduct' => $faker->firstname,
      'description_prod'=> $faker->sentence,
      'costo_prod' => 250,
      'precio_prod' => 400,
      'category_id' => rand(1, 3),
      'provider_id' => 1,
    ];
});
