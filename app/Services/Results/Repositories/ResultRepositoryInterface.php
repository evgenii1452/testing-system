<?php


namespace App\Services\Results\Repositories;


use App\Models\Result;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface ResultRepositoryInterface
{
    public function getAll(array $filters = [], string $groupBy = ''): Collection;

    public function getById(int $id): ?Result;

    public function deleteById(int $id): void;

    public function createFromArray(array $data): Result;

    public function createThroughUserFromArray(User $user, array $data): void;

    public function deleteThroughTest(Test $test): void;

}