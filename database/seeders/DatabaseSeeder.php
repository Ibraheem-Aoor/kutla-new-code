<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            AdvertiseMentSeeder::class,
            BlogCategorySeeder::class,
            // CompanySeeder::class,
            OptionTableSeeder::class,
            ContactSeeder::class,
            FooterSeeder::class,
            HeaderSeeder::class,
            NewsCategorySeeder::class,
            NewsSubCategorySeeder::class,
            NewsSeeder::class,
            NewsSpecialitySeeder::class,
            PhotoGallerySeeder::class,
            SeoOptimizeSeeder::class,
            SettingSeeder::class,
            SocialShareSeeder::class,
            ThemeSeeder::class,
            UserTableSeeder::class,
            VideoGallerySeeder::class,
        ]);
    }
}
