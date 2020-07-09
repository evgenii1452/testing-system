<?php


namespace App\Services\Answers;


use App\Models\Question;
use App\Services\Answers\Repositories\AnswerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AnswerService
{
    /**
     * @var AnswerRepositoryInterface
     */
    private $repository;

    public function __construct(
        AnswerRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @param Question $question
     * @param array $answers
     * @return Collection
     */
    public function createAnswersThroughQuestion(Question $question, array $answers): Collection
    {
        $answers = $this->repository
                        ->createManyThroughQuestionFromArray($question, $answers);

        return $answers;
    }

    /**
     * @param array $questions
     * @param array $rawAnswers
     */
    public function createAnswersThroughQuestions(array $questions, array $rawAnswers): void
    {
        foreach ($questions as $key => $question){

            $answers = $this->prepareAnswers($rawAnswers[$key]);

            $this->createAnswersThroughQuestion($question, $answers);
        }
    }

    /**
     * @param array $questions
     * @param array $rawAnswers
     */
    public function updateAnswersThroughQuestions(array $questions, array $rawAnswers)
    {
        $this->createAnswersThroughQuestions($questions, $rawAnswers);
    }

    /**
     * @param Question $question
     */
    public function deleteAnswersThroughQuestion(Question $question): void
    {
        $this->repository->deleteThroughQuestion($question);
    }

    /**
     * @param Collection $questions
     */
    public function deleteAnswersThroughQuestions(Collection $questions): void
    {
        foreach ($questions as $question){
            $this->deleteAnswersThroughQuestion($question);
        }
    }

    /**
     * @param array $rawAnswers
     * @return array
     */
    private function prepareAnswers(array $rawAnswers): array
    {
        $answers = [];

        foreach ($rawAnswers as $answer){
            $answers[] = [
                'answer_text' => $answer
            ];
        }

        return $answers;
    }
}