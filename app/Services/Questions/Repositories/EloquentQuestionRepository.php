<?php


namespace App\Services\Questions\Repositories;


use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Eloquent\Model;

class EloquentQuestionRepository implements QuestionRepositoryInterface
{

    /**
     * @param Test $test
     * @param array $data
     * @return Question|Model
     */
    public function createThroughTestFromArray(Test $test, array $data): Question
    {
        $question = $test->questions()->create($data);

        return $question;
    }

    public function updateThroughTestFromArray(Test $test, array $data): Question
    {
        $question = $test->questions()->updateOrCreate($data);

        return $question;
    }

    public function deleteThroughTest(Test $test)
    {
        $test->questions()->delete();
    }

}