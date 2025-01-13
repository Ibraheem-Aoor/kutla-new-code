<?php

namespace Database\Seeders;

use App\Models\Newssubcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newssubcategories = array(
            array('id' => '1','category_id' => '2','name' => 'Cricket','user_id' => '1','created_at' => '2021-09-08 05:36:20','updated_at' => '2021-09-08 05:36:20'),
            array('id' => '2','category_id' => '2','name' => 'Football','user_id' => '1','created_at' => '2021-09-08 05:38:07','updated_at' => '2021-09-08 05:38:07'),
            array('id' => '3','category_id' => '1','name' => 'Global Trade','user_id' => '1','created_at' => '2021-09-08 05:55:10','updated_at' => '2021-09-08 05:55:10'),
            array('id' => '4','category_id' => '1','name' => 'Stock Market','user_id' => '1','created_at' => '2021-09-08 05:55:30','updated_at' => '2021-09-08 05:55:30'),
            array('id' => '5','category_id' => '2','name' => 'Olympics','user_id' => '1','created_at' => '2021-09-19 09:55:40','updated_at' => '2021-09-19 09:55:40'),
            array('id' => '6','category_id' => '2','name' => 'Tennis','user_id' => '1','created_at' => '2021-09-19 09:57:46','updated_at' => '2021-09-19 09:57:46'),
            array('id' => '7','category_id' => '5','name' => 'Movies','user_id' => '1','created_at' => '2021-09-19 11:40:34','updated_at' => '2021-09-19 11:40:34'),
            array('id' => '8','category_id' => '5','name' => 'Magic Shows','user_id' => '1','created_at' => '2021-09-19 11:41:25','updated_at' => '2021-09-19 11:41:25'),
            array('id' => '9','category_id' => '5','name' => 'Video Games','user_id' => '1','created_at' => '2021-09-19 11:41:55','updated_at' => '2021-09-19 11:41:55'),
            array('id' => '10','category_id' => '3','name' => 'Fashion','user_id' => '1','created_at' => '2021-09-21 03:55:31','updated_at' => '2021-09-21 03:55:31'),
            array('id' => '11','category_id' => '3','name' => 'Travel','user_id' => '1','created_at' => '2021-09-21 03:56:01','updated_at' => '2021-09-21 03:56:01'),
            array('id' => '12','category_id' => '3','name' => 'Health','user_id' => '1','created_at' => '2021-09-21 03:59:45','updated_at' => '2021-09-21 03:59:45'),
            array('id' => '13','category_id' => '4','name' => 'Politics','user_id' => '1','created_at' => '2021-09-21 04:16:29','updated_at' => '2021-09-21 04:16:29'),
            array('id' => '14','category_id' => '6','name' => 'Communication','user_id' => '1','created_at' => '2021-09-21 04:22:13','updated_at' => '2021-09-21 04:22:13'),
            array('id' => '15','category_id' => '6','name' => 'Transportation','user_id' => '1','created_at' => '2021-09-21 04:22:37','updated_at' => '2021-09-21 04:22:37'),
            array('id' => '16','category_id' => '6','name' => 'Energy','user_id' => '1','created_at' => '2021-09-21 04:23:01','updated_at' => '2021-09-21 04:23:01'),
            array('id' => '17','category_id' => '7','name' => 'Politics','user_id' => '1','created_at' => '2021-09-21 04:24:06','updated_at' => '2021-09-21 04:24:06'),
            array('id' => '18','category_id' => '7','name' => 'Education','user_id' => '1','created_at' => '2021-09-21 04:24:55','updated_at' => '2021-09-21 04:24:55'),
            array('id' => '19','category_id' => '7','name' => 'National','user_id' => '1','created_at' => '2021-09-21 04:27:57','updated_at' => '2021-09-21 04:27:57'),
            array('id' => '20','category_id' => '8','name' => 'World','user_id' => '1','created_at' => '2021-09-21 04:28:46','updated_at' => '2021-09-21 04:28:46'),
            array('id' => '30','category_id' => '9','name' => 'Travel','user_id' => '1','created_at' => '2021-10-19 13:45:22','updated_at' => '2021-10-19 13:45:22')
          );

          Newssubcategory::insert($newssubcategories);
    }
}
