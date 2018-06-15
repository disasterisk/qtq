<?php

use Faker\Generator as Faker;

$factory->define(App\Response::class, function (Faker $faker) {
    $question_ids = App\Question::all()->pluck('id')->toArray();
    $user_ids = App\User::all()->pluck('id')->toArray();
    return [
        'question_id' => $faker->randomElement($question_ids),
        'respondent_id' => $faker->randomElement($user_ids),
        'text' => join("\n\n", $faker->paragraphs())
    ];
});
