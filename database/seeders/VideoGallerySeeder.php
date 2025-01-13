<?php

namespace Database\Seeders;

use App\Models\Videogallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videogalleries = array(
            array('id' => '1','title' => 'FLYING OVER SWITZERLAND - Relaxing Music & Amazing Beautiful Nature Scenery For Stress','description' => 'Welcome to Relaxing Nation !
          Switzerland, officially the Swiss Confederation, is a landlocked country situated at the confluence of Western, Central and Southern Europe.','video' => 'https://www.youtube.com/embed/bJsaR9-h26Y','video_source' => 'Maantheme','video_option' => 'Share Link','status' => '1','user_id' => '1','created_at' => '2021-09-15 13:35:26','updated_at' => '2024-03-01 03:20:48','image' => 'uploads/videos/images/flying_over_switzerland_-_relaxing_music_&_amazing_beautiful_nature_scenery_for_stress.jpg'),
            array('id' => '4','title' => 'Top 100 Places To Visit In Europe','description' => 'Europe has to be the most beautiful place in the world! From the countless medieval cities, to the jaw dropping landscapes of the Alps, Europe has it all!','video' => 'https://www.youtube.com/embed/ixIzimI35SE','video_source' => 'Youtube','video_option' => 'Share Link','status' => '1','user_id' => '1','created_at' => '2021-09-29 11:44:45','updated_at' => '2023-12-22 00:08:24','image' => 'uploads/videos/images/top_100_places_to_visit_in_europe.png'),
            array('id' => '5','title' => 'Trekking to Everest Base Camp in Nepal','description' => 'Our journey to EBC begins with a 365km long motorcycle ride from Kathmandu to Tham Danda from where we head out for an incredible journey to reach the mighty Everest Base Camp!','video' => 'https://www.youtube.com/embed/eGJEdlq7MAE','video_source' => 'Youtube','video_option' => 'Share Link','status' => '1','user_id' => '1','created_at' => '2021-09-29 11:49:15','updated_at' => '2023-12-20 16:20:48','image' => 'uploads/videos/images/trekking_to_everest_base_camp_in_nepal.png'),
            array('id' => '7','title' => 'Greatest Natural Wonders of the World - Travel Video','description' => 'Massive glaciers, staggering mountains, plains dotted with wild animals: We sure live in a big, beautiful world. And while pinpointing all of Mother Nature\'s greatest hits could take a lifetime.','video' => 'https://www.youtube.com/embed/3SsK-cxlj_w','video_source' => 'Youtube','video_option' => 'Share Link','status' => '1','user_id' => '1','created_at' => '2023-05-09 16:37:12','updated_at' => '2023-12-22 00:08:21','image' => 'uploads/videos/images/greatest_natural_wonders_of_the_world_-_travel_video.png'),
            array('id' => '8','title' => 'Arcangel - JS4E (Video Oficial) | SR. SANTOS','description' => '#Arcangel #SrSantos #JS4E
          © 2022 Rimas Entertainment','video' => 'https://www.youtube.com/watch?v=rAr3-Pn9yRI','video_source' => 'Youtube','video_option' => 'Share Link','status' => '0','user_id' => '1','created_at' => '2023-12-20 16:20:16','updated_at' => '2023-12-22 00:10:26','image' => 'uploads/videos/images/arcangel_-_js4e_(video_oficial)_|_sr._santos.jpg')
          );
          Videogallery::insert($videogalleries);
    }
}
