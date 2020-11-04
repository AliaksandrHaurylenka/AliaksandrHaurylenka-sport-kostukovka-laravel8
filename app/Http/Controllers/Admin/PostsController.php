<?php

namespace App\Http\Controllers\Admin;

use App\Models\FoldersSystem;
use App\Models\Post;
use App\Models\Section;
use App\Models\Subscribe;
use App\Models\Tag;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostsRequest;
use App\Http\Requests\Admin\UpdatePostsRequest;
use App\Http\Controllers\Traits\FileUploadPostTrait;

use App\Http\Controllers\Admin\Obj\CRUDFile;

class PostsController extends Controller
{
//    use FileUploadTrait;
    use FileUploadPostTrait;
    use Notifiable;


    private $crud;
    private $column = 'image';
    private $path = 'admin.posts';
    private $singleTableName = 'post';
    private $model = Post::class;
    

    public function __construct()
    {
        $this->crud = new CRUDFile($this->singleTableName, $this->model);
    }


    public function index()
    {
        // $data = $this->crud->index();

        if (!Gate::allows('post_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (!Gate::allows('post_delete')) {
                return abort(401);
            }
            $data = Post::onlyTrashed()->get();
        } else {
//            Вывод постов для админа и простого пользователя
            if (Auth::user()->role_id == 2) {
                $data = Post::where('user_id', Auth::user()->id)->latest()->get();
            } else {
                $data = Post::all()->reverse();
            }
        }
        return view($this->path . '.index', compact('data'));
    }

    private static function path_to_folder_user()
    {
        if(Auth::user()->role_id == 2) {
            return User::NEWS_PATH . Auth::user()->name . '/N_';
        }
        return Post::NEWS . 'N_';
    }

    private static function folder()
    {
        return Post::max('id') + 1;
    }
    
    public function create()
    {
        if (!Gate::allows('post_create')) {
            return abort(401);
        }

        $tags = Tag::pluck('title', 'id')->all();
        $sections = Section::pluck('title', 'id');

        FoldersSystem::add_folder_for_img(self::path_to_folder_user(), self::folder());
        
        return view($this->path . '.create', compact('tags', 'sections'));
    }


    public function store(StorePostsRequest $request)
    {
        if (!Gate::allows('post_create')) {
            return abort(401);
        }
        $request = $this->saveFilesWidthHeight($request, Post::PATH, 800, 450);
        // функция add() используется для добавления id пользователя
        // и всех остальных данных
        // находится в Post.php
        $post = Post::add($request->all());
        $post->setTags($request->get('tags'));
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));


        User::mailNotification($post);
        Subscribe::mailNotification($post);


        return redirect()->route($this->path . '.index');
    }


    private static function path_to_folder_user_by_edit()
    {
        if(Auth::user()->role_id == 2) {
            return User::NEWS_PATH . Auth::user()->name . '/';
        }
        return Post::NEWS;
    }

    private static function folder_edit($id)
    {
        return Post::where('id', $id);
    }

    public function edit($id)
    {
        if (!Gate::allows('post_edit')) {
            return abort(401);
        }

        FoldersSystem::add_folder_for_img_edit($id, self::path_to_folder_user_by_edit(), self::folder_edit($id));
        
        $post = Post::findOrFail($id);
        $sections = Section::pluck('title', 'id');
        $tags = Tag::pluck('title', 'id')->all();
        $selectedTags = $post->tags->pluck('id')->all();

        return view($this->path . '.edit', compact('post', 'sections', 'tags', 'selectedTags'));
    }


    public function update(UpdatePostsRequest $request, $id)
    {
        if (!Gate::allows('post_edit')) {
            return abort(401);
        }
        $request = $this->saveFilesWidthHeight($request, Post::PATH, 800, 450);
        $post = Post::findOrFail($id);
        $post->slug = null;
        $post->status = Post::IS_DRAFT;
        $post->setTags($request->get('tags'));
        if ($request->input('tags') == null) {
            $post->delTags($id);
        }
        if ($_FILES['image']['name']) {
            $post->removeImg();
        }
        $post->toggleStatus($request->get('status'));
        $post->toggleFeatured($request->get('is_featured'));
        $post->edit($request->all());

        User::mailNotification($post);
        Subscribe::mailNotification($post);


        return redirect()->route($this->path . '.index');
    }


    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route($this->path . '.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }


    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route($this->path . '.index');
    }


    public function perma_del($id)
    {
        if (!Gate::allows('post_delete')) {
            return abort(401);
        }

        if (Auth::user()->role_id == 2) {
            FoldersSystem::del_folder_img($id, 'posts', User::NEWS_PATH . Auth::user()->name . '/');
        } else {
            FoldersSystem::del_folder_img($id, 'posts', Post::NEWS);
        }


        $post = Post::onlyTrashed()->findOrFail($id);
        $post->delTags($id);
        $post->remove();

        return redirect()->route($this->path . '.index');
    }

    /**
     * Запретить, опубликовать пост в админке posts->index.blade.php
     * Используется в роутере Route::get('/post/toggle/{id}', 'Admin\PostsController@toggle')
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggle($id)
    {
        $post = Post::find($id);
        $post->statusToggle();

        User::mailNotification($post);
        Subscribe::mailNotification($post);


        return redirect()->back();
    }
}
