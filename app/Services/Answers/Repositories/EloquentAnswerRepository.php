<?php


namespace App\Services\Answers\Repositories;


use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class EloquentAnswerRepository implements AnswerRepositoryInterface
{

    public function createManyThroughQuestionFromArray(Question $question, array $answers): Collection
    {
        $answers = $question->answers()->createMany($answers);

        return $answers;
    }

    public function deleteThroughQuestion(Question $question): void
    {
        $question->answers()->delete();
    }
}