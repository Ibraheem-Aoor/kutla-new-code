<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = array(
            array(
                'favicon' => 'uploads/images/logo/favicon.svg',
                'icon' => 'uploads/images/icon.png',
                'frontend_logo'
                => 'uploads/images/logo/logo.png',
                'logo' => 'uploads/images/logo/logo.png',
                'logo_footer' => 'uploads/images/logo/logo_footer.png',
                'title' => 'الكتلة الإسلامية - الضفة الغربية',
                'name' => 'Kutla.ps',
                'short_name' => 'Kutla.ps',
                'footer_content' => 'موقع الكتلة الإسلامية - الضفة الغربية',
                'play_store_url' => '#',
                'app_store_url' => '#',
                'created_at' => '2021-10-17 07:10:34',
                'updated_at' => '2024-08-18 11:06:35',
                'theme_color' => 'theme-green',
            )
        );

        Settings::insert($settings);
    }
}
