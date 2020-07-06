<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'test_id' => mt_rand(1, 10),
        'question_text' => $faker->text(50),
    ];
});
