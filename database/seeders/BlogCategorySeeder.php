<?php

namespace Database\Seeders;

use App\Models\Blogcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogcategories = array(
            array('name' => 'Technology','user_id' => '1','created_at' => '2023-11-21 07:48:31','updated_at' => '2023-11-21 07:48:31'),
            array('name' => 'Media','user_id' => '1','created_at' => '2023-12-07 08:18:00','updated_at' => '2023-12-07 08:18:00')
          );
          Blogcategory::insert($blogcategories);
    }
}
