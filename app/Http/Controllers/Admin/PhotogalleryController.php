<?php

namespace App\Http\Controllers\Admin;

use App\Models\Photogallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PhotogalleryController extends Controller
{

    public function index()
    {
        $photogalleries = Photogallery::latest()->paginate(20);
        return view('admin.media.photo.index', compact('photogalleries'));
    }

    public function acnooFilter(Request $request)
    {
        $photogalleries = Photogallery::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.media.photo.datas', compact('photogalleries'))->render()
            ]);
        }

        return redirect(url()->previous());
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
            'gallery' => 'required'
        ]);
        if ($request->hasFile('image')) {

            foreach ($request->image as $image) {
                if ($image != '') {
                    $picture = 'maanphotogallery' . date('dmY_His') . '_' . $image->getClientOriginalName();
                    // image path
                    $image_url = 'uploads/images/photogallery/' . $picture;
                    //image base path
                    $destinationPath = public_path() . '/uploads/images/photogallery/';
                    $success = $image->move($destinationPath, $picture);
                    if ($success) {
                        $image_urls = $image_url;
                    }
                } else {
                    $image_urls = '';
                }
                $photogalleries = new Photogallery();
                $photogalleries->title = $request->title;
                $photogalleries->description = $request->description;
                if ($request->status) {
                    $photogalleries->status = 1;
                } else {
                    $photogalleries->status = 0;
                }
                $photogalleries->image = $image_urls;
                $photogalleries->user_id = Auth::user()->id;
                $photogalleries->save();

                $this->saveGallery($request->gallery, $photogalleries->id);
            }
        }
        return response()->json([
            'message' => __('Photo Gallery saved successfully'),
            'redirect' => route('admin.photogalleries.index')
        ]);
    }


    private function saveGallery($gallery, $id)
    {
        foreach ($gallery as $temp_path) {

            $temp_path =   json_decode($temp_path, true);
            if(is_array($temp_path)){
                $temp_path = $temp_path[0];
            }
            if (File::exists($temp_path)) {
                $image = 'uploads/images/photogallery/' . time() . '-' . mt_rand(111111, 999999) . '.' . File::extension($temp_path);
                File::move($temp_path, $image);
                GalleryImage::query()->create([
                    'photogallery_id' => $id,
                    'image' => $image,
                ]);
            }
        }
    }


    public function update(Request $request, $id)
    {
        $photogallery = Photogallery::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'gallery' => 'required'
        ]);
        if ($request->hasFile('image')) {

            foreach ($request->image as $image) {

                if ($photogallery->image) {
                    if (File::exists($photogallery->image)) {
                        unlink($photogallery->image);
                    }
                }

                $picture = 'maanphotogallery' . date('dmY_His') . '_' . $image->getClientOriginalName();
                // image path
                $image_url = 'uploads/images/photogallery/' . $picture;
                //image base path
                $destinationPath = public_path() . '/uploads/images/photogallery/';
                $success = $image->move($destinationPath, $picture);
                if ($success) {
                    $image_urls = $image_url;
                }
            }
        } else {
            $image_urls = $photogallery->image;
        }

        $photogallery->title = $request->title;
        $photogallery->description = $request->description;
        if ($request->status) {
            $photogallery->status = 1;
        } else {
            $photogallery->status = 0;
        }
        $photogallery->image = $image_urls;
        $photogallery->user_id = Auth::user()->id;
        $photogallery->save();


        $this->saveGallery($request->gallery, $photogallery->id);


        return response()->json([
            'message' => __('Photo Gallery update successfully'),
            'redirect' => route('admin.photogalleries.index')
        ]);
    }


    public function destroy(Photogallery $photogallery)
    {
        if (File::exists($photogallery->image)) {
            unlink($photogallery->image);
        }
        $photogallery->delete();

        return response()->json([
            'message' => __('Photo Gallery deleted successfully'),
            'redirect' => route('admin.photogalleries.index')
        ]);
    }

    public function deleteAll(Request $request)
    {
        $photogalleries = Photogallery::whereIn('id', $request->ids)->get();

        foreach ($photogalleries as $photogallery) {
            if (File::exists($photogallery->image)) {
                unlink($photogallery->image);
            }
        }

        Photogallery::destroy($request->ids);

        return response()->json([
            'message' => __('Selected Photo Gallery deleted successfully'),
            'redirect' => route('admin.photogalleries.index')
        ]);
    }

    public function status(Request $request, $id)
    {
        $status = Photogallery::findOrFail($id);
        $status->update(['status' => $request->status]);
        return response()->json(['message' => 'Photo Gallery']);
    }
}


