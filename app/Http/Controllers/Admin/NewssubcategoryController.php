<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newscategory;
use App\Models\Newssubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewssubcategoryController extends Controller
{
    public function maanNewsSubcategoryIndex()
    {
        $categories = Newscategory::all();
        $subcategories = Newssubcategory::with('newscategory')->latest()->paginate(20);

        return view('admin.news.subcategory.index', compact('subcategories', 'categories'));
    }

    public function acnooFilter(Request $request)
    {
        $subcategories = Newssubcategory::with('newscategory')
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                        ->orWhereHas('newscategory', function ($q) use ($request) {
                            $q->where('name', 'like', '%' . $request->search . '%');
                        });
                });
            })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.news.subcategory.datas', compact('subcategories'))->render()
            ]);
        }

        return redirect(url()->previous());
    }


    public function maanNewsSubcategoryStore(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'category_id'   => 'required'
        ]);

        $request->request->add(['user_id' => Auth::user()->id]);

        Newssubcategory::create($request->all());

        return response()->json([
            'message'   => __('News Subcategory saved successfully'),
            'redirect'  => route('admin.news.subcategory')
        ]);
    }

    public function maanNewsSubcategoryUpdate(Request $request, Newssubcategory $newssubcategory)
    {
        $request->validate([
            'name'          => 'required',
            'category_id'   => 'required'
        ]);

        $request->request->add(['user_id' => Auth::user()->id]);

        $newssubcategory->update($request->all());


        return response()->json([
            'message'   => __('News Subcategory updated successfully'),
            'redirect'  => route('admin.news.subcategory')
        ]);
    }

    public function maanNewsSubcategoryDestroy(Newssubcategory $newssubcategory)
    {
        $newssubcategory->delete();

        return response()->json([
            'message' => 'News Subcategory deleted successfully',
            'redirect' => route('admin.news.subcategory')
        ]);
    }

    public function deleteAll(Request $request)
    {
        Newssubcategory::whereIn('id', $request->ids)->delete();
        return response()->json([
            'message' => __('Selected News Subcategory deleted successfully'),
            'redirect' => route('admin.news.subcategory')
        ]);
    }
}
