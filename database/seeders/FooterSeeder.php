<?php

namespace Database\Seeders;

use App\Models\Footer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $footers = array(
            array('id' => '4','name' => 'Footer 3','name_slug' => 'footer_3','image' => 'uploads/images/footer/maanfooterimage25102022_182352_footer_3.PNG','is_active' => '1','status' => '1','created_at' => '2022-10-25 09:50:11','updated_at' => '2024-05-10 20:48:29'),
            array('id' => '5','name' => 'Footer 4','name_slug' => 'footer_4','image' => 'uploads/images/footer/maanfooterimage25102022_182945_footer_4.PNG','is_active' => '0','status' => '1','created_at' => '2022-10-25 11:14:43','updated_at' => '2024-05-10 20:48:29'),
            array('id' => '6','name' => 'Footer 5','name_slug' => 'footer_5','image' => 'uploads/images/footer/maanfooterimage30042023_062426_footer_5.png','is_active' => '0','status' => '1','created_at' => '2022-10-25 17:35:34','updated_at' => '2024-05-10 20:48:29'),
            array('id' => '9','name' => 'Footer 1','name_slug' => 'footer_1','image' => 'uploads/images/footer/maanfooterimage23122023_105550_footer_1.png','is_active' => '0','status' => '1','created_at' => '2023-12-23 16:55:50','updated_at' => '2024-05-10 20:48:29'),
            // array('id' => '10','name' => 'Footer 2','name_slug' => 'footer_2','image' => 'uploads/images/footer/maanfooterimage23122023_105703_footer_6.PNG','is_active' => '0','status' => '1','created_at' => '2023-12-23 16:56:23','updated_at' => '2024-05-14 22:19:50'),
            array('id' => '11','name' => 'Footer 6','name_slug' => 'footer_6','image' => 'uploads/images/footer/maanfooterimage23122023_105850_footer_7.png','is_active' => '0','status' => '0','created_at' => '2023-12-23 16:58:50','updated_at' => '2024-05-10 20:48:29'),
            array('id' => '12','name' => 'Footer 7','name_slug' => 'footer_7','image' => 'uploads/images/footer/maanfooterimage23122023_105901_footer_8.PNG','is_active' => '0','status' => '0','created_at' => '2023-12-23 16:59:01','updated_at' => '2024-05-10 20:48:29')
          );
          Footer::insert($footers);
    }
}
