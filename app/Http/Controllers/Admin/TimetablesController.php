<?php

namespace App\Http\Controllers\Admin;

use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTimetablesRequest;
use App\Http\Requests\Admin\UpdateTimetablesRequest;
use App\Http\Controllers\Admin\Obj\CRUDFile;

class TimetablesController extends Controller
{
    private $crud;
    private $column = 'photo';
    private $path = 'admin.timetables';
    private $singleTableName = 'timetable';
    private $model = Timetable::class;


    
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

    
    public function store(StoreTimetablesRequest $request)
    {
        $this->crud->storeWidthHeight($request, 600, 427);
        return redirect()->route($this->path.'.index');
    }


    public function edit($id)
    { 
        $data = $this->crud->edit($id);
        return view($this->path.'.edit', compact('data'));
    }

    
    public function update(UpdateTimetablesRequest $request, $id)
    {
        $this->crud->update_file_width_height($request, $id, [$this->column], $columnSlug = null, 600, 427);
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
