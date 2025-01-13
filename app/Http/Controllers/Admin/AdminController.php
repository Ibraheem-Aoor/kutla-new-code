<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\News;
use App\Models\User;
use App\Models\Maanuser;
use App\Http\Controllers\Controller;
use App\Models\Newscategory;
use App\Models\Newscomment;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:dashboard-read')->only('index');
    }

    public function maanDashboard()
    {
        $admin = User::where('user_type','>=','3')->where('is_active','1')->count();
        $publish_news = News::where('status',1)->count();
        $unpublish_news = News::where('status',0)->count();
        $breaking_news = News::where('breaking_news',1)->count();
        $total_blogs = Blog::count();
        $subscribe = Maanuser::count();
        $total_viewers = News::sum('viewers');
        $total_free_users = User::count();
        $total_language = count(languages());
        $total_news_category = Newscategory::count();

        $most_viewed_news = News::withCount('comments')->with('subCategories')->orderBy('viewers', 'desc')->take(5)->get();
        $latest_comments = Newscomment::latest()->take(5)->get();

        return view('admin.dashboard.index',compact('admin','publish_news','unpublish_news','subscribe','breaking_news','total_blogs','most_viewed_news','latest_comments','total_viewers', 'total_free_users', 'total_language', 'total_news_category')) ;
    }

    public function yearlyStatistics()
    {

        $year = request('year') ?? date('Y');

    $data['users'] = User::whereYear('created_at', $year)
        ->selectRaw('MONTHNAME(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderByRaw('MONTH(created_at)')
        ->get();

    $data['subscriber'] = Maanuser::whereYear('created_at', $year)
        ->selectRaw('MONTHNAME(created_at) as month, COUNT(*) as total')
        ->groupBy('month')
        ->orderByRaw('MONTH(created_at)')
        ->get();

    return response()->json($data);
    }

    public function categoryStatistics()
    {
        $year = date('Y'); // Always use the current year

        // Get total news count grouped by category
        $data['categories'] = Newscategory::withCount(['news' => function ($query) use ($year) {
            $query->whereYear('news.created_at', $year)
            ->where('news.status', 1);
        }])->get()->map(function ($category) {
            return [
                'name' => $category->name,
                'total' => $category->count(),
            ];
        });

        return response()->json($data);
    }
}
