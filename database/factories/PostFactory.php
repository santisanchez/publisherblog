<?php

use Faker\Generator as Faker;
use App\Post;
use App\User;
use Carbon\Carbon;

$factory->define(Post::class, function (Faker $faker) {
  return [
    'title' => $faker->word,
    'description' => $faker->sentence,
    'content' => $faker->paragraph,
    'author' =>  User::inRandomOrder()->where('role_id',2)->first()->name,
    'created_at' => Carbon::now()->subDays(50)->addDays($faker->randomDigit),
  ];
});
