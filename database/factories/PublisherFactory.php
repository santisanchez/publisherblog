<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Publisher::class, function (Faker $faker) {
  return [      
      'email' => $faker->unique()->safeEmail,
      'email_verified_at' => now(),
      'phone_number' => '573022136907',
      'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
      'remember_token' => Str::random(10),
  ];
});
