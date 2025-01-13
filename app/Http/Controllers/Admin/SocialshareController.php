<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socialshare;
use Illuminate\Http\Request;

class SocialshareController extends Controller
{
    public function maanSocialIndex()
    {
        $socials = Socialshare::latest()->paginate(20);
        return view('admin.social.index',compact('socials'));
    }

    public function acnooFilter(Request $request)
    {
        $socials = Socialshare::when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('url', 'like', '%' . request('search') . '%')
                  ->orWhere('icon_code', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.social.datas', compact('socials'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanSocialStore(Request $request)
    {
        $request->validate([
            'url'=>'required',
            'icon_code'=>'required',
            'follower'=>'required'
        ]);

        $socials            = new Socialshare();
        $socials->url       = $request->url;
        $socials->icon_code = $request->icon_code;
        $socials->follower    = $request->follower;
        $socials->save();

        return response()->json([
            'message'   => __('Social Share save successfully'),
            'redirect'  => route('admin.social.index')
        ]);

    }
    public function maanSocialUpdate(Request $request,Socialshare $socialshare)
    {
        $request->validate([
            'url'=>'required',
            'icon_code'=>'required',
            'follower'=>'required'
        ]);

        $socialshare->url       = $request->url;
        $socialshare->icon_code = $request->icon_code;
        $socialshare->follower    = $request->follower;
        $socialshare->save();

        return response()->json([
            'message'   => __('Social Share Updated successfully'),
            'redirect'  => route('admin.social.index')
        ]);

    }

    public function maanSocialDestroy(Socialshare $socialshare)
    {
        $socialshare->delete();
        return response()->json([
            'message'   => __('Social Share Deleted successfully'),
            'redirect'  => route('admin.social.index')
        ]);
    }

    public function deleteAll(Request $request)
    {
        Socialshare::whereIn('id', $request->ids)->delete();
        return response()->json([
            'message' => __('Selected Socialshare deleted successfully'),
            'redirect' => route('admin.social.index')
        ]);
    }
}
