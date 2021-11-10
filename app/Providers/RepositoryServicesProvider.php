<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\ArticleInterface',
            'App\Http\Repositories\ArticleRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\AuthorInterface',
            'App\Http\Repositories\AuthorRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\CategoryInterface',
            'App\Http\Repositories\CategoryRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\CommentInterface',
            'App\Http\Repositories\CommentRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\Front\SettingInterface',
            'App\Http\Repositories\Front\SettingRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\SettingInterface',
            'App\Http\Repositories\SettingRepository'
        );

        $this->app->bind(
            'App\Http\Interfaces\TagInterface',
            'App\Http\Repositories\TagRepository'
        );

        ///////////////////////// For End User //////////////////

      $this->app->bind(
            'App\Http\Interfaces\Front\HomeInterface',
            'App\Http\Repositories\Front\HomeRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
