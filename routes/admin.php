<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as ADMIN;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Roles & Permissions
    Route::resource('roles', ADMIN\RoleController::class)->except('show');
    Route::resource('permissions', ADMIN\PermissionController::class)->only('index', 'store');
    

    // Settings
    Route::resource('settings', ADMIN\SettingsController::class)->only('index', 'update');
    // Route::resource('system-settings', ADMIN\SystemSettingController::class)->only('index', 'store');

    // Gateway
    Route::resource('gateways', ADMIN\GatewayController::class)->only('index', 'update');

    // Notifications manager
    Route::prefix('notifications')->controller(ADMIN\NotificationController::class)->name('notifications.')->group(function () {
        Route::get('/', 'mtIndex')->name('index');
        Route::get('/{id}', 'mtView')->name('mtView');
        Route::get('view/all/', 'mtReadAll')->name('mtReadAll');
    });
});
