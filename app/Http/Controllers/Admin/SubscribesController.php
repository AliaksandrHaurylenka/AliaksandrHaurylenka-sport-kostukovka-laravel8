<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubscribesRequest;
use App\UseCases\Auth\RegisterService;

use App\Http\Controllers\Admin\Obj\CRUD;

class SubscribesController extends Controller
{
    private $crud;
    private $path = 'admin.subscribes';
    private $singleTableName = 'subscribe';
    private $model = Subscribe::class;
    private $verify;

    public function __construct(RegisterService $verify)
    {
        $this->crud = new CRUD($this->singleTableName, $this->model);
        $this->verify = $verify;
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

    public function store(SubscribesRequest $request)
    {
        $this->crud->store($request);
        return redirect()->route($this->path.'.index');
    }



    public function edit($id)
    {
        $data = $this->crud->edit($id);
        return view($this->path.'.edit', compact('data'));
    }


    public function update(SubscribesRequest $request, $id)
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


    public function verify(Subscribe $subscribe)
    {
        // dd($subscribe);
        $this->verify->verify($subscribe->id);

        return redirect()->route('admin.subscribes.index');
    }
}
