<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class PostsController extends Controller
{
    public function index()
    {

        $posts = Post::where('status', Post::IS_PUBLIC)
            ->latest('date')
            ->latest('id')
            ->paginate(3)
            ->onEachSide(2);
        $allPosts = DB::table('posts')->where('status', 1)->get();


        return view('site.posts', compact('posts', 'allPosts'));
    }

    /**
     * Вывод одного поста
     * @param $slug
     * @return Factory|View
     */
    public function post($slug)
    {
        $post = Post::where('status', Post::IS_PUBLIC)->where('slug', $slug)->firstOrFail();

        event('postHasViewed', $post);//для подсчета количества просмотров постов. Провайдер EventServiceProvider.php

        return view('site.post', compact('post'));
    }


    /**
     * Вывод всех статей категории
     * @param $slug
     * @return Factory|View
     */
    public function category($slug)
    {
        $category = Section::where('slug', $slug)->firstOrFail();
        $section = DB::table('sections')->where('slug', $slug)->first();

        $year = false;
        $y = false;

        $posts = $category->posts()
            ->where('status', 1)
            ->orderByRaw('date desc, id desc')
            ->paginate(6);

        $allPosts = $category->posts();

        return view('site.posts-list', compact('allPosts', 'posts', 'section', 'year', 'y'));
    }


    /**
     * Вывод всех статей без категории
     * @return Factory|View
     */
    public function no_category()
    {
        $posts = Post::where('section_id', 0)
            ->where('status', 1)
            ->orderByRaw('date desc, id desc')
            ->paginate(6);

        $allPosts = DB::table('posts')->where('section_id', 0)->where('status', 1)->get();

        $section = false;
        $tag_title = false;
        $year = false;
        $user_name = false;
        $archive_month_year = false;
        $y = false;

        return view('site.posts-list', compact('allPosts', 'posts', 'section', 'tag_title', 'year', 'user_name', 'archive_month_year', 'y'));
    }


    /**
     * Вывод меток
     * @param $slug
     * @return Factory|View
     */
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $tag_title = DB::table('tags')->where('slug', $slug)->first();

        $section = false;
        $year = false;
        $user_name = false;
        $y = false;

        $posts = $tag->posts()
            ->where('status', 1)
            ->orderByRaw('date desc, id desc')
            ->paginate(6);

        $allPosts = $tag->posts();

        return view('site.posts-list', compact('allPosts', 'posts', 'tag_title', 'section', 'year', 'user_name', 'y'));
    }


    /**
     * Вывод пользователя добавившего пост
     * @param $id
     * @param $name
     * @return Factory|View
     */
    public function user_posts($id, $name)
    {
        $user = User::where('id', $id)->where('name', $name)->firstOrFail();
        $user_name = DB::table('users')->where('name', $name)->first();

        $section = false;
        $tag_title = false;
        $year = false;
        $y = false;

        $posts = $user->posts()
            ->where('status', 1)
            ->orderByRaw('date desc, id desc')
            ->paginate(6);

        $allPosts = $user->posts();

        return view('site.posts-list', compact('allPosts', 'posts', 'section', 'tag_title', 'user_name', 'year', 'y'));
    }

    /**
     * Вывод архива новостей
     * @param $month
     * @param $year
     * @return Factory|View
     */
    public function archive($year)
    {
        $archive = Post::whereYear('date', $year);
        $allPosts = DB::table('posts')->whereYear('date', $year)->where('status', 1)->get();

        $section = false;
        $tag_title = false;
        $user_name = false;
        $y = false;


        $posts = $archive
            ->where('status', 1)
            ->latest('date')
            ->paginate(6);

        return view('site.posts-list', compact('allPosts', 'posts', 'section', 'tag_title', 'user_name', 'year', 'y'));
    }

    /**
     * Вывод архива новостей по месяцу года
     * @param $month
     * @param $year
     * @return Factory|View
     */
    public function archiveMonthYear($month, $year)
    {
        $archive = Post::whereMonth('date', $month)->whereYear('date', $year);
        $archive_month_year = DB::table('posts')->whereMonth('date', $month)->whereYear('date', $year)->get();

        $y = $year;
        $m = Post::getMonthName($month);
        $year = false;
        $section = false;
        $tag_title = false;
        $user_name = false;


        $posts = $archive
            ->where('status', 1)
            ->latest('date')
            ->paginate(6);

        return view('site.posts-list', compact('posts', 'section', 'tag_title', 'user_name', 'year', 'archive_month_year', 'y', 'm'));
    }
}
