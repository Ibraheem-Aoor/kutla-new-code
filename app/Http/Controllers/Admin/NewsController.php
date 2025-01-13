<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HasUploader;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Newscategory;
use App\Models\Newsspeciality;
use App\Models\Newssubcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    use HasUploader;
    public function maanNewsIndex()
    {
       $newsall = News::orderByDesc('id')->paginate(20);
        return view('admin.news.news.index', compact('newsall'));
    }

    public function acnooFilter(Request $request)
    {
        $newsall = News::orderByDesc('id')->when(request('search'), function ($q) {
            $q->where(function ($q) {
                $q->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('summary', 'like', '%' . request('search') . '%');
            });
        })
            ->latest()
            ->paginate($request->per_page ?? 20);

        if ($request->ajax()) {
            return response()->json([
                'data' => view('admin.news.news.datas', compact('newsall'))->render()
            ]);
        }

        return redirect(url()->previous());
    }

    public function maanNewsCreate(Request $request)
    {
        if ($request->ajax()) {
            $newssubcategory = Newssubcategory::where('category_id', $request->newscategory_id)->get();
            return response()->json($newssubcategory);
        }

        $newscategories     = Newscategory::where('type', 'news')->get();
        $newsspecialities   = Newsspeciality::all();
        $newsreporters      = User::where('user_type', '0')->get();
        return view('admin.news.news.create', compact('newscategories', 'newsspecialities', 'newsreporters'));
    }

    public function maanNewsStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'date' => 'required',
            'tags.*' => 'required',
            'speciality_id' => 'required',
            'reporter_id' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);

        $data['title']          = $request->title;
        $data['summary']        = trim($request->summary);
        $data['description']    = trim($request->description);
        $data['subcategory_id'] = $request->subcategory_id;
        $data['date']           = date('Y-m-d', strtotime($request->date));
        $data['tags']           = is_array($request->tags) ? implode(',', $request->tags) : $request->tags;
        $data['speciality_id']  = $request->speciality_id;
        $data['reporter_id']    = $request->reporter_id;
        $data['meta_keyword']    = $request->meta_keyword;
        $data['meta_description']    = $request->meta_description;
        if ($request->status) {
            $data['status']     = 1;
        } else {
            $data['status']     = 0;
        }
        if ($request->breaking_news) {
            $data['breaking_news'] = 1;
        } else {
            $data['breaking_news'] = 0;
        }
        $data['image'] = $request->image ? json_encode($this->multipleUpload($request, 'image')) : null;
        $data['user_id']        = Auth::user()->id;
        News::create($data);

        //post count
        $postcount                  = Newscategory::where('id', $request->category_id)->value('post_counter');
        $datapost['post_counter']   = $postcount + 1;
        Newscategory::where('id', $request->category_id)->update($datapost);

        return response()->json([
            'message'   => __('News Created Successfully.'),
            'redirect'  => route('admin.news')
        ]);

    }

    public function maanNewsEdit(Request $request, News $news)
    {
        $newscategories         = Newscategory::where('type', 'news')->get();
        $newsspecialities       = Newsspeciality::all();
        $newsreporters          = User::where('user_type', '0')->get();
        $newscategoryid         = Newssubcategory::where('id', $news->subcategory_id)->value('category_id');
        $newssubcategories      = Newssubcategory::where('category_id', $newscategoryid)->get();
        if ($request->ajax()) {
            $newssubcategory    = Newssubcategory::where('category_id', $request->newscategory_id)->get();
            return response()->json($newssubcategory);
        }
        return view('admin.news.news.edit', compact('news', 'newscategories', 'newsspecialities', 'newsreporters', 'newscategoryid', 'newssubcategories'));
    }


    public function maanNewsUpdate(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'date' => 'required',
            'tags.*' => 'required',
            'speciality_id' => 'required',
            'reporter_id' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ]);


        $data['title']              = $request->title;
        $data['summary']            = trim($request->summary);
        $data['description']        = trim($request->description);
        $data['subcategory_id']     = $request->subcategory_id;
        $data['date']               = date('Y-m-d', strtotime($request->date));
        $data['tags']               = is_array($request->tags) ? implode(',', $request->tags) : $request->tags;
        $data['speciality_id']      = $request->speciality_id;
        $data['reporter_id']        = $request->reporter_id;
        $data['meta_keyword']       = $request->meta_keyword;
        $data['meta_description']   = $request->meta_description;
        if ($request->status) {
            $data['status']         = 1;
        } else {
            $data['status']           = 0;
        }
        if ($request->breaking_news) {
            $data['breaking_news'] = 1;
        } else {
            $data['breaking_news'] = 0;
        }
        $oldImages = $news->image ? json_decode($news->image, true) : [];
        $data['image'] = $request->image ? $this->multipleUpload($request, 'image', $oldImages) : $oldImages;
        $data['user_id']        = Auth::user()->id;
        News::where('id', $news->id)->update($data);

        return response()->json([
            'message'   => __('News Updated Successfully.'),
            'redirect'  => route('admin.news')
        ]);
    }

    public function maanNewsDestroy(News $news)
    {
        $images = json_decode($news->image);

        if (is_array($images) || is_object($images)) {
            foreach ($images as $image) {
                if (File::exists($image)) {
                    unlink($image);
                }
            }
        } else {
        }

        $news->delete();

        $postcount = Newssubcategory::join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
            ->where('newssubcategories.id', $news->subcategory_id)
            ->select('newscategories.id', 'newscategories.post_counter')
            ->first();

        if ($postcount) {
            $datapost['post_counter'] = max(0, $postcount->post_counter - 1);

            Newscategory::where('id', $postcount->id)->update($datapost);
        }

        return response()->json([
            'message' => 'News deleted successfully',
            'redirect' => route('admin.news')
        ]);
    }

    public function status(Request $request, $id)
    {
        $status = News::findOrFail($id);
        $status->update(['status' => $request->status]);
        return response()->json(['message' => 'News']);
    }

    public function breakingStatus(Request $request, $id)
    {
        $breaking_news = News::findOrFail($id);
        $breaking_news->update(['breaking_news' => $request->breaking_news]);
        return response()->json(['message' => 'Breaking News']);
    }

    public function deleteAll(Request $request)
    {
        $newsItems = News::whereIn('id', $request->ids)->get();

        foreach ($newsItems as $news) {
            $images = json_decode($news->image);

            if (is_array($images) || is_object($images)) {
                foreach ($images as $image) {
                    if (File::exists($image)) {
                        unlink($image);
                    }
                }
            }

            $postcount = Newssubcategory::join('newscategories', 'newssubcategories.category_id', '=', 'newscategories.id')
                ->where('newssubcategories.id', $news->subcategory_id)
                ->select('newscategories.id', 'newscategories.post_counter')
                ->first();

            if ($postcount) {
                $datapost['post_counter'] = max(0, $postcount->post_counter - 1);
                Newscategory::where('id', $postcount->id)->update($datapost);
            }
        }
        News::destroy($request->ids);

        return response()->json([
            'message' => __('Selected News deleted successfully'),
            'redirect' => route('admin.news')
        ]);
    }
}
