<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

use App\Http\Controllers\Admin\Obj\CRUDFile;

class UsersController extends Controller
{

    private $crud;
    private $column = 'avatar';
    private $path = 'admin.users';
    private $singleTableName = 'user';
    private $model = User::class;


    public function __construct()
    {
        $this->crud = new CRUDFile($this->singleTableName, $this->model);
    }

    public function index()
    {
        $data = $this->crud->index();
        return view($this->path.'.index', compact('data'));
    }


    public function create()
    {
        $this->crud->create();
        $roles = \App\Models\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.users.create', compact('roles'));
    }

    public function store(StoreUsersRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route($this->path.'.index');
    }


    public function edit($id)
    {
        $data = $this->crud->edit($id);
        $roles = \App\Models\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.users.edit', compact('data', 'roles'));
    }

  
    public function update(UpdateUsersRequest $request, $id)
    {
        $this->crud->update_file($request, $id, [$this->column]);
        return redirect()->route($this->path.'.index');
    }


    
    public function show($id)
    {
        $data = $this->crud->show($id);
        return view($this->path.'.show', compact('data'));
    }


    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        User::findOrFail($id)->remove();
        return redirect()->route($this->path.'.index');
    }

    
    public function massDestroy(Request $request)
    {
        $this->crud->massDestroy($request);
    }

}
