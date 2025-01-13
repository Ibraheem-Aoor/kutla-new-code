<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = array(
            array('id' => '1','title' => 'Home One','author' => 'Maan Theme','version' => '1.18.3','description' => 'Maan News Magazine Blog Theme','page' => 'Home 2','page_slug' => 'home_1','image' => 'uploads/images/theme/maan_news.png','is_active' => '1','status' => '1','created_at' => '2023-05-02 10:42:42','updated_at' => '2024-04-23 22:47:06'),
            array('id' => '2','title' => 'Home Two','author' => 'Maan Theme','version' => '2.0.0','description' => 'Maan News Magazine Blog Theme','page' => 'Home 7','page_slug' => 'home_2','image' => 'uploads/images/theme/home_two.jpeg','is_active' => '0','status' => '1','created_at' => '2023-05-03 04:58:34','updated_at' => '2024-04-23 22:47:06')
          );
          Theme::insert($themes);
    }
}
