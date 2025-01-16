<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Seooptimization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Spatie\Sitemap\SitemapGenerator;

class SeooptimizationController extends Controller
{
    public function maanSeooptimzationIndex()
    {
        $seooptimizations = Seooptimization::all();
        return view('admin.seo.index',compact('seooptimizations'));
    }

    public function maanSeooptimzationStore(Request $request)
    {
        $request->validate([
            'keywords'=>'required',
            'author'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',

        ]);
        if (Seooptimization::exists()){
            $seopotimizations               = Seooptimization::first() ;
        }else{
            $seopotimizations               = new Seooptimization();
        }

        $seopotimizations->keywords         = $request->keywords;
        $seopotimizations->author           = $request->author;
        $seopotimizations->meta_title       = $request->meta_title;
        $seopotimizations->meta_description = $request->meta_description;
        $seopotimizations->google_analytics = $request->google_analytics;
        $seopotimizations->save();

        return response()->json([
            'message'   => __('Inserted'),
            'redirect'  => route('admin.seo.index')
        ]);
    }

    public function maanSeooptimzationUpdate(Request $request,Seooptimization $seooptimization)
    {
        $request->validate([
            'keywords'=>'required',
            'author'=>'required',
            'meta_title'=>'required',
            'meta_description'=>'required',

        ]);

        $seooptimization->keywords = $request->keywords;
        $seooptimization->author = $request->author;
        $seooptimization->meta_title = $request->meta_title;
        $seooptimization->meta_description = $request->meta_description;
        $seooptimization->google_analytics = $request->google_analytics;
        $seooptimization->save();

        return response()->json([
            'message'   => __('Updated'),
            'redirect'  => route('admin.seo.index')
        ]);
    }

    public function destroy(string $id)
    {
        $seo = Seooptimization::findOrFail($id);
        $seo->delete();

        return response()->json([
            'message' => __('Seo deleted successfully'),
            'redirect' => route('admin.seo.index')
        ]);
    }

    public function maanSeooptimzationSitemape()
    {
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
        $latestnews = News::join('newssubcategories','news.subcategory_id','=','newssubcategories.id')
            ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
            ->select('news.id','news.title','news.date','news.created_at','newscategories.name as news_category')
            ->latest()
            ->get();
        // foreach ($latestnews as $news){
        //     $site->add(URL::to(strtolower($news->news_category)), $news->created_at,1.0,'daily');
        // }

        // $site->store('xml','sitemap');

        $this->setSuccess('Generated');
        return redirect()->route('admin.seo.index');
    }
}
