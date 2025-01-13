<?php

namespace Database\Seeders;

use App\Models\Newsspeciality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsspecialities = array(
            array('name' => 'TOP STORY','status' => '1','created_at' => '2021-09-06 10:43:54','updated_at' => '2023-11-23 10:21:34'),
            array('name' => 'TOP SLIDING STORY','status' => '1','created_at' => '2021-09-06 10:43:54','updated_at' => '2023-11-23 10:21:51'),
            array('name' => 'DETAILS STORY','status' => '1','created_at' => '2021-09-06 10:43:54','updated_at' => '2023-11-23 10:22:00'),
            array('name' => 'NONE','status' => '1','created_at' => '2021-09-06 10:43:54','updated_at' => '2023-11-23 10:22:11')
          );

          Newsspeciality::insert($newsspecialities);
    }
}
