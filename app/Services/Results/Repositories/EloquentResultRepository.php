<?php


namespace App\Services\Results\Repositories;


use App\Models\Result;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EloquentResultRepository implements ResultRepositoryInterface
{


    /**
     * @param array $filters
     * @param string $groupBy
     * @return Collection
     */
    public function getAll(array $filters = [], string $groupBy = ''): Collection
    {
        $qb = Result::query();

        if (!empty($filters)) {
            $this->applyFilters($qb, $filters);
        }

        if (!empty($groupBy)) {
            $results = $qb->get()->groupBy('test_id');

            return $results;
        }

        $results = $qb->get();

        return $results;
    }


    /**
     * @param int $id
     * @return Result|null
     */
    public function getById(int $id): ?Result
    {
        return Result::find($id);
    }

    /**
     * @param int $id
     */
    public function deleteById(int $id): void
    {
        Result::find($id)->delete();
    }

    /**
     * @param array $data
     * @return Result
     */
    public function createFromArray(array $data): Result
    {
        return Result::create($data);
    }

    /**
     * @param User $user
     * @param array $data
     */
    public function createThroughUserFromArray(User $user, array $data): void
    {
        $user->results()->createMany($data);
    }

    /**
     * @param Builder $qb
     * @param array $filters
     */
    private function applyFilters(Builder $qb, array $filters): void
    {
        !isset($filters['where']) ?:
            $qb->where($filters['where']);

        !isset($filters['with']) ?:
            $qb->with($filters['with']);
    }

    /**
     * @param Test $test
     */
    public function deleteThroughTest(Test $test): void
    {
        $test->results()->delete();
    }
}