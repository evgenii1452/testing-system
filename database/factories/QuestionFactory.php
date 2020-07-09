<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    $id = mt_rand(1, 10);
    $slug = 'question_' . $id;

    return [
        'test_id' => $id,
        'slug' => $slug,
        'question_text' => $faker->text(50),
    ];
});
