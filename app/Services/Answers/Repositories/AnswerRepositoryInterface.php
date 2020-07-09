<?php


namespace App\Services\Answers\Repositories;


use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

interface AnswerRepositoryInterface
{

    public function createManyThroughQuestionFromArray(Question $question, array $answers): Collection;

    public function deleteThroughQuestion(Question $question): void;
}