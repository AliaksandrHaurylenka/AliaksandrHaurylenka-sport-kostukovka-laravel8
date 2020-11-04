<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();


        // Auth gates for: Пользователи
        Gate::define('users_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Menu
        Gate::define('menu_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('menu_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('menu_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('menu_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Carousel
        Gate::define('carousel_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: People
        Gate::define('people_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Coach
        Gate::define('coach_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('coach_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('coach_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('coach_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Main
        Gate::define('main_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('main_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('main_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('main_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: History
        Gate::define('history_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('history_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('history_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('history_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Director
        Gate::define('director_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('director_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('director_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('director_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Board
        Gate::define('board_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('board_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('board_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('board_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Section
        Gate::define('section_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('section_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('section_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('section_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Service
        Gate::define('service_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('service_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('service_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('service_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Pride
        Gate::define('pride_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('pride_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('pride_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('pride_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Timetable
        Gate::define('timetable_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('timetable_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('timetable_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('timetable_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Ads
        Gate::define('ad_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ad_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ad_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('ad_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Contact
        Gate::define('contact_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Sport events
        Gate::define('sport_event_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Category
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Tag
        Gate::define('tag_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('tag_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('tag_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('tag_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Post
        Gate::define('post_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('post_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('post_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('post_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Comment
        Gate::define('comment_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comment_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comment_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('comment_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Poststag
        Gate::define('poststag_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('poststag_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('poststag_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('poststag_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Subscribe
        Gate::define('subscribe_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subscribe_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subscribe_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('subscribe_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Gomelglass
        Gate::define('gomelglass_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('gomelglass_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('gomelglass_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('gomelglass_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Banner
        Gate::define('banner_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('banner_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('banner_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('banner_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });
    }
}
