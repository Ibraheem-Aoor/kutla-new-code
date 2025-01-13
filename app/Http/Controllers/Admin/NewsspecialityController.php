<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsspeciality;
use Illuminate\Http\Request;

class NewsspecialityController extends Controller
{
    public function maanNewsSpecialityIndex()
    {
        $specialities = Newsspeciality::latest()->paginate(20);
        return view('admin.news.speciality.index',compact('specialities'));
    }

    public function acnooFilter(Request $request)
    {
        $specialities = Newsspeciality::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.news.speciality.datas', compact('specialities'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanNewsSpecialityStore(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        Newsspeciality::create($request->all());

        return response()->json([
            'message'   => __('News Speciality saved successfully'),
            'redirect'  => route('admin.news.speciality')
        ]);
    }

    public function maanNewsSpecialityUpdate(Request $request,Newsspeciality $newsspeciality)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $newsspeciality->update($request->all());

        return response()->json([
            'message'   => __('News speciality updated successfully'),
            'redirect'  => route('admin.news.speciality')
        ]);

    }
}
