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
            array('id' => '1','keywords' => 'Keywords, news','author' => 'Author','meta_title' => 'Hábil Teste','meta_description' => 'Meta Description','site_map' => 'Site Map','google_analytics' => 'Google Analytics','status' => '1','created_at' => '2022-01-17 10:34:07','updated_at' => '2023-06-12 19:45:14')
          );
          Seooptimization::insert($seooptimizations);
    }
}
