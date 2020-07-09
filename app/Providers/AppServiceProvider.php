<?php

namespace App\Providers;

use App\Services\Answers\Repositories\AnswerRepositoryInterface;
use App\Services\Answers\Repositories\EloquentAnswerRepository;
use App\Services\Questions\Repositories\EloquentQuestionRepository;
use App\Services\Questions\Repositories\QuestionRepositoryInterface;
use App\Services\Results\Repositories\EloquentResultRepository;
use App\Services\Results\Repositories\ResultRepositoryInterface;
use App\Services\Tests\Repositories\EloquentTestRepository;
use App\Services\Tests\Repositories\TestRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            ResultRepositoryInterface::class,
            EloquentResultRepository::class
        );

        $this->app->bind(
            TestRepositoryInterface::class,
            EloquentTestRepository::class
        );

        $this->app->bind(
            QuestionRepositoryInterface::class,
            EloquentQuestionRepository::class
        );

        $this->app->bind(
            AnswerRepositoryInterface::class,
            EloquentAnswerRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
