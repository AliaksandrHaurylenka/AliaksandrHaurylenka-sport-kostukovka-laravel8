<?php

namespace App\Providers;

use App\Models\Ad;
use App\Models\Banner;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Section;
use App\Models\Subscribe;
use App\Models\Comment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Laravel\Dusk\DuskServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Paginator::defaultView('pagination::bootstrap-4');
        //Paginator::defaultView('pagination::semantic-ui');

//        Admin panel
         view()->composer('partials.sidebar', function ($view){
            $view->with('newsCommentsCount', Comment::where('status', 0)->count());
            $view->with('postsPublicCount', Post::where('status', 0)->count());
            $view->with('adsPublicCount', Ad::where('status', 0)->count());
        }); 

//		Front
         view()->composer('site.blocks.sidebar.sidebar', function ($view){
            $view->with('resentPosts', Post::getPostsResent(2));
            $view->with('featuredPosts', Post::getPostsFeatured(3));
            $view->with('popularPosts', Post::getPostsPopular(3));
            $view->with('subscriber', Subscribe::viewSubscriber());
        });

        view()->composer(['site.blocks.nav', 'site.blocks.sections_menu', 'site.blocks.footer', 'site.blocks.sidebar.sidebar'], function ($view) {
            $view->with('menus', Menu::where('drop', 0)->get());
            $view->with('menus_drop', Menu::where('drop', 1)->get());
            $view->with('sportSections', Section::all());
            $view->with('noCategory', Post::where('section_id', 0)->count());
        });


         view()->composer('site.blocks.sidebar.archive', function ($view){
            $view->with('yearArchive', Post::archivesYears());
        });

         view()->composer('site.blocks.sidebar.banners', function ($view){
            $view->with('banners', Banner::all());
        });

        view()->composer('site.modal-ads', function ($view){
            $view->with('ads', Ad::where('status', 1)
                						->orderBy('date', 'desc')
                						->orderBy('id', 'desc')
                						->get()
            						);
        });
    }
}
