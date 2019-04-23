<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\Comment;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('front.sidebar', function($view){
            $view->with('popularArticles', Article::getPopularArticles());
            $view->with('featuredArticles',Article::where('is_featured', 1)->take(3)->get());
            $view->with('recentArticles', Article::orderBy('date', 'desc')->take(4)->get());
            $view->with('categories', Category::all());
        });

        view()->composer('admin.sidebar', function($view){
            $view->with('newCommentsCount', Comment::where('status',0)->count());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
