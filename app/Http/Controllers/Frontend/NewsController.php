<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Newscategory;
use App\Models\Newscomment;
use App\Models\Socialshare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function maanNewsComment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);
        $newscomments = new Newscomment();
        $newscomments->news_id = $id;
        $newscomments->name = $request->name;
        $newscomments->email = $request->email;
        $newscomments->comment = $request->comment;
        $newscomments->save();
        return redirect()->back();
    }

    public function maanNews($category_name)
    {
        $newscategorysingle = Newscategory::where('name', ucfirst($category_name))->where('menu_publish', 1)->firstOrFail();

        $allnews = News::join('newssubcategories', 'news.subcategory_id', '=', 'newssubcategories.id')
            ->join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
            ->join('users', 'news.reporter_id', '=', 'users.id')
            ->select('news.id', 'news.title', 'news.summary', 'news.description', 'news.image', 'news.date', 'newssubcategories.name as news_subcategory', 'newscategories.name as news_category', 'newscategories.slug as news_categoryslug', DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('newscategories.id', $newscategorysingle->id ?? NULL)
            ->where('news.status', 1)
            ->orderByDesc('news.id')
            ->paginate(20);

        $popularallnews = News::join('newssubcategories', 'news.subcategory_id', '=', 'newssubcategories.id')
            ->join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
            ->select('news.id', 'news.title', 'news.image', 'news.date', 'newscategories.slug as news_categoryslug')
            ->where('newscategories.id', $newscategorysingle->id ?? NULL)
            ->where('news.status', 1)
            ->orderByDesc('news.viewers')
            ->limit(4)
            ->get();

        $recentallnews = News::join('newssubcategories', 'news.subcategory_id', '=', 'newssubcategories.id')
            ->join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
            ->select('news.id', 'news.title', 'news.image', 'news.date', 'newscategories.slug as news_categoryslug')
            ->where('newscategories.id', $newscategorysingle->id ?? NULL)
            ->where('news.status', 1)
            ->orderByDesc('news.id')
            ->limit(5)
            ->get();

        return view('frontend.pages.news', compact('allnews', 'popularallnews', 'recentallnews', 'newscategorysingle'));
    }

    public function maanNewsDetails($post, $slug = null)
    {
        $viewers = News::where('id', $post)->value('viewers');
        $data['viewers'] = $viewers + 1;

        News::where('id', $post)->update($data);
        $newscomments = Newscomment::where('news_id', $post)->paginate(20);

        $getnews = News::join('newssubcategories', 'news.subcategory_id', '=', 'newssubcategories.id')
            ->join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
            ->join('users', 'news.reporter_id', '=', 'users.id')
            ->select(
                'news.id',
                'news.title',
                'news.summary',
                'news.description',
                'news.meta_keyword',
                'news.meta_description',
                'news.image',
                'news.date',
                'news.shortlink',
                'newssubcategories.name as news_subcategory',
                'newscategories.name as news_category',
                'newscategories.slug as news_categoryslug',

                DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name")
            )
            ->where('news.id', $post)
            ->where('news.status', 1)
            ->first();

        $relatedgetsnews = News::join('newssubcategories', 'news.subcategory_id', '=', 'newssubcategories.id')
            ->join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
            ->join('users', 'news.reporter_id', '=', 'users.id')
            ->select('news.id', 'news.title', 'news.summary', 'news.image', 'news.date', 'newscategories.slug as news_categoryslug', DB::raw("CONCAT(users.first_name,' ',users.last_name) AS reporter_name"))
            ->where('news.id', '!=', $post)
            ->where('news.status', 1)
            ->where('newscategories.name', $getnews->news_category)
            ->orderByDesc('news.id')
            ->limit(3)
            ->get();

        return view('frontend.pages.news_details', compact('getnews', 'relatedgetsnews', 'newscomments'));
    }

    public function maanNewsDetailsShortLink($shortlink)
    {
        $post = News::query()->select('id', 'shortlink')->whereShortlink($shortlink)->firstOrFail();
        return $this->maanNewsDetails($post->id);
    }
}
