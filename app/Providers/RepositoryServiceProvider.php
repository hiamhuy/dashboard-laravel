<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Page\Blog\BlogInterface;
use App\Repositories\Page\Blog\BlogRepository;
use App\Repositories\Dashboard\Post\PostInterface;
use App\Repositories\Dashboard\Post\PostRepository;
use App\Repositories\Dashboard\System\Role\RoleInterface;
use App\Repositories\Dashboard\System\User\UserInterface;
use App\Repositories\Dashboard\Category\CategoryInterface;
use App\Repositories\Dashboard\System\Role\RoleRepository;
use App\Repositories\Dashboard\System\User\UserRepository;
use App\Repositories\Dashboard\Category\CategoryRepository;
use App\Repositories\Dashboard\System\Permission\PermissionInterface;
use App\Repositories\Dashboard\System\Permission\PermissionRepository;

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
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);

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