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
            array('id' => '1','category_id' => '1','name' => 'اخبار','user_id' => '1','created_at' => '2021-09-08 05:36:20','updated_at' => '2021-09-08 05:36:20'),
            array('id' => '2','category_id' => '2','name' => 'التقارير','user_id' => '1','created_at' => '2021-09-08 05:36:20','updated_at' => '2021-09-08 05:36:20'),
            array('id' => '3','category_id' => '4','name' => 'بيانات','user_id' => '1','created_at' => '2021-09-21 04:28:46','updated_at' => '2021-09-21 04:28:46'),
          );

          Newssubcategory::insert($newssubcategories);
    }
}
