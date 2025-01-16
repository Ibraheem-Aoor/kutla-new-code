<?php

namespace Database\Seeders;

use App\Models\Header;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headers = array(
            array('id' => '11','name' => 'Header 1','name_slug' => 'header_1','image' => 'uploads/images/header/maanheaderimage23122023_110016_header_1.PNG','is_active' => '0','status' => '1','created_at' => '2023-06-22 22:34:21','updated_at' => '2024-05-19 09:26:13'),
            array('id' => '13','name' => 'Header 2','name_slug' => 'header_2','image' => 'uploads/images/header/maanheaderimage23122023_105114_header_2.png','is_active' => '1','status' => '1','created_at' => '2023-12-23 16:51:14','updated_at' => '2024-05-19 09:25:46'),
            array('id' => '14','name' => 'Header 3','name_slug' => 'header_3','image' => 'uploads/images/header/maanheaderimage23122023_105125_header_3.PNG','is_active' => '0','status' => '1','created_at' => '2023-12-23 16:51:25','updated_at' => '2024-05-19 09:25:46'),
            array('id' => '15','name' => 'Header 4','name_slug' => 'header_4','image' => 'uploads/images/header/maanheaderimage23122023_105246_header_4.PNG','is_active' => '0','status' => '1','created_at' => '2023-12-23 16:52:46','updated_at' => '2024-05-19 09:25:46'),
            array('id' => '16','name' => 'Header 5','name_slug' => 'header_5','image' => 'uploads/images/header/maanheaderimage23122023_105349_header_5.png','is_active' => '0','status' => '1','created_at' => '2023-12-23 16:53:49','updated_at' => '2024-05-19 09:25:46'),
            array('id' => '17','name' => 'Header 6','name_slug' => 'header_6','image' => 'uploads/images/header/maanheaderimage23122023_105401_header_6.PNG','is_active' => '0','status' => '1','created_at' => '2023-12-23 16:54:01','updated_at' => '2024-05-19 09:25:46'),
            array('id' => '18','name' => 'Header 7','name_slug' => 'header_7','image' => 'uploads/images/header/maanheaderimage23122023_105412_header_7.PNG','is_active' => '0','status' => '1','created_at' => '2023-12-23 16:54:12','updated_at' => '2024-05-19 09:25:46')
          );
          Header::insert($headers);
    }
}
