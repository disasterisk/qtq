<?php

use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
  $user_ids = App\User::all()->pluck('id')->toArray();
    return [

      'asker_id' => $faker->randomElement($user_ids),
      'title' => $faker->sentence(),
      'text' => join("\n\n", $faker->paragraphs())
    ];
});
