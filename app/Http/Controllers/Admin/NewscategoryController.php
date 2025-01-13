<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HasUploader;
use App\Http\Controllers\Controller;
use App\Models\Newscategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewscategoryController extends Controller
{
    use HasUploader;
    public function maanNewsCategoryIndex()
    {
        $categories = Newscategory::latest()->paginate(20);
        return view('admin.news.category.index', compact('categories'));
    }

    public function acnooFilter(Request $request)
    {
        $categories = Newscategory::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%')
                    ->orWhere('slug', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.news.category.datas', compact('categories'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanNewsCategoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'image' => 'required'
        ]);
        //image validation..
        if ($request->image != '') {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:150|dimensions:max_width=2400,max_height=2400',
            ], [

                'image.dimensions'    => 'Required image maximum  750x400 image',
                'image.max'  => 'image size should not be more than 150 kB'
            ]);
        }
        $getnewscategoryexist = Newscategory::where('type', $request->type)->exists();
        //return $getnewscategoryexist;
        if ($getnewscategoryexist) {
            $getnewscategory = Newscategory::where('type', $request->type)->first();
            if ($getnewscategory->type == 'home' || $getnewscategory->type == 'contact') {
                $newscategories = $getnewscategory;
            } else {
                $newscategories           = new Newscategory();
            }
        } else {
            $newscategories           = new Newscategory();
        }


        $newscategories->name     = trim($request->name);
        $newscategories->slug     = trim(strtolower($request->slug));
        $newscategories->type     = trim(strtolower($request->type));
        $newscategories->user_id  = Auth()->user()->id;
        $newscategories->image  = $request->image ? $this->upload($request, 'image') : null;
        $newscategories->save();

        return response()->json([
            'message'   => __('News category saved successfully'),
            'redirect'  => route('admin.news.category')
        ]);
    }

    public function maanNewsCategoryUpdate(Request $request, Newscategory $newscategory)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'type' => 'required',
        ]);
        if ($request->image != '') {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:150|dimensions:max_width=750,max_height=400',
            ], [

                'image.dimensions'    => 'Required image maximum 750x400 image',
                'image.max'           => 'image size should not be more than 150 kB'
            ]);
        }

         $image = $request->image ? $this->upload($request, 'image', $newscategory->image) :  $newscategory->image;


        Newscategory::updateOrCreate(
            ['id' => $newscategory->id],
            ['name' => $request->name, 'slug' => trim(strtolower($request->slug)), 'type' => trim(strtolower($request->type)), 'image' => $image, 'user_id' => Auth()->user()->id]
        );

        return response()->json([
            'message'   => __('News category updated successfully'),
            'redirect'  => route('admin.news.category')
        ]);
    }

    public function maanNewsCategoryDestroy(Newscategory $newscategory)
    {
        $newscategory->delete();

        return response()->json([
            'message' => 'News Category deleted successfully',
            'redirect' => route('admin.news.category')
        ]);
    }

    public function status(Request $request, $id)
    {
        $category = Newscategory::findOrFail($id);
        $category->update(['menu_publish' => $request->menu_publish]);

        return response()->json(['message' => 'Newscategory']);
    }


    public function deleteAll(Request $request)
    {
        $categories = Newscategory::whereIn('id', $request->ids)->get();

        foreach ($categories as $category) {
            if (File::exists($category->image)) {
                unlink($category->image);
            }
        }

        Newscategory::destroy($request->ids);

        return response()->json([
            'message' => __('Selected News Category deleted successfully'),
            'redirect' => route('admin.news.category')
        ]);
    }
}
