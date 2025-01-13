<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videogallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VideogalleryController extends Controller
{
    public function maanVideogalleryIndex()
    {
        $videogalleries = Videogallery::latest()->paginate(20);
        return view('admin.media.video.index', compact('videogalleries'));
    }

    public function acnooFilter(Request $request)
    {
        $videogalleries = Videogallery::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.media.video.datas', compact('videogalleries'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanVideogalleryCreate()
    {
        return view('admin.media.video.create');
    }

    public function maanVideoGalleryStore(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_option' => 'required',
            'image' => 'required',
        ]);
        if ($request->hasFile('video')) {
            $request->validate([
                'video' => 'required',
            ]);

            $videos            = 'maanvideogallery' . date('dmY_His') . '_' . $request->video->getClientOriginalName();
            // video path
            $video_url          = 'uploads/videos/videogallery/' . $videos;
            //video base path
            $destinationPath    = public_path() . '/uploads/videos/videogallery/';
            $success            = $request->video->move($destinationPath, $videos);
            if ($success) {
                $video_urls     = $video_url;
            }
        } else {
            $video_urls         = '';
        }

        if ($request->hasFile('image')){
                    $picture            = 'maanvideogallery'.date('dmY_His').'_'.$request->image->getClientOriginalName();
                    // image path
                    $image_url          = 'uploads/videos/videogallery/' . $picture;
                    //image base path
                    $destinationPath    = public_path() . '/uploads/videos/videogallery/';
                    $success            = $request->image->move($destinationPath, $picture);
                    if ($success){
                        $image_urls     = $image_url ;
                    }
                }else{
                    $image_urls         = '' ;
                }

        if ($request->video_option == 'Share Link') {
            $video_urls = $request->share_link;
        }
        $videogalleries = new Videogallery();
        $videogalleries->title = $request->title;
        $videogalleries->description = $request->description;
        $videogalleries->video_option = $request->video_option;
        $videogalleries->video = $video_urls;
        if ($request->status) {
            $videogalleries->status = 1;
        } else {
            $videogalleries->status = 0;
        }
        if ($request->video_source) {
            $videogalleries->video_source = $request->video_source;
        } else {
            $videogalleries->video_source = 'Maantheme';
        }
        if ($request->image != '') {
            $videogalleries->image = $image_urls;
        }
        $videogalleries->user_id = Auth::user()->id;
        $videogalleries->save();

        return response()->json([
            'message'   => __('Video Gallery Saved successfully.'),
            'redirect'  => route('admin.videogallery')
        ]);
    }

    public function maanVideogalleryEdit(Videogallery $videogallery)
    {
        return view('admin.media.video.edit', compact('videogallery'));
    }

    public function maanVideogalleryUpdate(Request $request, Videogallery $videogallery)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_option' => 'required',
            'image' => 'required',

        ]);
        if ($request->hasFile('video')) {
            $request->validate([
                'video' => 'required|max:2048',
            ]);

            if (File::exists($videogallery->video)) {
                unlink($videogallery->video);
            }
            $videos            = 'maanvideogallery' . date('dmY_His') . '_' . $request->video->getClientOriginalName();
            // video path
            $video_url          = 'uploads/videos/videogallery/' . $videos;
            //video base path
            $destinationPath    = public_path() . '/uploads/videos/videogallery/';
            $success            = $request->video->move($destinationPath, $videos);
            if ($success) {
                $video_urls     = $video_url;
            }
        } else {
            $video_urls     = $videogallery->video;
        }

        if ($request->hasFile('image')){

            foreach ($request->image as $image){
            if ($videogallery->image){
                if (File::exists($videogallery->image)){
                    unlink($videogallery->image);
                }
            }

            $picture            = 'maanvideogallery'.date('dmY_His').'_'.$image->getClientOriginalName();
            // image path
            $image_url          = 'uploads/videos/videogallery/' . $picture;
            //image base path
            $destinationPath    = public_path() . '/uploads/videos/videogallery/';
            $success            = $image->move($destinationPath, $picture);
            if ($success){
                $image_urls     = $image_url ;
            }
          }
        }else{
            $image_urls         = $videogallery->image ;
        }
        if ($request->video_option == 'Share Link') {
            $video_urls = $request->share_link;
        }

        $videogallery->title = $request->title;
        $videogallery->description = $request->description;
        $videogallery->video_option = $request->video_option;
        $videogallery->video = $video_urls;
        if ($request->status) {
            $videogallery->status = 1;
        } else {
            $videogallery->status = 0;
        }
        if ($request->video_source) {
            $videogallery->video_source = $request->video_source;
        } else {
            $videogallery->video_source = 'Maantheme';
        }
        if ($request->image != '') {
            $videogallery->image = $image_urls;
        }
        $videogallery->user_id = Auth::user()->id;
        $videogallery->save();

        return response()->json([
            'message'   => __('Video Gallery Updated successfully.'),
            'redirect'  => route('admin.videogallery')
        ]);
    }

    public function maanVideogalleryDestroy(Videogallery $videogallery)
    {
        if (File::exists($videogallery->video)) {
            unlink($videogallery->video);
        }
        if (File::exists($videogallery->image)) {
            unlink($videogallery->image);
        }
        $videogallery->delete();

        return response()->json([
            'message' => 'Video Gallery deleted successfully',
            'redirect' => route('admin.videogallery')
        ]);
    }

    public function deleteAll(Request $request)
    {
        $videogalleries = Videogallery::whereIn('id', $request->ids)->get();

        foreach ($videogalleries as $videogallery) {
            if (File::exists($videogallery->video)) {
                unlink($videogallery->video);
            }

            if (File::exists($videogallery->image)) {
                unlink($videogallery->image);
            }
        }

        Videogallery::destroy($request->ids);

        return response()->json([
            'message' => __('Selected Video Galleries deleted successfully'),
            'redirect' => route('admin.videogallery')
        ]);
    }

    public function status(Request $request, $id)
    {
        $status = Videogallery::findOrFail($id);
        $status->update(['status' => $request->status]);
        return response()->json(['message' => 'Video Gallery']);
    }
}
