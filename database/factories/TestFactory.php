<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Test;
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    $tests = [];
    for ($i = 1; $i <= 10; $i++){
        $tests[] =  [
            'theme' => 'Тема #' . $i,
            'timestamp' => $faker->dateTimeBetween('-5 months', 'now'),
        ];
    }

    return $tests;
});
