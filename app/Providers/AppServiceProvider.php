<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\PostCategoryRepositoryInterface;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\PageRepository;
use App\Repositories\PageRepositoryInterface;
use App\Repositories\SiteSettingInterface;
use App\Repositories\SiteSettingRepository;
use App\Repositories\AdvertisementRepository;
use App\Repositories\AdvertisementRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(PostCategoryRepositoryInterface::class, PostCategoryRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(SiteSettingInterface::class, SiteSettingRepository::class);
        $this->app->bind(AdvertisementRepositoryInterface::class, AdvertisementRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['dashboard', 'permission.all_permissions'], function ($view) {
            $menuData = json_decode(file_get_contents(storage_path('app/menu.json')), true);
            $view->with('menuData', $menuData);
        });

        //
    }
}
