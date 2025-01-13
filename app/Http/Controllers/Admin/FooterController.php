<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FooterController extends Controller
{
    public function maanFooterIndex()
    {
        $footers = Footer::latest()->paginate(20);
        return view('admin.footer.index', compact('footers'));
    }

    public function acnooFilter(Request $request)
    {
        $footers = Footer::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.footer.datas', compact('footers'))->render()
            ]);
        }

        return redirect(url()->previous());
    }


    public function maanFooterCreate()
    {
        return view('admin.footer.create');
    }

    public function maanFooterStore(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'image' => 'image',
        ]);
        if ($request->hasFile('image')) {
            $footer_imagename         = $request->file('image')->getClientOriginalName();
            $footer_image             = 'maanfooterimage' . date('dmY_His') . '_' . $footer_imagename;
            $footer_image_url         = 'uploads/images/footer/' . $footer_image;
            $footer_destinationPath   = public_path() . '/uploads/images/footer/';
            $footer_success           = $request->file('image')->move($footer_destinationPath, $footer_image);
            if ($footer_success) {
                $footer_image_urls = $footer_image_url;
            }
        } else {
            $footer_image_urls = '';
        }

        $footer = new Footer();
        $footer->name       = $request->name;
        $footer->name_slug  = Str::replace('-', '_', Str::slug($request->name));
        $footer->image      = $footer_image_urls;
        $footer->save();

        return response()->json([
            'message'   => __('Footer Created  Successfully.'),
            'redirect'  => route('admin.footer.index')
        ]);
    }
    /**
     * Show the form for editing the Footer.
     */
    public function maanFooterEdit($id)
    {
        $footer = Footer::find($id);
        return view('admin.footer.edit', compact('footer'));
    }

    /**
     * update the Footer from storage.
     */
    public function maanFooterUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'image' => 'image',
        ]);

        $getimageurl = Footer::where('id', $id)->value('image');
        if ($request->hasFile('image')) {
            if (File::exists($getimageurl)) {
                unlink($getimageurl);
            }
            $footer_imagename         = $request->file('image')->getClientOriginalName();
            $footer_image             = 'maanfooterimage' . date('dmY_His') . '_' . $footer_imagename;
            $footer_image_url         = 'uploads/images/footer/' . $footer_image;
            $footer_destinationPath   = public_path() . '/uploads/images/footer/';
            $footer_success           = $request->file('image')->move($footer_destinationPath, $footer_image);
            if ($footer_success) {
                $footer_image_urls = $footer_image_url;
            }
        } else {
            $footer_image_urls = $getimageurl;
        }

        $footer = Footer::find($id);
        $footer->name       = $request->name;
        $footer->name_slug  = Str::replace('-', '_', Str::slug($request->name));
        $footer->image      = $footer_image_urls;
        $footer->save();

        return response()->json([
            'message'   => __('Footer Updated  Successfully.'),
            'redirect'  => route('admin.footer.index')
        ]);
    }

    public function maanFooterDestroy($id)
    {
        $footer = Footer::find($id);
        if (File::exists($footer->image)) {
            unlink($footer->image);
        }
        $footer->delete();
        return response()->json([
            'message' => __('Footer deleted successfully'),
            'redirect' => route('admin.footer.index')
        ]);
    }

    public function deleteAll(Request $request)
    {
        $footers = Footer::whereIn('id', $request->ids)->get();

        foreach ($footers as $footer) {
            if (File::exists($footer->image)) {
                unlink($footer->image);
            }

            $footer->delete();
        }

        return response()->json([
            'message' => __('Selected footers deleted successfully'),
            'redirect' => route('admin.footer.index')
        ]);
    }

    public function status(Request $request, $id)
    {
        $status = Footer::findOrFail($id);
        $status->update(['status' => $request->status]);
        return response()->json(['message' => 'Footer']);
    }

    public function isActive(Request $request, $id)
    {
        $is_active = Footer::findOrFail($id);
        $is_active->update(['is_active' => $request->is_active]);
        return response()->json(['message' => 'Footer']);
    }

}
