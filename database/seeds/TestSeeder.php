<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $tests = [];

        for ($i = 1; $i <= 10; $i++){
            $created_at = $faker->dateTimeBetween('-5 months', 'now');
            $tests[] =  [
                'theme' => 'Тема #' . $i,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ];
        }

        DB::table('tests')->insert($tests);
    }
}
