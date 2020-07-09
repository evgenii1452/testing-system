<?php


namespace App\Services\Tests\Repositories;


use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentTestRepository implements TestRepositoryInterface
{

    /**
     * @param array $filters
     * @return Collection
     */
    public function getAll(array $filters): Collection
    {
        $qb = Test::query();

        if (!empty($filters)){
            $this->applyFilters($qb, $filters);
        }

        return $qb->get();

    }

    /**
     * @param int $id
     * @param array $filters
     * @return Model|Test|null
     */
    public function getById(int $id, array $filters = []):? Test
    {
        $qb = Test::query();

        if (!empty($filters)){
            $this->applyFilters($qb, $filters);
        }

        $result = $qb->where('id', $id)->first();

        return $result;
    }

    /**
     * @param array $data
     * @return Test
     */
    public function createFromArray(array $data): Test
    {
        $test = Test::create($data);

        return $test;
    }

    /**
     * @param Test $test
     * @param array $data
     * @return Test|Model
     */
    public function updateFromArray(Test $test, array $data): Test
    {
        $test->update($data);

        return $test;
    }

    /**
     * @param Test $test
     * @throws \Exception
     */
    public function delete(Test $test)
    {
        $test->delete();
    }

    /**
     * @param Builder $qb
     * @param array $filters
     */
    public function applyFilters(Builder $qb, array $filters): void
    {
        !isset($filters['select']) ?:
            $qb->select($filters['select']);

        !isset($filters['theme']) ?:
            $qb->where('title', 'LIKE', "%{$filters['title']}%");

        !isset($filters['created_at']) ?:
            $qb->where('created_at', $filters['created_at']);

        !isset($filters['created_before']) ?:
            $qb->where('created_at', '<', $filters['created_before']);

        !isset($filters['created_after']) ?:
            $qb->where('created_at', '>', $filters['created_after']);

        !isset($filters['with']) ?:
            $qb->with($filters['with']);
    }
}