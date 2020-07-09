<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        $questions = [];

        for ($i = 1; $i <= 50; $i++){
            $id = mt_rand(1, 10);
            $slug = 'question_' . $i;

            $questions[] = [
                'test_id' => $id,
                'slug' => $slug,
                'question_text' => $faker->text(50),
            ];
        }

        DB::table('questions')->insert($questions);
    }
}
