<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscribesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TimetablesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HistorysController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SectionsPagesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\Auth\LoginController;

//Admin
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BoardsController;
use App\Http\Controllers\Admin\CoachesController;
use App\Http\Controllers\Admin\DirectorsController;
use App\Http\Controllers\Admin\HistoriesController;
use App\Http\Controllers\Admin\MainsController;
use App\Http\Controllers\Admin\PridesController;
use App\Http\Controllers\Admin\SectionsController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\GomelglassesController;
use App\Http\Controllers\Admin\ServicesController as AdminServices;
use App\Http\Controllers\Admin\TimetablesController as AdminTimetables;
use App\Http\Controllers\Admin\ContactsController as AdminContacts;
use App\Http\Controllers\Admin\CommentsController as AdminComments;
use App\Http\Controllers\Admin\PostsController as AdminPosts;
use App\Http\Controllers\Admin\SubscribesController as AdminSubscribes;

use App\Http\Controllers\Auth\ChangePasswordController;


// Frontend...
Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/uslugi', [ServicesController::class, 'index'])->name('uslugi');
Route::get('/raspisanie', [TimetablesController::class, 'index'])->name('raspisanie');
Route::get('/kontakty', [ContactsController::class, 'index'])->name('kontakty');
Route::get('/kostyukovskie-luzhniki', [HistorysController::class, 'luzhniki'])->name('kostyukovskie-luzhniki');
Route::get('/doska-pocheta', [HistorysController::class, 'doska'])->name('doska-pocheta');
Route::get('/oao-gomelsteklo', [HistorysController::class, 'gomelsteklo'])->name('oao-gomelsteklo');
Route::get('/novosti', [PostsController::class, 'index'])->name('novosti');
Route::get('/section/{id}/{slug}', [SectionsPagesController::class, 'section'])->name('section');


Route::get('/post/{slug}', [PostsController::class, 'post'])->name('post.show');
Route::post('/comment', [CommentsController::class, 'store']);
Route::get('/tag/{slug}', [PostsController::class, 'tag'])->name('tag.show');
Route::get('/category/{slug}', [PostsController::class, 'category'])->name('category.show');
Route::get('/no-category', [PostsController::class, 'no_category'])->name('no-category.show');
Route::get('/archive/{year}', [PostsController::class, 'archive'])->name('year');
Route::get('/archive_month_year/{month}/{year}', [PostsController::class, 'archiveMonthYear'])->name('archive.month.year.show');
Route::get('/user_posts/{id}/{name}', [PostsController::class, 'user_posts'])->name('user_posts.show');


Route::post('/subscribe', [SubscribesController::class, 'subscribe']);
Route::get('/verify/{token}', [SubscribesController::class, 'verify'])->name('subscriber.verify');
Route::post('/letter', [LetterController::class, 'letter']);
Route::get('/refereshcapcha', [LetterController::class, 'refereshCapcha']);



Route::group([
    'middleware' => 'auth',
], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'store']);
});


// Backend...
Route::get('/cabinet', function () {
    return redirect('/admin/home');
})->name('cabinet');

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');

