<?php


namespace App\Services\Questions\Repositories;


use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

interface QuestionRepositoryInterface
{
    public function createThroughTestFromArray(Test $test, array $data): Question;

    public function updateThroughTestFromArray(Test $test, array $data): Question;

    public function deleteThroughTest(Test $test);
}