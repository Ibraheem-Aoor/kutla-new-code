<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertiseMentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $advertisements = array(
            array('id' => '5','header_ads' => '<a href="  https://www.google.com/
            " target="_blank"><img src="'.asset('uploads/images/ads/adds.jpg').'" alt="'.asset('uploads/images/ads/adds.jpg').'"></a>','sidebar_ads' => '<a class="side-add-thumb" href="https://www.google.com/">
                                          <img src="'.asset('uploads/images/ads/slide-img-1.jpg').'" alt="'.asset('uploads/images/ads/slide-img-1.jpg').'">
                                      </a>','before_post_ads' => '<a href="  https://www.google.com/
            " target="_blank">
                                  <img src="'.asset('uploads/images/ads/adds.jpg').'" alt="'.asset('uploads/images/ads/adds.jpg').'"></a>','after_post_ads' => '<a href="  https://www.google.com/
            " target="_blank">
                                  <img src="'.asset('uploads/images/ads/adds.jpg').'" alt="'.asset('uploads/images/ads/adds.jpg').'"></a>','status' => '1','created_at' => now(),'updated_at' => now())
        );

        Advertisement::insert($advertisements);
    }
}
