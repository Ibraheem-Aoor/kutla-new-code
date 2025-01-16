<?php

namespace Database\Seeders;

use App\Models\Seooptimization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoOptimizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seooptimizations = array(
            array(
                'id' => '1',
                'keywords' => 'islamickutla,الكتلة الاسلامية ,الضفة الغربية,الحركة الطلابية',
                'author' => 'موقع الكتلة الاسلامية -الضفة الغربية',
                'meta_title' => 'الكتلة الاسلامية -الضفة الغربية',
                'meta_description' => 'الكتلة الاسلامية -الضفة الغربية',
                'site_map' => 'Site Map',
                'google_analytics' => 'Google Analytics',
                'status' => '1',
                'created_at' => '2022-01-17 10:34:07',
                'updated_at' => '2023-06-12 19:45:14'
            )
        );
        Seooptimization::insert($seooptimizations);
    }
}
