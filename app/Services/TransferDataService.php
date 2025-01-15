<?php

namespace App\Services;

use App\Models\GalleryImage;
use App\Models\News;
use App\Models\Photogallery;
use App\Models\Videogallery;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransferDataService
{
    protected $db;

    public function __construct()
    {
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        $this->db = DB::connection('kutla_original');
    }

    public function transferPosts()
    {
        DB::beginTransaction();

        try {
            $this->db->table('posts')
                ->whereNull('deleted_at')
                ->chunkById(50, function ($kutla_posts) {
                    foreach ($kutla_posts as $post) {
                        $tags_ids = $this->db->table('post_tags')->where('post_id', $post->id)->pluck('tag_id')->toArray();
                        $tags = $this->db->table('tags')->whereIn('id', $tags_ids)->pluck('name')->toArray();
                        $image = json_encode([$this->db->table('files_library')->find($post->photo_id)?->file_name]);

                        News::create([
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
                    }
                });

            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error transferring posts: ' . $e->getMessage());
            throw $e;
        }
    }

    public function transferVideos()
    {
        DB::beginTransaction();

        try {
            DB::table('videogalleries')->delete(); // Avoid truncate for transaction safety

            $this->db->table('videos')
                ->whereNull('deleted_at')
                ->chunkById(50, function ($kutla_videos) {
                    foreach ($kutla_videos as $kutla_video) {
                        if (!$kutla_video->file_name && !$kutla_video->youtube_link) {
                            continue;
                        }

                        $image = $this->db->table('files_library')->find($kutla_video->photo_id)?->file_name;

                        Videogallery::create([
                            'title' => $kutla_video->name,
                            'description' => $kutla_video->description ?? $kutla_video->name,
                            'video' => $kutla_video->youtube_link ?? $kutla_video->file_name,
                            'video_source' => $kutla_video->youtube_link ? 'Youtube' : 'Dailymotion',
                            'video_option' => $kutla_video->youtube_link ? 'Share Link' : 'Upload Video',
                            'image' => $image,
                            'status' => 1,
                            'user_id' => 1,
                        ]);
                    }
                });

            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error transferring videos: ' . $e->getMessage());
            throw $e;
        }
    }

    public function transferAlboms()
    {
        DB::beginTransaction();
        try {
            $this->db->table('albums')->whereNull('deleted_at')
                ->chunkById(50 , function ($kutla_alboms) {
                    foreach ($kutla_alboms as $albom) {
                        $cover_image = $this->db->table('files_library')->where('album_id', $albom->id)->where('album_cover'  ,1)->first()?->file_name;
                        if(!isset($cover_image))
                        {
                            $cover_image = $this->db->table('files_library')->where('album_id', $albom->id)->first()?->file_name;
                        }
                        if(is_null($cover_image))
                        {
                            continue;
                        }
                        $photo_gallery = Photogallery::query()->create([
                            'title' => $albom->name,
                            'description' => $albom->details ?? $albom->name,
                            'created_at' => $albom->created_at,
                            'updated_at' => $albom->updated_at,
                            'status' =>  $albom->active,
                            'viewers' => $albom->read_no,
                            'image' => $cover_image,
                            'user_id' => 1,
                        ]);
                        $albom_photos = $this->db->table('files_library')->where('album_id', $albom->id)->where('type' , 'photo')->pluck('file_name');
                        foreach ($albom_photos as $albom_photo) {
                            GalleryImage::query()->create([
                                'photogallery_id' => $photo_gallery->id,
                                'image' => $albom_photo,
                            ]);
                        }
                    }
                });
            DB::commit();
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error transferring videos: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getSubCategory($post)
    {
        return $post->main_news ? 1 : ($post->report ? 2 : ($post->chosen ? 3 : 1));
    }
}
