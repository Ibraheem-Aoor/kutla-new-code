<?php

namespace Database\Seeders;

use App\Models\Api\Newscategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newscategories = array(
            array('id' => '1','name' => 'Business','slug' => 'business','type' => 'news','image' => 'uploads/images/news_category/business.png','post_counter' => '7','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-08 05:33:44','updated_at' => '2024-05-10 18:55:37'),
            array('id' => '2','name' => 'Sports','slug' => 'sports-news','type' => 'news','image' => 'uploads/images/news_category/sports.png','post_counter' => '6','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-08 05:35:23','updated_at' => '2024-03-14 13:40:56'),
            array('id' => '3','name' => 'Lifestyle','slug' => 'lifestyle-news','type' => 'news','image' => 'uploads/images/news_category/lifestyle.png','post_counter' => '8','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-08 05:46:48','updated_at' => '2024-04-01 17:27:26'),
            array('id' => '4','name' => 'Politics','slug' => 'politics-news','type' => 'news','image' => 'uploads/images/news_category/politics.png','post_counter' => '9','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-08 05:47:10','updated_at' => '2023-12-23 17:20:13'),
            array('id' => '5','name' => 'Entertainment','slug' => 'entertainment-news','type' => 'news','image' => 'uploads/images/news_category/entertainment.png','post_counter' => '11','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-08 05:47:30','updated_at' => '2024-08-18 05:25:15'),
            array('id' => '6','name' => 'Technology','slug' => 'technology-news','type' => 'news','image' => 'uploads/images/news_category/technology.png','post_counter' => '7','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-08 05:53:59','updated_at' => '2023-10-05 15:23:17'),
            array('id' => '7','name' => 'National','slug' => 'national-news','type' => 'news','image' => 'uploads/images/news_category/national.png','post_counter' => '7','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-20 06:19:50','updated_at' => '2024-03-14 13:41:00'),
            array('id' => '8','name' => 'World','slug' => 'world-news','type' => 'news','image' => 'uploads/images/news_category/world.png','post_counter' => '6','menu_publish' => '1','user_id' => '1','created_at' => '2021-09-20 06:20:02','updated_at' => '2022-06-22 06:12:20'),
            array('id' => '9','name' => 'Travel','slug' => 'travel-news','type' => 'news','image' => 'uploads/images/news_category/travel.png','post_counter' => '6','menu_publish' => '1','user_id' => '1','created_at' => '2021-10-19 13:44:38','updated_at' => '2024-03-14 13:41:05'),
            array('id' => '11','name' => 'Home','slug' => 'home','type' => 'home','image' => 'uploads/images/news_category/home.png','post_counter' => '0','menu_publish' => '1','user_id' => '1','created_at' => '2022-01-26 11:41:03','updated_at' => '2024-02-14 19:18:15'),
            array('id' => '14','name' => 'Contact Us','slug' => 'contact-us','type' => 'contact','image' => 'uploads/images/news_category/contact_us.png','post_counter' => '0','menu_publish' => '1','user_id' => '1','created_at' => '2022-01-26 12:13:33','updated_at' => '2022-03-15 06:51:15')
          );

          Newscategory::insert($newscategories);
    }
}
