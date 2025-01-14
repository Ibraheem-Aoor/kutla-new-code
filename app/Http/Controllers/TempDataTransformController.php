<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Videogallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class TempDataTransformController extends Controller
{

    public function __construct()
    {
        set_time_limit(0);
        ini_set('max_execution_time', 0);
    }
    public function startTransfer()
    {
        $kutla_categories = DB::connection('kutla_original')->table('categories')->pluck('name', 'id')->unique()->toArray();
        // dd($kutla_categories);
        // $post = News::query()->first();
        // dd($kutla_categories , $kutla_posts , $post);

        // Start Transfering Kutla Posts
        DB::connection('kutla_original')->table('posts')
            ->where('deleted_at', null)
            ->chunkById(50, function ($kutla_posts) {
                foreach ($kutla_posts as $post) {
                    try {

                        $tags_ids = DB::connection('kutla_original')->table('post_tags')->where('post_id', $post->id)->pluck('tag_id')->toArray();
                        $tags = DB::connection('kutla_original')->table(table: 'tags')->whereIn('id', $tags_ids)->pluck('name')->toArray();
                        $image = json_encode(
                            [
                                DB::connection('kutla_original')->table(table: 'files_library')->find($post->photo_id)?->file_name
                            ]
                        );
                        News::query()->create([
                            'title' => $post->title,
                            'summary' => $post->summary ?? $post->title,
                            'description' => $post->details,
                            'viewers' => $post->read_number,
                            'status' => $post->active,
                            'created_at' => $post->created_at,
                            'updated_at' => $post->updated_at,
                            'date' => Carbon::parse($post->published_at)->toDateString(),
                            'tags' => implode(',', $tags),
                            'subcategory_id' => $this->getSubCategory($post),
                            'speciality_id' => $post->category_id == 34 ? 35 : ($post->category_id == 8 ? 5 : $post->category_id),
                            'user_id' => 1,
                            'reporter_id' => 1,
                            'image' => $image,
                        ]);
                    } catch (\Exception $exception) {
                        dd($post, $exception);
                    }
                }
            });
        dd('DONE');
    }

    public function transferAlboms()
    {
        $albom = DB::connection('kutla_original')->table('albums')->first();
        $kutla_alboms = DB::connection('kutla_original')->table('files_library')->where('album_id', $albom->id)->get();
        dd($kutla_alboms);

    }


    public function transferVideos()
    {
        Videogallery::truncate();
        DB::connection(name: 'kutla_original')
            ->table('videos')
            ->whereNull('deleted_at')
            ->chunkById(50, function ($kutla_videos) {
                foreach ($kutla_videos as $kutla_video) {
                    if (!$kutla_video->file_name && !$kutla_video->youtube_link) {
                        continue;
                    }
                    try {

                        $image = DB::connection('kutla_original')
                            ->table('files_library')
                            ->find($kutla_video->photo_id)?->file_name;

                        Videogallery::query()->create([
                            'title' => $kutla_video->name,
                            'description' => $kutla_video->description ?? $kutla_video->name,
                            'video' => isset($kutla_video->youtube_link) ? $kutla_video->youtube_link ?? $kutla_video->file_name : $kutla_video->file_name,
                            'video_source' => isset($kutla_video->youtube_link) ? 'Youtube' : 'Dailymotion',
                            'video_option' => isset($kutla_video->youtube_link) ? 'Share Link' : 'Upload Video',
                            'image' => $image,
                            'status' => 1,
                            'user_id' => 1,
                        ]);
                    } catch (Throwable $e) {
                        dd($kutla_video , $e);
                    }
                }
            });

        dd('DONE');
    }




    public function getSubCategory($post)
    {
        return $post->main_news ? 1 : ($post->report ? 2 : ($post->chosen ? 3 : 1));
    }


}
