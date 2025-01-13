<?php

namespace Database\Seeders;

use App\Models\Socialshare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialshares = array(
            array('id' => '6','url' => 'https://www.whatsapp.com','icon_code' => 'fab fa-facebook-f','follower' => '60000','status' => '1','created_at' => '2022-01-29 09:34:59','updated_at' => '2023-12-26 23:38:55'),
            array('id' => '7','url' => 'https://www.twitter.com/','icon_code' => 'fab fa-twitter','follower' => '50','status' => '1','created_at' => '2023-06-23 13:52:01','updated_at' => '2023-12-20 18:41:12'),
            array('id' => '8','url' => 'https://www.instagram.com/','icon_code' => 'fab fa-instagram','follower' => '124','status' => '1','created_at' => '2023-06-23 13:52:10','updated_at' => '2023-12-20 18:36:27'),
            array('id' => '9','url' => 'https://www.pinterest.com/','icon_code' => 'fab fa-pinterest-p','follower' => '123','status' => '1','created_at' => '2023-06-23 13:52:28','updated_at' => '2023-06-23 13:52:28'),
            array('id' => '10','url' => 'https://www.linkedin.com/','icon_code' => 'fab fa-linkedin','follower' => '123123','status' => '1','created_at' => '2023-06-23 13:52:35','updated_at' => '2023-12-20 18:40:27'),
            array('id' => '11','url' => 'https://www.whatsApp.com','icon_code' => 'Whatsapp','follower' => '1000000','status' => '1','created_at' => '2023-12-26 23:40:09','updated_at' => '2023-12-26 23:40:09')
          );

          Socialshare::insert($socialshares);
    }
}
