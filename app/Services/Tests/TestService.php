<?php


namespace App\Services\Tests;


use App\Models\Test;
use App\Services\Answers\AnswerService;
use App\Services\Questions\QuestionService;
use App\Services\Results\ResultService;
use App\Services\Tests\Repositories\TestRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TestService
{
    /**
     * @var TestRepositoryInterface
     */
    private $repository;
    /**
     * @var QuestionService
     */
    private $questionService;
    /**
     * @var AnswerService
     */
    private $answerService;
    /**
     * @var ResultService
     */
    private $resultService;

    public function __construct(
        TestRepositoryInterface $repository,
        QuestionService $questionService,
        AnswerService $answerService,
        ResultService $resultService
    )
    {
        $this->repository = $repository;
        $this->questionService = $questionService;
        $this->answerService = $answerService;
        $this->resultService = $resultService;
    }

    /**
     * get filtered tests
     *
     * @param array $filters
     * @return Collection
     */
    public function searchTests(array $filters = []): Collection
    {
        return $this->repository->getAll($filters);
    }

    /**
     * Get a test joined with questions and answers
     *
     * @param int $id
     * @return Test|null
     */
    public function getTestWithRelations(int $id):? Test
    {
        $filters['with'] = ['questions' => function($query) {
            $query->with(['answers']);
        }];

        return $this->repository->getById($id, $filters);
    }

    /**
     * Create Test with related questions and answers
     *
     * @param array $data
     * @return mixed
     */
    public function createWithRelations(array $data): Test
    {
        $dataForCreateTest = ['theme' => $data['theme']];

        $test = $this->repository
                     ->createFromArray($dataForCreateTest);

        $questions = $this->questionService
                          ->createQuestionsThroughTest($test, $data['questions']);

        $this->answerService
             ->createAnswersThroughQuestions($questions, $data['answers']);

        return $test;
    }

    /**
     * Delete Test with related questions and answers
     *
     * @param int $id
     */
    public function deleteWithRelations(int $id): void
    {
        $test = Test::find($id);
        $questions = $test->questions;

        $this->resultService->deleteResultsThroughTest($test);

        $this->answerService->deleteAnswersThroughQuestions($questions);

        $this->questionService->deleteQuestionsThroughTest($test);

        $this->repository->delete($test);
    }

    /**
     * Update Test with related questions and answers
     *
     * @param int $id
     * @param array $data
     * @return Test
     */
    public function updateWithRelations(int $id, array $data): Test
    {
        $dataForUpdateTest = ['theme' => $data['theme']];

        $test = $this->repository->getById($id);

        $test = $this->repository->updateFromArray($test, $dataForUpdateTest);

        //Remove all dependencies before
        // creating new relations
        $this->resultService->deleteResultsThroughTest($test);
        $this->answerService->deleteAnswersThroughQuestions($test->questions);
        $this->questionService->deleteQuestionsThroughTest($test);

        //Create new relations
        $questions = $this->questionService
            ->updateQuestionsThroughTest($test, $data['questions']);
        $this->answerService
            ->updateAnswersThroughQuestions($questions, $data['answers']);

        return $test;
    }
}