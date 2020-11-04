<?php

namespace App\Http\Controllers\Admin\Obj;


use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin\UserInterface\CRUDInterface;


class CRUD implements CRUDInterface
{

    private $nameTable;
    private $model;


    const DELETE = 'delete';
    const CREATE = 'create';
    const EDIT = 'edit';
    const VIEW = 'view';
    const SHOW_DELETED = 'show_deleted';

    const MASS_DESTROY_INPUT_NAME = 'ids';
    const NAME_ROW = 'id';


    public function __construct($name, $model)
    {
        $this->nameTable = $name;
        $this->model = $model;
    }


    protected function gate($action)
    {
        if (!Gate::allows($this->nameTable . '_' . $action)) {
            return abort(401);
        }
    }


    public function index()
    {
        if (request(self::SHOW_DELETED) == 1) {
            $this->gate(self::DELETE);
            $nameTable = $this->model::onlyTrashed()->get();
        } else {
            $nameTable = $this->model::all()->reverse();
        }

        return $nameTable;
    }


    public function create()
    {
        return $this->gate(self::CREATE);
    }


    public function store($request)
    {
        $this->gate(self::CREATE);
        $this->model::create($request->all());
    }


    public function edit($id)
    {
        $this->gate(self::EDIT);
        return $this->model::findOrFail($id);
    }


    public function update($request, $id, $columnSlug)
    {
        $this->gate(self::EDIT);
        $data = $this->model::findOrFail($id);
        if($data->$columnSlug){
            $data->$columnSlug = null;
        }
        $data->update($request->all());
    }


    public function show($id)
    {
        $this->gate(self::VIEW);
        return $this->model::findOrFail($id);
    }


    public function destroy($id)
    {
        $this->gate(self::DELETE);
        $data = $this->model::findOrFail($id);
        $data->delete();
    }


    public function massDestroy($request)
    {
        $this->gate(self::DELETE);
        if ($request->input(self::MASS_DESTROY_INPUT_NAME)) {
            $entries = $this->model::whereIn(self::NAME_ROW, $request->input(self::MASS_DESTROY_INPUT_NAME))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    public function restore($id)
    {
        $this->gate(self::DELETE);
        $data = $this->model::onlyTrashed()->findOrFail($id);
        $data->restore();
    }


    public function perma_del($id)
    {
        $this->gate(self::DELETE);
        $data = $this->model::onlyTrashed()->findOrFail($id);
        $data->forceDelete();
    }

}
