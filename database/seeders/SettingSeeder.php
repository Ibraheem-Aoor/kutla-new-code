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
            array('favicon' => 'uploads/images/logo/favicon.svg','icon' => 'uploads/images/logo/icon.png','frontend_logo' => 'uploads/images/logo/frontend_logo.svg','logo' => 'uploads/images/logo/logo.png','logo_footer' => 'uploads/images/logo/logo_footer.png','title' => 'Maan News','name' => 'Lois Moore','short_name' => 'Quincy Jensen','footer_content' => 'Aliquid dicta tempor','play_store_url' => 'Minus cumque enim ar','app_store_url' => 'Quaerat voluptatibus','created_at' => '2021-10-17 07:10:34','updated_at' => '2024-08-18 11:06:35','theme_color' => 'theme-violet')
        );

        Settings::insert($settings);
    }
}
