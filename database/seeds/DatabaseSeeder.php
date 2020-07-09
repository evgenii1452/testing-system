<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(TestSeeder::class);
        $this->call(QuestionSeeder::class);
//        factory(\App\Models\Question::class, 50)->create();
        factory(\App\Models\Answer::class, 400)->create();
        factory(\App\Models\User::class, 10)->create();
    }
}
