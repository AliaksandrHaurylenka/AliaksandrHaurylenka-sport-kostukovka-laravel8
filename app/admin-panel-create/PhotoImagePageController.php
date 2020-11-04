<?php

namespace App\Http\Controllers\Admin;

use App\PhotoImagePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePhotoImagePagesRequest;
use App\Http\Requests\Admin\UpdatePhotoImagePagesRequest;
use App\Http\Controllers\Traits\FileUploadTraitUser;

class PhotoImagePageController extends Controller
{
    use FileUploadTraitUser;
    
    public function index()
    {
        if (! Gate::allows('photo_image_page_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('photo_image_page_delete')) {
                return abort(401);
            }
            $photo_image_pages = PhotoImagePage::onlyTrashed()->get();
        } else {
            $photo_image_pages = PhotoImagePage::all();
        }

        return view('admin.photo_image_pages.index', compact('photo_image_pages'));
    }

    
    public function create()
    {
        if (! Gate::allows('photo_image_page_create')) {
            return abort(401);
        }
        return view('admin.photo_image_pages.create');
    }

    
    public function store(StorePhotoImagePagesRequest $request)
    {
        if (! Gate::allows('photo_image_page_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $photo_image_page = PhotoImagePage::create($request->all());

        return redirect()->route('admin.photo_image_pages.index');
    }


    
    public function edit(PhotoImagePage $photoImagePage)
    {
        if (! Gate::allows('photo_image_page_edit')) {
            return abort(401);
        }
        // $price = Price::findOrFail($id);

        return view('admin.photo_image_pages.edit', compact('photoImagePage'));
    }

    
    public function update(UpdatePhotoImagePagesRequest $request, PhotoImagePage $photoImagePage)
    {
        if (! Gate::allows('photo_image_page_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        if($_FILES['photo']['name']){
            $photoImagePage->removeImg();
        }
        $photoImagePage->update($request->all());

        return redirect()->route('admin.photo_image_pages.index');
    }

    
    public function destroy($id)
    {
        if (! Gate::allows('photo_image_page_delete')) {
            return abort(401);
        }
        $photo_image_page = PhotoImagePage::findOrFail($id);
        $photo_image_page->delete();

        return redirect()->route('admin.photo_image_pages.index');
    }

    
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('photo_image_page_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PhotoImagePage::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    
    public function restore($id)
    {
        if (! Gate::allows('photo_image_page_delete')) {
            return abort(401);
        }
        $photo_image_page = PhotoImagePage::onlyTrashed()->findOrFail($id);
        $photo_image_page->restore();

        return redirect()->route('admin.photo_image_pages.index');
    }

    
    public function perma_del($id)
    {
        if (! Gate::allows('photo_image_page_delete')) {
            return abort(401);
        }
        $photo_image_page = PhotoImagePage::onlyTrashed()->findOrFail($id);
        $photo_image_page->forceDelete();
        $photo_image_page->remove();

        return redirect()->route('admin.photo_image_pages.index');
    }
}
