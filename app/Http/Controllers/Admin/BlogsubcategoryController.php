<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogcategory;
use App\Models\Blogsubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsubcategoryController extends Controller
{
    public function maanBlogSubcategoryIndex()
    {
        $categories = Blogcategory::all();
        $subcategories = Blogsubcategory::latest()->paginate(20);

        return view('admin.blog.subcategory.index',compact('subcategories','categories'));
    }

    public function acnooFilter(Request $request)
    {
        $subcategories = Blogsubcategory::with('blogcategory')
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                        ->orWhereHas('blogcategory', function ($q) use ($request) {
                            $q->where('name', 'like', '%' . $request->search . '%');
                        });
                });
            })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.blog.subcategory.datas', compact('subcategories'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanBlogSubcategoryStore(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'category_id'   => 'required'
        ]);

        $request->request->add([ 'user_id'=>Auth::user()->id ]);

        Blogsubcategory::create($request->all());

        return response()->json([
            'message'   => __('Blog Subcategory saved successfully'),
            'redirect'  => route('admin.blog.subcategory')
        ]);

    }

    public function maanBlogSubcategoryUpdate(Request $request, Blogsubcategory $blogsubcategory)
    {
        $request->validate([
            'name'          => 'required',
            'category_id'   => 'required'
        ]);

        $request->request->add([ 'user_id'=>Auth::user()->id ]);

        $blogsubcategory->update($request->all());

        return response()->json([
            'message'   => __('Blog Subcategory updated successfully'),
            'redirect'  => route('admin.blog.subcategory')
        ]);

    }

    public function maanBlogSubcategoryDestroy(Blogsubcategory $blogsubcategory)
    {
        $blogsubcategory->delete();
        return response()->json([
            'message'   => __('Blog Subcategory Deleted successfully'),
            'redirect'  => route('admin.blog.subcategory')
        ]);
    }

    public function deleteAll(Request $request)
    {
        Blogsubcategory::whereIn('id', $request->ids)->delete();
        return response()->json([
            'message' => __('Selected Blog Subcategory deleted successfully'),
            'redirect' => route('admin.blog.subcategory')
        ]);
    }
}
