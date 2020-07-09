<?php


namespace App\Services\Tests\Repositories;


use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface TestRepositoryInterface
{
    public function getAll(array $filters): Collection;

    public function getById(int $id, array $filters = []):? Test;

    public function applyFilters(Builder $qb, array $filters): void;

    public function createFromArray(array $data): Test;

    public function updateFromArray(Test $test, array $data): Test;

    public function delete(Test $test);
}