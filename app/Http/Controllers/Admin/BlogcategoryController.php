<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blogcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogcategoryController extends Controller
{
    public function maanBlogCategoryIndex()
    {
        $categories = Blogcategory::latest()->paginate(20);
        return view('admin.blog.category.index', compact('categories'));
    }

    public function acnooFilter(Request $request)
    {
        $categories = Blogcategory::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.blog.category.datas', compact('categories'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanBlogCategoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $blogcategory           = new Blogcategory();
        $blogcategory->name     = $request->name;
        $blogcategory->user_id  = Auth()->user()->id;
        $blogcategory->save();

        return response()->json([
            'message'   => __('Blog category saved successfully'),
            'redirect'  => route('admin.blog.category')
        ]);
    }

    public function maanBlogCategoryUpdate(Request $request, $id)
    {
        $blogcategory = Blogcategory::findOrFail($id);

        $request->validate([
            'name' => 'required'
        ]);

        $blogcategory->update([
            'name' => $request->name,
            'user_id' => Auth::id()
        ]);
        return response()->json([
            'message'   => __('Blog category updated successfully'),
            'redirect'  => route('admin.blog.category')
        ]);
    }

    public function maanBlogCategoryDestroy(Blogcategory $blogcategory)
    {
        $blogcategory->delete();
        return response()->json([
            'message'   => __('Blog Deleted successfully'),
            'redirect'  => route('admin.blog.category')
        ]);
    }

    public function deleteAll(Request $request)
    {
        Blogcategory::whereIn('id', $request->ids)->delete();
        return response()->json([
            'message' => __('Selected Blog category deleted successfully'),
            'redirect' => route('admin.blog.category')
        ]);
    }
}