// Change Password Routes...
Route::get('change_password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('auth.change_password');
Route::patch('change_password', [ChangePasswordController::class, 'changePassword'])->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('auth.password.reset');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('auth.password.reset');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('auth.password.reset');


Route::group(
    [
        'middleware' => ['auth', 'trimstriptags', 'del.empty.folder'],
        'prefix' => 'admin',
        'as' => 'admin.',
//        'namespace' => 'Admin'
    ],
    function () {
        Route::get('/home', [HomeController::class, 'index']);

        Route::resource('roles', RolesController::class);
        Route::post('roles_mass_destroy', [RolesController::class, 'massDestroy'])->name('roles.mass_destroy');

        Route::resource('users', UsersController::class);
        Route::post('users_mass_destroy', [UsersController::class, 'massDestroy'])->name('users.mass_destroy');

        Route::resource('coaches', CoachesController::class);
        Route::post('coaches_mass_destroy', [CoachesController::class, 'massDestroy'])->name('coaches.mass_destroy');
        Route::post('coaches_restore/{id}', [CoachesController::class, 'restore'])->name('coaches.restore');
        Route::delete('coaches_perma_del/{id}', [CoachesController::class, 'perma_del'])->name('coaches.perma_del');

        Route::resource('directors', DirectorsController::class);
        Route::post('directors_mass_destroy', [DirectorsController::class, 'massDestroy'])->name('directors.mass_destroy');
        Route::post('directors_restore/{id}', [DirectorsController::class, 'restore'])->name('directors.restore');
        Route::delete('directors_perma_del/{id}', [DirectorsController::class, 'perma_del'])->name('directors.perma_del');

        Route::resource('boards', BoardsController::class);
        Route::post('boards_mass_destroy', [BoardsController::class, 'massDestroy'])->name('boards.mass_destroy');
        Route::post('boards_restore/{id}', [BoardsController::class, 'restore'])->name('boards.restore');
        Route::delete('boards_perma_del/{id}', [BoardsController::class, 'perma_del'])->name('boards.perma_del');

        Route::resource('mains', MainsController::class);
        Route::post('mains_mass_destroy', [MainsController::class, 'massDestroy'])->name('mains.mass_destroy');
        Route::post('mains_restore/{id}', [MainsController::class, 'restore'])->name('mains.restore');
        Route::delete('mains_perma_del/{id}', [MainsController::class, 'perma_del'])->name('mains.perma_del');

        Route::resource('histories', HistoriesController::class);
        Route::post('histories_mass_destroy', [HistoriesController::class, 'massDestroy'])->name('histories.mass_destroy');
        Route::post('histories_restore/{id}', [HistoriesController::class, 'restore'])->name('histories.restore');
        Route::delete('histories_perma_del/{id}', [HistoriesController::class, 'perma_del'])->name('histories.perma_del');

        Route::resource('sections', SectionsController::class);
        Route::post('sections_mass_destroy', [SectionsController::class, 'massDestroy'])->name('sections.mass_destroy');
        Route::post('sections_restore/{id}', [SectionsController::class, 'restore'])->name('sections.restore');
        Route::delete('sections_perma_del/{id}', [SectionsController::class, 'perma_del'])->name('sections.perma_del');


        Route::resource('services', AdminServices::class);
        Route::post('services_mass_destroy', [AdminServices::class, 'massDestroy'])->name('services.mass_destroy');
        Route::post('services_restore/{id}', [AdminServices::class, 'restore'])->name('services.restore');
        Route::delete('services_perma_del/{id}', [AdminServices::class, 'perma_del'])->name('services.perma_del');

        Route::resource('prides', PridesController::class);
        Route::post('prides_mass_destroy', [PridesController::class, 'massDestroy'])->name('prides.mass_destroy');
        Route::post('prides_restore/{id}', [PridesController::class, 'restore'])->name('prides.restore');
        Route::delete('prides_perma_del/{id}', [PridesController::class, 'perma_del'])->name('prides.perma_del');

        Route::resource('timetables', AdminTimetables::class);
        Route::post('timetables_mass_destroy', [AdminTimetables::class, 'massDestroy'])->name('timetables.mass_destroy');
        Route::post('timetables_restore/{id}', [AdminTimetables::class, 'restore'])->name('timetables.restore');
        Route::delete('timetables_perma_del/{id}', [AdminTimetables::class, 'perma_del'])->name('timetables.perma_del');


        Route::resource('contacts', AdminContacts::class);
        Route::post('contacts_mass_destroy', [AdminContacts::class, 'massDestroy'])->name('contacts.mass_destroy');
        Route::post('contacts_restore/{id}', [AdminContacts::class, 'restore'])->name('contacts.restore');
        Route::delete('contacts_perma_del/{id}', [AdminContacts::class, 'perma_del'])->name('contacts.perma_del');


        Route::resource('tags', TagsController::class);
        Route::post('tags_mass_destroy', [TagsController::class, 'massDestroy'])->name('tags.mass_destroy');
        Route::post('tags_restore/{id}', [TagsController::class, 'restore'])->name('tags.restore');
        Route::delete('tags_perma_del/{id}', [TagsController::class, 'perma_del'])->name('tags.perma_del');


        Route::resource('comments', AdminComments::class);
        Route::get('/comment/toggle/{id}', [AdminComments::class, 'toggle']);
        Route::post('comments_mass_destroy', [AdminComments::class, 'massDestroy'])->name
        ('comments.mass_destroy');
        Route::post('comments_restore/{id}', [AdminComments::class, 'restore'])->name('comments.restore');
        Route::delete('comments_perma_del/{id}', [AdminComments::class, 'perma_del'])->name('comments.perma_del');


        Route::resource('subscribes', AdminSubscribes::class);
        Route::post('subscribes_mass_destroy', [AdminSubscribes::class, 'massDestroy'])->name('subscribes.mass_destroy');
        Route::post('subscribes_restore/{id}', [AdminSubscribes::class, 'restore'])->name('subscribes.restore');
        Route::delete('subscribes_perma_del/{id}', [AdminSubscribes::class, 'perma_del'])->name('subscribes.perma_del');
        Route::post('subscribes/{subscribe}/verify', [AdminSubscribes::class, 'verify'])->name('subscribes.verify');


        Route::resource('gomelglasses', GomelglassesController::class);
        Route::post('gomelglasses_mass_destroy', [GomelglassesController::class, 'massDestroy'])->name('gomelglasses.mass_destroy');
        Route::post('gomelglasses_restore/{id}', [GomelglassesController::class, 'restore'])->name('gomelglasses.restore');
        Route::delete('gomelglasses_perma_del/{id}', [GomelglassesController::class, 'perma_del'])->name('gomelglasses.perma_del');

        Route::resource('banners', BannersController::class);
        Route::post('banners_mass_destroy', [BannersController::class, 'massDestroy'])->name('banners.mass_destroy');
        Route::post('banners_restore/{id}', [BannersController::class, 'restore'])->name('banners.restore');
        Route::delete('banners_perma_del/{id}', [BannersController::class, 'perma_del'])->name('banners.perma_del');

        Route::resource('posts', AdminPosts::class);
        Route::get('/post/toggle/{id}', [AdminPosts::class, 'toggle']);
        Route::post('posts_mass_destroy', [AdminPosts::class, 'massDestroy'])->name('posts.mass_destroy');
        Route::post('posts_restore/{id}', [AdminPosts::class, 'restore'])->name('posts.restore');
        Route::delete('posts_perma_del/{id}', [AdminPosts::class, 'perma_del'])->name('posts.perma_del');


        Route::resource('ads', AdsController::class);
        Route::get('/ad/toggle/{id}', [AdsController::class, 'toggle']);
        Route::post('ads_mass_destroy', [AdsController::class, 'massDestroy'])->name('ads.mass_destroy');
        Route::post('ads_restore/{id}', [AdsController::class, 'restore'])->name('ads.restore');
        Route::delete('ads_perma_del/{id}', [AdsController::class, 'perma_del'])->name('ads.perma_del');


        Route::resource('menus', MenusController::class);
        Route::post('menus_mass_destroy', [MenusController::class, 'massDestroy'])->name('menus.mass_destroy');
        Route::post('menus_restore/{id}', [MenusController::class, 'restore'])->name('menus.restore');
        Route::delete('menus_perma_del/{id}', [MenusController::class, 'perma_del'])->name('menus.perma_del');

    });