<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServicesRequest;
use App\Http\Requests\Admin\UpdateServicesRequest;

use App\Http\Controllers\Admin\Obj\CRUD;

class ServicesController extends Controller
{
    private $crud;
    private $path = 'admin.services';
    private $singleTableName = 'service';
    private $model = Service::class;

    public function __construct()
    {
        $this->crud = new CRUD($this->singleTableName, $this->model);
    }


    public function index()
    {
        $data = $this->crud->index();
        return view($this->path.'.index', compact('data'));
    }


    public function create()
    {
        $this->crud->create();
        return view($this->path.'.create');
    }


    public function store(ServicesRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route($this->path.'.index');
    }



    public function edit($id)
    {
        $data = $this->crud->edit($id);
        return view($this->path.'.edit', compact('data'));
    }


    public function update(ServicesRequest $request, $id)
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
