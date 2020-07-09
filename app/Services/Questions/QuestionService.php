<?php


namespace App\Services\Questions;


use App\Models\Question;
use App\Models\Test;
use App\Services\Questions\Repositories\QuestionRepositoryInterface;

class QuestionService
{
    /**
     * @var QuestionRepositoryInterface
     */
    private $repository;

    public function __construct(
        QuestionRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @param Test $test
     * @param array $data
     * @return mixed
     */
    public function createQuestionThroughTest(Test $test, array $data): Question
    {
       $question = $this->repository->createThroughTestFromArray($test, $data);

       return $question;
    }

    /**
     * @param Test $test
     * @param array $questions
     * @return array
     */
    public function createQuestionsThroughTest(Test $test, array $questions): array
    {
        foreach ($questions as $key => $question){

            $question = [
                'question_text' => $question,
            ];

            $questions[$key] = $this->createQuestionThroughTest($test, $question);
        }

        return $questions;
    }

    /**
     * @param Test $test
     * @param array $questions
     * @return array
     */
    public function updateQuestionsThroughTest(Test $test, array $questions): array
    {
        $questions = $this->createQuestionsThroughTest($test, $questions);

        return $questions;
    }

    /**
     * @param Test $test
     */
    public function deleteQuestionsThroughTest(Test $test): void
    {
        $this->repository->deleteThroughTest($test);
    }
}
