<?php

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\StallsController;
use App\Http\Controllers\Admin\SubmitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

// Admin Routes
Route::group(['prefix' => 'dashboard', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', function () {
        $pageConfig = [
            'title' => 'Trang chủ',
            'active' => 'home',
            'breadcrumb' => [
                ['Trang chủ']
            ],
        ];
        return view('admin.components.home', $pageConfig);
    })->name('dashboard');
    Route::resource('stalls', StallsController::class, ['names' => 'admin.stalls']);
    Route::resource('users', UserController::class, ['names' => 'admin.users'])->middleware('administrator');
    Route::group(['prefix' => '{stall}'], function () {
        Route::resource('images', ImageController::class, ['names' => 'admin.images']);
        Route::resource('posts', PostController::class, ['names' => 'admin.posts']);
        Route::get('posts/{post}/active', [PostController::class, 'active'])->name('admin.posts.active');
    });
    Route::resource('submits', SubmitController::class, ['names' => 'admin.submits']);
    Route::group(['prefix' => '{submit}'], function () {
        Route::resource('speakers', SpeakerController::class, ['names' => 'admin.speakers']);
    });
});

// Frontend Routes
Route::group(['middleware' => ['web']], function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'showHomePage')->name('frontend.home.show');
        Route::get('/sanh-trien-lam', 'showHallPage')->name('frontend.hall.show');
        Route::get('/trien-lam', 'showExhibitionPage')->name('frontend.exhibition.show');
        Route::get('/trien-lam/stall/{stall}/page/{currentPage}', 'showStall')->name('frontend.stall.show');
        Route::get('/trien-lam/stall/{stall}/detail', 'showDetailStall')->name('frontend.stall.detail');
        Route::get('/trien-lam/search', 'searchStall')->name('frontend.stall.search');
        Route::get('/hoi-thao/{submit?}', 'showSubmit')->name('frontend.submit.show');
    });
});

// Laravel Filemanager Routes
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('test', [TestController::class, 'index']);
