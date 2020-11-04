<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSectionsRequest;
use App\Http\Requests\Admin\UpdateSectionsRequest;

use App\Http\Controllers\Admin\Obj\CRUDFile;
class SectionsController extends Controller
{
    

    private $crud;
    private $photo = 'photo';
    private $photo_section_menu = 'photo_section_menu';
    private $photo_sport = 'photo_sport';
    private $path = 'admin.sections';
    private $singleTableName = 'section';
    private $columnSlug = 'slug';
    private $model = Section::class;


    
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

    
    public function store(StoreSectionsRequest $request)
    {
        $this->crud->storeWidthHeight($request, 800, 450);
        return redirect()->route($this->path.'.index');
    }


    public function edit($id)
    { 
        $data = $this->crud->edit($id);
        return view($this->path.'.edit', compact('data'));
    }

    
    public function update(UpdateSectionsRequest $request, $id)
    {
        $photo = $this->photo;
        $photo_section_menu = $this->photo_section_menu;
        $photo_sport = $this->photo_sport;
        $columnSlug = $this->columnSlug;
        $w = 800;
        $h = 450;

        $this->crud->update_file_width_height($request, $id, [$photo, $photo_section_menu, $photo_sport], $columnSlug, $w, $h);
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
        $this->crud->perma_del_file($id, [$this->photo, $this->photo_section_menu, $this->photo_sport]);
        return redirect()->route($this->path.'.index');
    }
}
