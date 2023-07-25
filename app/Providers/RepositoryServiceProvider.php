<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Page\Blog\BlogInterface;
use App\Repositories\Page\Blog\BlogRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(BlogInterface::class, BlogRepository::class);
        // $this->app->bind(BlogInterface::class, BlogRepository::class);
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