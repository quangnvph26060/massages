<?php

use App\Models\Video;
use App\Models\Banner;
use App\Models\Pricing;
use App\Models\Service;
use App\Models\Facility;
use App\Models\Introduction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\PricingController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\FacilityController;
use App\Http\Controllers\Backend\IntroductionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function () {
    route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');

        Route::post('login', [AuthController::class, 'authenticate']);
    });

    route::middleware('auth')->group(function () {
        route::get('/', function () {
            return view('backend.layouts.master');
        })->name('dashboard');

        // route::resource('settings', SettingController::class);
        route::get('logout', [AuthController::class, 'logout'])->name('logout');

        route::get('settings', [SettingController::class, 'index'])->name('settings');
        route::post('settings', [SettingController::class, 'store']);

        route::get('banners', [BannerController::class, 'index'])->name('banners');
        route::post('banners', [BannerController::class, 'store']);

        route::get('videos', [VideoController::class, 'index'])->name('videos');
        route::post('videos', [VideoController::class, 'store']);

        route::get('pricings', [PricingController::class, 'index'])->name('pricings');
        route::post('pricings', [PricingController::class, 'store']);

        route::get('services', [ServiceController::class, 'index'])->name('services');
        route::post('services', [ServiceController::class, 'store']);

        route::get('facilities', [FacilityController::class, 'index'])->name('facilities');
        route::post('facilities', [FacilityController::class, 'store']);

        route::get('introductions', [IntroductionController::class, 'index'])->name('introductions');
        route::post('introductions', [IntroductionController::class, 'store']);
    });
});











route::get('', function () {

    $banner = Banner::firstOrCreate();
    $video = Video::firstOrCreate();
    $pricing = Pricing::firstOrCreate();
    $service  = Service::firstOrCreate();
    $facility  = Facility::firstOrCreate();
    $introduc = Introduction::firstOrCreate();

    return view('frontend.layouts.master', compact('banner', 'video', 'pricing', 'service', 'facility', 'introduc'));
})->name('home');
