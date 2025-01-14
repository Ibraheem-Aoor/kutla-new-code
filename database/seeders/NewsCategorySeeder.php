<?php

namespace Database\Seeders;

use App\Models\Api\Newscategory;
use App\Models\Newssubcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\News::query()->with(['comments' , 'subCategories'])->delete();
        $newscategories = array(
            array('id' => '1', 'name' => 'اخبار', 'slug' => 'allNews', 'type' => 'news', 'image' => 'uploads/images/news_category/reports.png', 'post_counter' => '0', 'menu_publish' => '1', 'user_id' => '1', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '2', 'name' => 'التقارير', 'slug' => 'reports', 'type' => 'news', 'image' => 'uploads/images/news_category/reports.png', 'post_counter' => '0', 'menu_publish' => '1', 'user_id' => '1', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '3', 'name' => 'معرض الوسائط', 'slug' => 'photogallery', 'type' => 'news', 'image' => 'uploads/images/news_category/media_gallery.png', 'post_counter' => '0', 'menu_publish' => '1', 'user_id' => '1', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '4', 'name' => 'بيانات', 'slug' => 'data', 'type' => 'news', 'image' => 'uploads/images/news_category/data.png', 'post_counter' => '0', 'menu_publish' => '1', 'user_id' => '1', 'created_at' => now(), 'updated_at' => now()),
            array('id' => '5', 'name' => 'تواصل معنا', 'slug' => 'تواصل-معنا', 'type' => 'contact', 'image' => 'uploads/images/news_category/contact_us.png', 'post_counter' => '0', 'menu_publish' => '1', 'user_id' => '1', 'created_at' => '2022-01-26 12:13:33', 'updated_at' => '2022-03-15 06:51:15')
        );

        Newscategory::insert($newscategories);
    }
}
