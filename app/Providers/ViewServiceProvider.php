<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\Company;
use App\Models\Newscategory;
use App\Models\Seooptimization;
use App\Models\Settings;
use App\Models\Socialshare;
use App\Models\Theme;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (file_exists(base_path('storage/installed')))
        {
            if (Schema::hasTable('seooptimizations')) {
                View::share('seooptimization',Seooptimization::first());
            }
            if (Schema::hasTable('settings')) {
                View::share('settings',Settings::first());
            }
            if (Schema::hasTable('socialshares')) {
                View::share('socials',Socialshare::take(5)->get());
            }
            if (Schema::hasTable('themes')) {
                View::share('themes',Theme::where('is_active',1)->first());
            }
            if (Schema::hasTable('advertisements')) {
                View::share('advertisement',Advertisement::latest()->first());
            }
            if (Schema::hasTable('newscategories')) {
                View::share('menus',Newscategory::where('type','news')->orderBy('id')->get());
            }
            if (Schema::hasTable('newscategories')) {
                View::share('homeContactus',Newscategory::whereIn('type',['home','contact'] )->orderBy('id')->get());
            }
        }
    }
}
