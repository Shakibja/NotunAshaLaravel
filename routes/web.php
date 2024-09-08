<?php

use Illuminate\Support\Facades\Route;

// BAckend Controller
use App\Http\Controllers\Backend\DesignationController;
// use App\Models\Backend\Designation;
use App\Http\Controllers\Backend\AuthorController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostNewsController;
use App\Http\Controllers\Backend\MultimediaController;
use App\Http\Controllers\Backend\EpaperController;

// Frontend Controller
use App\Http\Controllers\Frontend\HomeController;

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



// Frontend Custom Route
// Route::get('/', function () {
//     return view('welcome');
// });



Route::middleware(['logvisitor'])->group(function () {
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('/newsdetails/{slug}', [HomeController::class, 'newsDetails'])->name('news_details');
    Route::get('/e-paper-page', [HomeController::class, 'e_paper_page'])->name('e_paper_page');
//    Route::get('get-e-paper-page', [HomeController::class, 'get_e_paper_page'])->name('get_e_paper_page');


});
Route::get('/search', [HomeController::class, 'Search'])->name('news_search');
Route::get('/newscategories/{category_slug}', [HomeController::class, 'newsCategory'])->name('news_by_category');
Route::get('/latest/news',[HomeController::class, 'latest_news'])->name('latestNews');
Route::match(['get', 'post'],'/epaper',[HomeController::class, 'epaper'])->name('epaper');
Route::match(['get', 'post'],'/page/{date}/{page_number?}',[HomeController::class, 'page'])->name('page');
Route::get('/column_view/{date}/{page_number?}/{column_number?}',[HomeController::class, 'column_view'])->name('column_view');
Route::get('/column_view_add/{date}/{page_number?}/{column_number?}',[HomeController::class, 'column_view_add'])->name('column_view_add');
Route::get('/column_share/{date}/{page_number?}/{column_number?}',[HomeController::class, 'column_share'])->name('column_share');





// Default Route
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 require __DIR__.'/auth.php';




//  Backend Custom Route
Route::middleware(['auth'])->group(function () {

    // Author Rout
    Route::group(['prefix' => '/author'], function () {
        Route::get('/index',[AuthorController::class, 'index'])->name('author_page');
        Route::post('/store',[AuthorController::class, 'store'])->name('store_author');
        Route::get('/delete/{author_id}',[AuthorController::class, 'delete'])->name('delete_author');
        Route::get('/edit/{author_id}',[AuthorController::class, 'edit'])->name('edit_author');
        Route::post('/update/{author_id}',[AuthorController::class, 'update'])->name('update_author');
    });

    // Category Rout
    Route::group(['prefix' => '/category'], function () {
        Route::get('/index',[CategoryController::class, 'index'])->name('category_page');
        Route::post('/store',[CategoryController::class, 'store'])->name('store_category');
        Route::get('/delete/{category_slug}',[CategoryController::class, 'delete'])->name('delete_category');
        Route::get('/edit/{category_slug}',[CategoryController::class, 'edit'])->name('edit_category');
        Route::post('/update/{category_slug}',[CategoryController::class, 'update'])->name('update_category');
    });

    // News Rout
    Route::group(['prefix' => '/postnews'], function () {
        Route::get('/index',[PostNewsController::class, 'index'])->name('add_news_page');
        Route::post('/store',[PostNewsController::class, 'store'])->name('store_news');
        Route::post('/upload',[PostNewsController::class, 'upload'])->name('inner_image_upload');
        Route::get('/view',[PostNewsController::class, 'view'])->name('manage_news_page');
        Route::get('/delete/{slug}',[PostNewsController::class, 'delete'])->name('delete_news');
        Route::get('/edit/{slug}',[PostNewsController::class, 'edit'])->name('edit_news_page');
        Route::post('/update/{slug}',[PostNewsController::class, 'update'])->name('update_news');


        // banner starts 07may2024 
        Route::get('/banner_add',[PostNewsController::class, 'add_banner_page'])->name('add_banner_page');
        Route::post('/banner_store',[PostNewsController::class, 'banner_store'])->name('banner_store');
        Route::get('/banner_view',[PostNewsController::class, 'banner_view'])->name('banner_view');
        Route::get('edit_banner/{id}',[PostNewsController::class, 'edit_banner'])->name('edit_banner');
        Route::post('update_banner/{id}',[PostNewsController::class, 'update_banner'])->name('update_banner');
        Route::get('/delete_banner/{id}',[PostNewsController::class, 'delete_banner'])->name('delete_banner');

    });

    // E Paper Rout
    Route::group(['prefix' => '/e-paper'], function () {
        Route::get('/index',[EpaperController::class, 'index'])->name('add_e_paper');
        Route::post('/store',[EpaperController::class, 'store'])->name('store_e_paper');
//        Route::post('/upload',[PostNewsController::class, 'upload'])->name('inner_image_upload');
        Route::get('/view',[EpaperController::class, 'view'])->name('manage_e_paper');
        Route::get('/view_column',[EpaperController::class, 'view_column'])->name('manage_e_paper_column');
        Route::get('/delete/{id}',[EpaperController::class, 'delete'])->name('delete_e_paper');
        Route::get('/delete_column/{id}',[EpaperController::class, 'delete_e_paper_column'])->name('delete_e_paper_column');
        Route::get('/edit/{id}',[EpaperController::class, 'edit'])->name('edit_e_paper');
        Route::get('/map_column/{id}',[EpaperController::class, 'map_column'])->name('map_e_paper_column');
        Route::post('/update',[EpaperController::class, 'update'])->name('update_e_paper');
        Route::post('/update_map/{id}',[EpaperController::class, 'update_map'])->name('update_epaper_map');

        Route::get('/epaper_column/{date}/{page_number?}',[EpaperController::class, 'epaper_column'])->name('epaper_column');
        Route::get('/epaper_ads',[EpaperController::class, 'epaper_ads'])->name('epaper_ads');
        Route::post('/store_epaper_column',[EpaperController::class, 'store_epaper_column'])->name('store_epaper_column');
        Route::post('/store_epaper_ads',[EpaperController::class, 'store_epaper_ads'])->name('store_epaper_ads');
        Route::get('/view_epaper_ads',[EpaperController::class, 'view_epaper_ads'])->name('manage_e_paper_ads');
    });

        // Multimedia Rout
        Route::group(['prefix' => '/multimedia'], function () {
            Route::get('/index',[MultimediaController::class, 'index'])->name('add_multimedia_page');
            Route::post('/store',[MultimediaController::class, 'store'])->name('store_multimedia');
            Route::get('/view',[MultimediaController::class, 'view'])->name('manage_multimedia_page');
            Route::get('/delete/{id}',[MultimediaController::class, 'delete'])->name('delete_multimedia');
            Route::post('/update/{id}',[MultimediaController::class, 'update'])->name('update_multimedia');
        });

});


