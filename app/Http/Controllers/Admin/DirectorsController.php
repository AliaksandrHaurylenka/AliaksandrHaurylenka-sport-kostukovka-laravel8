<?php

namespace App\Http\Controllers\Admin;

use App\Models\Director;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDirectorsRequest;
use App\Http\Requests\Admin\UpdateDirectorsRequest;

use App\Http\Controllers\Admin\Obj\CRUDFile;
class DirectorsController extends Controller
{
    
    private $crud;
    private $column = 'photo';
    private $path = 'admin.directors';
    private $singleTableName = 'director';
    private $model = Director::class;


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
        return view($this->path.'.create');
    }

    
    public function store(StoreDirectorsRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route($this->path.'.index');
    }


    
    public function edit($id)
    { 
        $data = $this->crud->edit($id);
        return view($this->path.'.edit', compact('data'));
    }

    
    public function update(UpdateDirectorsRequest $request, $id)
    {
        $this->crud->update_file($request, $id, [$this->column]);
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
        $this->crud->perma_del_file($id, [$this->column]);
        return redirect()->route($this->path.'.index');
    }
}
