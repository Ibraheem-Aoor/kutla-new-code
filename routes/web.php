<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Maan\MaanuserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\SigninController;
use App\Http\Controllers\Frontend\SignupController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\BlogcategoryController;
use App\Http\Controllers\Admin\NewscategoryController;
use App\Http\Controllers\Admin\NewsreporterController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PhotogalleryController;
use App\Http\Controllers\Admin\VideogalleryController;
use App\Http\Controllers\Admin\SystemSettingController;
use App\Http\Controllers\Admin\AcnooLoginPageController;
use App\Http\Controllers\Admin\NewsspecialityController;
use App\Http\Controllers\Admin\BlogsubcategoryController;
use App\Http\Controllers\Admin\NewssubcategoryController;
use App\Http\Controllers\Admin\AcnooWebsiteSettingController;
use App\Http\Controllers\Admin\FilepondController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\TempDataTransformController;

Route::middleware(['throttle:web-user'])->group(function () {
    Route::get('/', [HomeController::class, 'maanIndex'])->name('home');
    Route::get('/home-one', [HomeController::class, 'maanIndex'])->name('home-one');
    Route::get('/home-two', [HomeController::class, 'maanIndex'])->name('home-two');
    Route::get('/subscribe/ajax', [HomeController::class, 'subscribeAjax'])->name('subscribe');
    //route search
    Route::get('/search', [SearchController::class, 'maanSearch'])->name('search');

    Route::get('/photogallery', [\App\Http\Controllers\Frontend\PhotogalleryController::class, 'maanPhotogalleryIndex'])->name('photogallery');
    Route::get('/photogallery/details/{id}/{slug?}', [\App\Http\Controllers\Frontend\PhotogalleryController::class, 'maanPhotogalleryDetails'])->name('photogallery.details');

    Route::get('categories/{category_slug}/{category_name}', [\App\Http\Controllers\Frontend\NewsController::class, 'maanNews'])->name('categories.item');
    Route::get('/post/{post}/{slug}', [\App\Http\Controllers\Frontend\NewsController::class, 'maanNewsDetails'])->name('news.details');

    // route news comments
    Route::post('news/comment/{id?}', [\App\Http\Controllers\Frontend\NewsController::class, 'maanNewsComment'])->name('news.comment');
    // route contact us
    Route::get('/contactus', [\App\Http\Controllers\Frontend\ContactusController::class, 'maanNewsContactus'])->name('contactus');
    Route::post('/contactus', [\App\Http\Controllers\Frontend\ContactusController::class, 'maanNewsContactusStore'])->name('contactus.store');

    //route signup
    // Route::get('/signup', [SignupController::class, 'maanSignupIndex'])->name('signup');
    // Route::post('/signup', [SignupController::class, 'maanSignupStore']);

    // //route signin
    // Route::get('/signin', [SigninController::class, 'maanSigninIndex'])->name('signin');
    // Route::post('/signin', [SigninController::class, 'maanSigninLogin']);
    // Route::get('/signout', [SigninController::class, 'maanSignout'])->name('signout');

});
// Route admin all
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'maanDashboard'])->name('dashboard');
    Route::get('yearly-statistics', [AdminController::class, 'yearlyStatistics'])->name('yearly-statistics');
    Route::get('category-statistics', [AdminController::class, 'categoryStatistics'])->name('category-statistics');
    Route::resource('profiles', ProfileController::class)->only('index', 'update');

    // Notifications manager
    Route::prefix('notifications')->controller(NotificationController::class)->name('notifications.')->group(function () {
        Route::get('/', 'mtIndex')->name('index');
        Route::get('/{id}', 'mtView')->name('mtView');
        Route::get('view/all/', 'mtReadAll')->name('mtReadAll');
    });

    // Settings
    Route::resource('settings', SettingController::class)->only('index', 'update');
    Route::resource('system-settings', SystemSettingController::class)->only('index', 'store');
    Route::group(['middleware' => ['admin']], function () {
        Route::resource('roles', RoleController::class)->except('show');
        Route::resource('permissions', PermissionController::class)->only('index', 'store');
    });

    //Route user
    Route::get('/user', [UserController::class, 'maanUserIndex'])->name('user');
    // User Filter
    Route::post('user/filter', [UserController::class, 'acnooFilter'])->name('user.filter');
    //Route user create
    Route::get('/user/create', [UserController::class, 'maanUserCreate'])->name('user.create');
    //Route user store
    Route::post('/user', [UserController::class, 'maanUserStore']);
    //Route user edit
    Route::get('/user/edit/{user}', [UserController::class, 'maanUserEdit'])->name('user.edit');
    //Route user update
    Route::match(['put', 'patch'], '/user/update/{user}', [UserController::class, 'maanUserUpdate'])->name('user.update');
    //user ajax route
    Route::get('/user/ajax', [UserController::class, 'maanUserAjax'])->name('user.ajax');

    //Route user destroy
    Route::delete('/user/destroy/{user}', [UserController::class, 'maanUserDestroy'])->name('user.destroy');
    Route::post('user/delete-all', [UserController::class, 'deleteAll'])->name('user.delete-all');

    //Route settings
    Route::get('/settings', [SettingsController::class, 'maanSettingsIndex'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'maanSettingsStore'])->name('settings.store');
    Route::match(['put', 'patch'], '/settings/update/{settings}', [SettingsController::class, 'maanSettingsUpdate'])->name('settings.update');
    Route::delete('/settings/destroy/{settings}', [SettingsController::class, 'maanSettingsDestroy'])->name('settings.destroy');
    // Website settings
    Route::resource('website-settings', AcnooWebsiteSettingController::class);

    //Route company..
    Route::get('/company', [CompanyController::class, 'maanCompanyIndex'])->name('company.index');
    Route::post('company/filter', [CompanyController::class, 'acnooFilter'])->name('company.filter');
    Route::post('company/status/{id}', [CompanyController::class, 'status'])->name('company.status');
    Route::post('/company', [CompanyController::class, 'maanCompanyStore'])->name('company.store');
    Route::match(['put', 'patch'], '/company/update/{company}', [CompanyController::class, 'maanCompanyUpdate'])->name('company.update');
    Route::delete('/company/destroy/{company}', [CompanyController::class, 'maanCompanyDestroy'])->name('company.destroy');
    Route::post('/company/delete-all', [CompanyController::class, 'deleteAll'])->name('company.delete-all');

    // Route theme settings
    Route::prefix('theme')->name('theme.')->controller(ThemeController::class)->group(function () {
        Route::get('/', 'maanThemeIndex')->name('index');
        Route::post('/', 'maanThemeStore')->name('store');
        Route::put('/update/{theme}', 'maanThemeUpdate')->name('update');
        Route::delete('destroy/{theme}', 'maanThemeDestroy')->name('destroy');
        Route::get('/color', 'maanThemeColor')->name('color');
    });
    // Route seo
    Route::prefix('seo')->name('seo.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\SeooptimizationController::class, 'maanSeooptimzationIndex'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\SeooptimizationController::class, 'maanSeooptimzationStore'])->name('store');
        Route::match(['put', 'patch'], '/update/{seooptimization}', [\App\Http\Controllers\Admin\SeooptimizationController::class, 'maanSeooptimzationUpdate'])->name('update');
        Route::delete('/destroy/{seo}', [\App\Http\Controllers\Admin\SeooptimizationController::class, 'destroy'])->name('destroy');
        Route::get('/sitemap', [\App\Http\Controllers\Admin\SeooptimizationController::class, 'maanSeooptimzationSitemape'])->name('sitemap');
    });
    Route::prefix('ads')->name('ads.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdvertisementController::class, 'maanAdvertisementIndex'])->name('index');
        Route::post('/', [\App\Http\Controllers\Admin\AdvertisementController::class, 'maanAdvertisementStore'])->name('store');
        Route::match(['put', 'patch'], '/update/{advertisement}', [\App\Http\Controllers\Admin\AdvertisementController::class, 'maanAdvertisementUpdate'])->name('update');
        Route::delete('/destroy/{advertisement}', [\App\Http\Controllers\Admin\AdvertisementController::class, 'maanAdvertisementDestroy'])->name('destroy');
        Route::post('/advertisement/delete-all', [\App\Http\Controllers\Admin\AdvertisementController::class, 'deleteAll'])->name('advertisement.delete-all');
        Route::post('/googleanalytics', [\App\Http\Controllers\Admin\AdvertisementController::class, 'maanAdvertisementGoogleAnalyticsStore'])->name('googleanalytics.store');
        Route::match(['put', 'patch'], '/googleanalytics/update/{googleanalytic}', [\App\Http\Controllers\Admin\AdvertisementController::class, 'maanAdvertisementGoogleAnalyticsUpdate'])->name('googleanalytics.update');
        //Route news category delete
        Route::delete('/googleanalytics/destroy/{googleanalytic}', [\App\Http\Controllers\Admin\AdvertisementController::class, 'maanAdvertisementGoogleAnalyticsDestroy'])->name('googleanalytics.destroy');
        Route::post('/googleanalytics/delete-all', [\App\Http\Controllers\Admin\AdvertisementController::class, 'deleteAllHeader'])->name('googleanalytics.delete-all');

    });
    Route::prefix('social')->name('social.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\SocialshareController::class, 'maanSocialIndex'])->name('index');
        Route::post('/filter', [\App\Http\Controllers\Admin\SocialshareController::class, 'acnooFilter'])->name('filter');
        Route::post('/', [\App\Http\Controllers\Admin\SocialshareController::class, 'maanSocialStore'])->name('store');
        Route::match(['put', 'patch'], '/update/{socialshare}', [\App\Http\Controllers\Admin\SocialshareController::class, 'maanSocialUpdate'])->name('update');
        Route::delete('/destroy/{socialshare}', [\App\Http\Controllers\Admin\SocialshareController::class, 'maanSocialDestroy'])->name('destroy');
        Route::post('/delete-all', [\App\Http\Controllers\Admin\SocialshareController::class, 'deleteAll'])->name('delete-all');

    });
    // Route Header
    Route::prefix('header')->name('header.')->group(function () {
        Route::get('/', [HeaderController::class, 'maanHeaderIndex'])->name('index');
        Route::post('/filter', [HeaderController::class, 'acnooFilter'])->name('filter');
        Route::post('status/{id}', [HeaderController::class, 'status'])->name('status');
        Route::post('/isactive/{id}', [HeaderController::class, 'isActive'])->name('is.active');
        Route::get('/create', [HeaderController::class, 'maanHeaderCreate'])->name('create');
        Route::post('/store', [HeaderController::class, 'maanHeaderStore'])->name('store');
        Route::get('/edit/{id}', [HeaderController::class, 'maanHeaderEdit'])->name('edit');
        Route::post('/update/{id}', [HeaderController::class, 'maanHeaderUpdate'])->name('update');
        Route::delete('/destroy/{id}', [HeaderController::class, 'maanHeaderDestroy'])->name('destroy');
        Route::post('/delete-all', [HeaderController::class, 'deleteAll'])->name('delete-all');

    });
    // Route Footer
    Route::prefix('footer')->name('footer.')->group(function () {
        Route::get('/', [FooterController::class, 'maanFooterIndex'])->name('index');
        Route::post('/filter', [FooterController::class, 'acnooFilter'])->name('filter');
        Route::post('footer/status/{id}', [FooterController::class, 'status'])->name('status');
        Route::post('/isactive/{id}', [FooterController::class, 'isActive'])->name('is.active');
        Route::get('/create', [FooterController::class, 'maanFooterCreate'])->name('create');
        Route::post('/store', [FooterController::class, 'maanFooterStore'])->name('store');
        Route::get('/edit/{id}', [FooterController::class, 'maanFooterEdit'])->name('edit');
        Route::post('/update/{id}', [FooterController::class, 'maanFooterUpdate'])->name('update');
        Route::delete('/destroy/{id}', [FooterController::class, 'maanFooterDestroy'])->name('destroy');
        Route::post('/delete-all', [FooterController::class, 'deleteAll'])->name('delete-all');
    });

    Route::get('/subscriber', [\App\Http\Controllers\Admin\SubscriberController::class, 'index'])->name('subscriber');
    // Subscriber Filter
    Route::post('subscriber/filter', [\App\Http\Controllers\Admin\SubscriberController::class, 'acnooFilter'])->name('subscriber.filter');
    Route::delete('/subscriber/destroy/{id}', [\App\Http\Controllers\Admin\SubscriberController::class, 'destroy'])->name('subscriber.destroy');
    Route::post('subscriber/delete-all', [\App\Http\Controllers\Admin\SubscriberController::class, 'deleteAll'])->name('subscriber.delete-all');

    // cut here
    Route::group(['middleware' => ['admin']], function () {

        //Route news category
        Route::get('/news/category', [NewscategoryController::class, 'maanNewsCategoryIndex'])->name('news.category');
        // News Category Filter
        Route::post('news/category/filter', [NewscategoryController::class, 'acnooFilter'])->name('news.category.filter');
        Route::post('news/category/status/{id}', [NewscategoryController::class, 'status'])->name('news.category.menu.status');
        //Route news category store
        Route::post('/news/category', [NewscategoryController::class, 'maanNewsCategoryStore']);
        //Route news category update
        Route::match(['put', 'patch'], '/news/category/update/{newscategory}', [NewscategoryController::class, 'maanNewsCategoryUpdate'])->name('news.category.update');
        //Route news category delete
        Route::delete('/news/category/destroy/{newscategory}', [NewscategoryController::class, 'maanNewsCategoryDestroy'])->name('news.category.destroy');
        Route::post('/news/category/delete-all', [NewscategoryController::class, 'deleteAll'])->name('news.category.delete-all');

        //Route news sub-category
        Route::get('/news/subcategory', [NewssubcategoryController::class, 'maanNewsSubcategoryIndex'])->name('news.subcategory');
        // News Sub Category
        Route::post('news/subcategory/filter', [NewssubcategoryController::class, 'acnooFilter'])->name('news.subcategory.filter');
        //Route news sub-category store
        Route::post('/news/subcategory', [NewssubcategoryController::class, 'maanNewsSubcategoryStore']);
        //Route news sub-category update
        Route::match(['put', 'patch'], '/news/subcategory/update/{newssubcategory}', [NewssubcategoryController::class, 'maanNewsSubcategoryUpdate'])->name('news.subcategory.update');
        //Route news sub-category delete
        Route::delete('/news/subcategory/destroy/{newssubcategory}', [NewssubcategoryController::class, 'maanNewsSubcategoryDestroy'])->name('news.subcategory.destroy');
        Route::post('/news/subcategory/delete-all', [NewssubcategoryController::class, 'deleteAll'])->name('news.subcategory.delete-all');

        //Route news speciality
        Route::get('/news/speciality', [NewsspecialityController::class, 'maanNewsSpecialityIndex'])->name('news.speciality');
        Route::post('/news/speciality/store', [NewsspecialityController::class, 'maanNewsSpecialityStore'])->name('news.speciality.store');
        // Speciality Filter
        Route::post('news/speciality/filter', [NewsspecialityController::class, 'acnooFilter'])->name('news.speciality.filter');
        //Route news speciality update
        Route::match(['put', 'patch'], '/news/speciality/update/{newsspeciality}', [NewsspecialityController::class, 'maanNewsSpecialityUpdate'])->name('news.speciality.update');

        //Route news
        Route::get('/news', [NewsController::class, 'maanNewsIndex'])->name('news');
        Route::post('news/filter', [NewsController::class, 'acnooFilter'])->name('news.filter');
        Route::post('news/status/{id}', [NewsController::class, 'status'])->name('news.status');
        Route::post('news/breaking/status/{id}', [NewsController::class, 'breakingStatus'])->name('breaking.news');

        //Route news create
        Route::get('/news/create', [NewsController::class, 'maanNewsCreate'])->name('news.create');
        //Route news store
        Route::post('/news', [NewsController::class, 'maanNewsStore']);
        //Route news edit
        Route::get('/news/edit/{news?}', [NewsController::class, 'maanNewsEdit'])->name('news.edit');
        //Route news update
        Route::match(['put', 'patch'], '/news/update/{news}', [NewsController::class, 'maanNewsUpdate'])->name('news.update');
        //Route news delete
        Route::delete('/news/destroy/{news}', [NewsController::class, 'maanNewsDestroy'])->name('news.destroy');
        Route::post('/news/delete-all', [NewsController::class, 'deleteAll'])->name('news.delete-all');

        Route::resource('photogalleries', PhotogalleryController::class);
        Route::post('photogalleries/filter', [PhotogalleryController::class, 'acnooFilter'])->name('photogalleries.filter');
        Route::post('photogalleries/delete-all', [PhotogalleryController::class, 'deleteAll'])->name('photogalleries.delete-all');
        Route::post('photogalleries/status/{id}', [PhotogalleryController::class, 'status'])->name('photogalleries.status');

        // //Route videogallery
        Route::get('/videogallery', [VideogalleryController::class, 'maanVideogalleryIndex'])->name('videogallery');
        // Video gallery filter
        Route::post('videogallery/filter', [VideogalleryController::class, 'acnooFilter'])->name('videogallery.filter');
        //Route videogallery create
        Route::post('videogallery/status/{id}', [VideogalleryController::class, 'status'])->name('videogallery.status');
        Route::get('/videogallery/create', [VideogalleryController::class, 'maanVideogalleryCreate'])->name('videogallery.create');
        //Route videogallery store
        Route::post('/videogallery', [VideogalleryController::class, 'maanVideogalleryStore']);
        //Route videogallery edit
        Route::get('/videogallery/edit/{videogallery}', [VideogalleryController::class, 'maanVideogalleryEdit'])->name('videogallery.edit');
        //Route videogallery update
        Route::match(['put', 'patch'], '/videogallery/update/{videogallery}', [VideogalleryController::class, 'maanVideogalleryUpdate'])->name('videogallery.update');
        //Route videogallery delete
        Route::delete('/videogallery/destroy/{videogallery}', [VideogalleryController::class, 'maanVideogalleryDestroy'])->name('videogallery.destroy');
        Route::post('/videogallery/delete-all', [VideogalleryController::class, 'deleteAll'])->name('videogallery.delete-all');

    });

    Route::group(['middleware' => ['admin']], function () {

        //Route blog category
        Route::get('/blog/category', [BlogcategoryController::class, 'maanBlogCategoryIndex'])->name('blog.category');
        // Blog Category Filter
        Route::post('blog/category/filter', [BlogcategoryController::class, 'acnooFilter'])->name('blog.category.filter');
        //Route blog category store
        Route::post('/blog/category', [BlogcategoryController::class, 'maanBlogCategoryStore']);
        //Route blog category update
        Route::match(['put', 'patch'], '/blog/category/update/{blogcategory}', [BlogcategoryController::class, 'maanBlogCategoryUpdate'])->name('blog.category.update');
        // Route::put('/blog/{blogcategory}', [BlogcategoryController::class, 'maanBlogCategoryUpdate'])->name('blog.category.update');
        //Route blog category delete
        Route::delete('/blog/category/destroy/{blogcategory}', [BlogcategoryController::class, 'maanBlogCategoryDestroy'])->name('blog.category.destroy');
        Route::post('/blog/category/delete-all', [BlogcategoryController::class, 'deleteAll'])->name('blog.category.delete-all');

        //Route blog sub-category
        Route::get('/blog/subcategory', [BlogsubcategoryController::class, 'maanBlogSubcategoryIndex'])->name('blog.subcategory');
        Route::post('blog/subcategory/filter', [BlogsubcategoryController::class, 'acnooFilter'])->name('blog.subcategory.filter');
        //Route blog sub-category store
        Route::post('/blog/subcategory', [BlogsubcategoryController::class, 'maanBlogSubcategoryStore']);
        //Route blog sub-category update
        Route::match(['put', 'patch'], '/blog/subcategory/update/{blogsubcategory}', [BlogsubcategoryController::class, 'maanBlogSubcategoryUpdate'])->name('blog.subcategory.update');
        Route::delete('/blog/subcategory/destroy/{blogsubcategory}', [BlogsubcategoryController::class, 'maanBlogSubcategoryDestroy'])->name('blog.subcategory.destroy');
        Route::post('/blog/subcategory/delete-all', [BlogsubcategoryController::class, 'deleteAll'])->name('blog.subcategory.delete-all');

        //Route blog
        Route::get('/blog', [BlogController::class, 'maanBlogIndex'])->name('blog');
        Route::post('blog/filter', [BlogController::class, 'acnooFilter'])->name('blog.filter');
        //Route blog create
        Route::get('/blog/create', [BlogController::class, 'maanBlogCreate'])->name('blog.create');
        //Route blog store
        Route::post('/blog', [BlogController::class, 'maanBlogStore']);
        //Route blog edit
        Route::get('/blog/edit/{blog?}', [BlogController::class, 'maanBlogEdit'])->name('blog.edit');
        //Route blog update
        Route::match(['put', 'patch'], '/blog/update/{blog}', [BlogController::class, 'maanBlogUpdate'])->name('blog.update');
        //Route blog delete
        Route::delete('/blog/destroy/{blog}', [BlogController::class, 'maanBlogDestroy'])->name('blog.destroy');
        Route::post('/blog/delete-all', [BlogController::class, 'deleteAll'])->name('blog.delete-all');
        Route::post('blog/status/{id}', [BlogController::class, 'status'])->name('blog.status');

        // Update seetings
        Route::resource('login-pages', AcnooLoginPageController::class)->only('index', 'update');


        //Route reporter
        Route::get('/reporter', [NewsreporterController::class, 'maanReporterIndex'])->name('reporter');
        //Route reporter create
        Route::post('reporter/filter', [NewsreporterController::class, 'acnooFilter'])->name('reporter.filter');
        Route::get('/reporter/create', [NewsreporterController::class, 'maanReporterCreate'])->name('reporter.create');
        //Route reporter store
        Route::post('/reporter', [NewsreporterController::class, 'maanReporterStore']);
        //Route reporter edit
        Route::get('/reporter/edit/{reporter}', [NewsreporterController::class, 'maanReporterEdit'])->name('reporter.edit');
        //Route reporter update
        Route::match(['put', 'patch'], '/reporter/update/{reporter}', [NewsreporterController::class, 'maanReporterUpdate'])->name('reporter.update');
        //Route reporter delete
        Route::delete('/reporter/destroy/{reporter}', [NewsreporterController::class, 'maanReporterDestroy'])->name('reporter.destroy');
        Route::post('/reporter/delete-all', [NewsreporterController::class, 'deleteAll'])->name('reporter.delete-all');

        //Route contact
        Route::get('contact', [\App\Http\Controllers\Admin\ContactController::class, 'maancontact'])->name('contact');
        Route::post('contact/filter', [\App\Http\Controllers\Admin\ContactController::class, 'acnooFilter'])->name('contact.filter');
        //Route contact delete
        Route::delete('contact/destroy/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'maancontactdestroy'])->name('contact.destroy');
        Route::post('/contact/delete-all', [\App\Http\Controllers\Admin\ContactController::class, 'deleteAll'])->name('contact.delete-all');

    });

    //Route blog status publish
    Route::get('/publish/status/ajax', [AjaxController::class, 'maanPublishStatus'])->name('publish.status.ajax');
    //route theme color change
    Route::get('/publish/theme-color/ajax', [AjaxController::class, 'maanPublishThemeColor'])->name('publish.theme-color.ajax');

    //filepond routes
    Route::post('/process', [FilepondController::class, 'process'])->name('filepond.process');
    Route::delete('/remove', [FilepondController::class, 'remove'])->name('filepond.remove');
});

Route::get('/clear-all', function () {
    Artisan::call('optimize:clear');
    echo Artisan::output();
});

Route::get('/clear-view-cache', function () {
    Artisan::call('view:clear');
    return 'View Cache Cleared';
});

Route::get('/cache-clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return back()->with('success', __('Cache has been cleared.'));
});

Route::get('/reset', function () {
    Artisan::call('migrate:fresh --seed');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return 'Success.';
});

Route::get('/update', function () {
    Artisan::call('migrate');

    return redirect('/login')->with('success', 'New version has been installed.');
});
Route::get('/test-data', [TempDataTransformController::class, 'startTransfer']);
Route::get('/kutla-alboms', [TempDataTransformController::class, 'transferAlboms']);
Route::get('/transfer-videos', [TempDataTransformController::class, 'transferVideos']);
require __DIR__ . '/auth.php';
