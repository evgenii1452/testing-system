<?php


namespace App\Services\Results;


use App\Models\Result;
use App\Services\Results\Repositories\ResultRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ResultService
{
    /**
     * @var ResultRepositoryInterface
     */
    private $repository;

    public function __construct(
        ResultRepositoryInterface $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * @param array $filters
     * @param string $groupBy
     * @return Collection
     */
    public function searchResults(array $filters = [], string $groupBy = ''): Collection
    {
        $filters += [
            'with' => ['test', 'question', 'answer'],
        ];

        $results = $this->repository->getAll($filters, $groupBy);

        return $results;
    }

    /**
     * @param int $id
     * @return Result|null
     */
    public function getResult(int $id): ?Result
    {
        $result = $this->repository->getById($id);

        return $result;
    }

    /**
     * @param int $id
     */
    public function deleteResult(int $id): void
    {
        $this->repository->deleteById($id);
    }

    /**
     * @param array $rawData
     */
    public function createResultThroughUser(array $rawData): void
    {
        $data = $this->prepareDataForCreate($rawData);

        $user = Auth::user();

        $this->repository->createThroughUserFromArray($user, $data);
    }

    /**
     * @param int $testId
     * @return Collection
     */
    public function getTestResultsForCurrentUser(int $testId): ?Collection
    {
        $filters = [
            'where' => [
                ['user_id', Auth::id()],
                ['test_id', $testId]
            ],
            'with' => ['test', 'question', 'answer']
        ];

        $testResults = $this->searchResults($filters);

        return $testResults;
    }

    public function deleteResultsThroughTest($test)
    {
        $this->repository->deleteThroughTest($test);
    }

    /**
     * @param $rawData
     * @return array
     */
    private function prepareDataForCreate($rawData): array
    {
        $data = [];

        foreach ($rawData['questions'] as $question => $answer) {
            $data[] = [
                'test_id' => $rawData['test_id'],
                'question_id' => $question,
                'answer_id' => $answer
            ];
        }

        return $data;
    }


}