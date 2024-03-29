<?php

namespace App\Providers;

use App\Models\Actor;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Repositories\PhotosRepositoryInterface',
            'App\Repositories\PhotosRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //si une de ces deux vue (index ou create) est appeler alor elle est renvoyer avec les categories
        View::composer(['films.index', 'films.create', 'films.edit'], function ($view) {
            $view->with('categories', Category::all());
            $view->with('actors', Actor::all());
        });
    }
}
