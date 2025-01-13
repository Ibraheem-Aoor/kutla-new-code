<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemeController extends Controller
{
    public function maanThemeIndex ()
    {
        $themes = Theme::where('status',1)->paginate(20);
        return view('admin.themes.index',compact('themes'));
    }

    public function maanThemeStore(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'version'=>'required',
            'page'=>'required|unique:themes',
            'image'=>'nullable'
        ]);
        $data = $request->only('title','author','version','description','page');
        $data['page_slug'] = Str::replace('-', '_',Str::slug($request->page));
        if ($request->image!='') {
            $data['image'] = imageUpload($request->file('image'),'uploads/images/theme/',null,trim(str_replace(' ', '_', strtolower($request->title))));
        }
        Theme::create($data);
        //redirect route

        return response()->json([
            'message'   => __('Theme saved successfully'),
            'redirect'  => route('admin.theme.index')
        ]);
    }
    public function maanThemeUpdate(Request $request,Theme $theme)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'version'=>'required',
            'page'=>'required|unique:themes,page,'.$theme->id,
        ]);
        $data = $request->only('title','author','version','description','page');
        $data['page_slug'] = Str::replace('-', '_',Str::slug($request->page));
        if ($request->image!='') {
            $data['image'] = imageUpload($request->file('image'),'uploads/images/theme/',$theme->image,trim(str_replace(' ', '_', strtolower($request->title))));
        }
        $theme->update($data);

        return response()->json([
            'message'   => __('Theme Update successfully'),
            'redirect'  => route('admin.theme.index')
        ]);
    }

    public function maanThemeColor()
    {
        return view('admin.themes.color');
    }
}
