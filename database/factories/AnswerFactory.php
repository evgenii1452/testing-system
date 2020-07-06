<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    $question_id = mt_rand(1, 50);

    return [
        'question_id' => $question_id,
        'answer_text' => $faker->word() . '(' . $question_id . ')',
    ];
});
