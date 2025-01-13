<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HeaderController extends Controller
{
    public function maanHeaderIndex()
    {
        $headers = Header::latest()->paginate(20);
        return view('admin.header.index', compact('headers'));
    }

    public function acnooFilter(Request $request)
    {
        $headers = Header::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.header.datas', compact('headers'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanHeaderCreate()
    {
        return view('admin.header.create');
    }
    public function maanHeaderStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
        ]);
        if ($request->hasFile('image')) {
            $header_imagename         = $request->file('image')->getClientOriginalName();
            $header_image             = 'maanheaderimage' . date('dmY_His') . '_' . $header_imagename;
            $header_image_url         = 'uploads/images/header/' . $header_image;
            $header_destinationPath   = public_path() . '/uploads/images/header/';
            $header_success           = $request->file('image')->move($header_destinationPath, $header_image);
            if ($header_success) {
                $header_image_urls = $header_image_url;
            }
        } else {
            $header_image_urls = '';
        }

        $header = new Header();
        $header->name       = $request->name;
        $header->name_slug  = Str::replace('-', '_', Str::slug($request->name));
        $header->image      = $header_image_urls;
        $header->save();

        return response()->json([
            'message'   => __('Header Created  Successfully.'),
            'redirect'  => route('admin.header.index')
        ]);
    }
    /**
     * Show the form for editing the Header.
     */
    public function maanHeaderEdit($id)
    {
        $header = Header::find($id);
        return view('admin.header.edit', compact('header'));
    }

    /**
     * update the Header from storage.
     */
    public function maanHeaderUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        if ($request->image) {
            $request->validate([
                'image' => 'required|image',
            ]);
        }

        $getimageurl = Header::where('id', $id)->value('image');
        if ($request->hasFile('image')) {
            if (File::exists($getimageurl)) {
                unlink($getimageurl);
            }
            $header_imagename         = $request->file('image')->getClientOriginalName();
            $header_image             = 'maanheaderimage' . date('dmY_His') . '_' . $header_imagename;
            $header_image_url         = 'uploads/images/header/' . $header_image;
            $header_destinationPath   = public_path() . '/uploads/images/header/';
            $header_success           = $request->file('image')->move($header_destinationPath, $header_image);
            if ($header_success) {
                $header_image_urls = $header_image_url;
            }
        } else {
            $header_image_urls = $getimageurl;
        }

        $header = Header::find($id);
        $header->name       = $request->name;
        $header->name_slug  = Str::replace('-', '_', Str::slug($request->name));
        $header->image      = $header_image_urls;
        $header->save();


        return response()->json([
            'message'   => __('Header Updated  Successfully.'),
            'redirect'  => route('admin.header.index')
        ]);
    }

    public function maanHeaderDestroy($id)
    {
        $header = Header::find($id);
        if (File::exists($header->image)) {
            unlink($header->image);
        }
        $header->delete();

        return response()->json([
            'message' => __('Header deleted successfully'),
            'redirect' => route('admin.header.index')
        ]);
    }

    public function deleteAll(Request $request)
    {
        $headers = Header::whereIn('id', $request->ids)->get();

        foreach ($headers as $header) {
            if (File::exists($header->image)) {
                unlink($header->image);
            }

            $header->delete();
        }

        return response()->json([
            'message' => __('Selected headers deleted successfully'),
            'redirect' => route('admin.header.index')
        ]);
    }

    public function status(Request $request, $id)
    {
        $status = Header::findOrFail($id);
        $status->update(['status' => $request->status]);
        return response()->json(['message' => 'Header']);
    }

    public function isActive(Request $request, $id)
    {
        $is_active = Header::findOrFail($id);
        $is_active->update(['is_active' => $request->is_active]);
        return response()->json(['message' => 'Header']);
    }
}
