<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCommentsRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class CommentsController extends Controller
{
    

    public function toggle($id)
    {
        $comment = Comment::find($id);
        $comment->toggleStatus();

        Comment::mailNotification($comment);
        Subscribe::mailNotificationComment($comment);

        return redirect()->back();
    }

    private $crud;
    private $path = 'admin.comments';
    private $singleTableName = 'comment';
    private $model = Comment::class;

    public function __construct()
    {
        $this->crud = new CRUD($this->singleTableName, $this->model);
    }


    public function index()
    {
        $data = $this->crud->index();
        return view($this->path.'.index', compact('data'));
    }



    public function edit($id)
    {
        $data = $this->crud->edit($id);
        return view($this->path.'.edit', compact('data'));
    }


    public function update(UpdateCommentsRequest $request, $id)
    {
        $this->crud->update($request, $id, null);
        return redirect()->route($this->path.'.index');
    }



    public function destroy($id)
    {
        $this->crud->destroy($id);
        return redirect()->route($this->path.'.index');
    }


    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }



    public function restore($id)
    {
        $this->crud->restore($id);
        return redirect()->route($this->path.'.index');
    }


    public function perma_del($id)
    {
        $this->crud->perma_del($id);
        return redirect()->route($this->path.'.index');
    }
}
