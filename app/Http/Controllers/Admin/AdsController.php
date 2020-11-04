<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\FoldersSystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;


use App\Http\Controllers\Admin\Obj\CRUDFile;

class AdsController extends Controller
{
    use FileUploadTrait;

    private $crud;
    private $column = 'photo';
    private $path = 'admin.ads';
    private $singleTableName = 'ad';
    private $model = Ad::class;

    public function __construct()
    {
        $this->crud = new CRUDFile($this->singleTableName, $this->model);
    }


    public function index()
    {
        // $data = $this->crud->index();
        if (!Gate::allows('ad_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (!Gate::allows('ad_delete')) {
                return abort(401);
            }
            $data = Ad::onlyTrashed()->get();
        } else {
            if (Auth::user()->role_id == 2) {
                $data = Ad::where('user_id', Auth::user()->id)->get();
            } else {
                $data = Ad::all();
            }
        }
        return view($this->path . '.index', compact('data'));
    }


    public function create()
    {
        $this->crud->create();

        if (Auth::user()->role_id == 2) {
            FoldersSystem::add_folder_for_img(User::ADS_PATH . Auth::user()->name . '/Ad_N_', Ad::max('id') + 1);
        } else {
            FoldersSystem::add_folder_for_img(Ad::PATH . 'Ad_N_', Ad::max('id') + 1);
        }

        return view($this->path . '.create');
    }


    public function store(AdsRequest $request)
    {
        if (!Gate::allows('ad_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request, Ad::PATH);

        $ad = Ad::add($request->all());
        $ad->toggleStatus($request->get('status'));

        User::mailNotification($ad);
        Subscribe::mailNotification($ad);

        return redirect()->route('admin.ads.index');
    }


    public function edit($id)
    {
        if (!Gate::allows('ad_edit')) {
            return abort(401);
        }

        if (Auth::user()->role_id == 2) {
            FoldersSystem::add_folder_for_img_edit($id, User::ADS_PATH . Auth::user()->name . '/', Ad::where('id', $id));
        } else {
            FoldersSystem::add_folder_for_img_edit($id, Ad::PATH, Ad::where('id', $id));
        }


        $ad = Ad::findOrFail($id);

        return view('admin.ads.edit', compact('ad'));
    }


    public function update(AdsRequest $request, $id)
    {
        if (!Gate::allows('ad_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request, Ad::PATH);
        $ad = Ad::findOrFail($id);
        $ad->slug = null;
        $ad->status = 0;
        if ($_FILES['photo']['name']) {
            $ad->removeImg();
        }
        $ad->toggleStatus($request->get('status'));
        $ad->edit($request->all());

        User::mailNotification($ad);
        Subscribe::mailNotification($ad);

        return redirect()->route('admin.ads.index');
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
        if (!Gate::allows('ad_delete')) {
            return abort(401);
        }

        $user = new Ad();

        if (Auth::user()->role_id == 2) {
            FoldersSystem::del_folder_img($id, 'ads', User::ADS_PATH . Auth::user()->name . '/');
        } else {
            FoldersSystem::del_folder_img($id, 'ads', Ad::PATH);

        }

        Ad::onlyTrashed()->findOrFail($id)->remove();

        return redirect()->route('admin.ads.index');
    }

    /**
     * Запретить/Опубликовать пост
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggle($id)
    {
        $ad = Ad::find($id);
        $ad->statusToggle();

        User::mailNotification($ad);
        Subscribe::mailNotification($ad);

        return redirect()->back();
    }
}
