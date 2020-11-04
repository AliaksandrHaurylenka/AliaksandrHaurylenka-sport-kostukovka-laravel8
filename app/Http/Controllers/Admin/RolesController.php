<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolesRequest;


use App\Http\Controllers\Admin\Obj\CRUD;

class RolesController extends Controller
{
    private $crud;
    private $path = 'admin.roles';
    private $singleTableName = 'role';
    private $model = Role::class;

    public function __construct()
    {
        $this->crud = new CRUD($this->singleTableName, $this->model);
    }


    public function index()
    {
        $data = $this->crud->index();
        return view($this->path . '.index', compact('data'));
    }


    public function create()
    {
        $this->crud->create();
        return view($this->path . '.create');
    }


    public function store(RolesRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route($this->path . '.index');
    }


    public function edit($id)
    {
        $data = $this->crud->edit($id);
        return view($this->path . '.edit', compact('data'));
    }


    public function update(RolesRequest $request, $id)
    {
        $this->crud->update($request, $id, null);
        return redirect()->route($this->path . '.index');
    }


    public function show($id)
    {
        $data = $this->crud->show($id);
        $users = \App\Models\User::where('role_id', $id)->get();
        return view($this->path . '.show', compact('data', 'users'));
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

}
