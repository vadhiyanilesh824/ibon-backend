<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/captcha/{type?}', [SiteController::class, 'captcha'])
        ->name('sites.captcha');
Route::get('/captcha_process', [SiteController::class, 'captcha_process'])
        ->name('sites.captcha_process');
Route::post('/contact_form_submit', [SiteController::class, 'contact_form_submit'])
        ->name('sites.contact_form_submit');

Route::any('/', [SiteController::class, 'home'])
        ->name('site.home');
Route::get('/product/{slug?}', [SiteController::class, 'product'])
        ->name('site.product');
Route::get('/product/detail/{slug}', [SiteController::class, 'product_detail'])
        ->name('site.product_detail');
Route::get('/collection/{slug?}', [SiteController::class, 'category'])
        ->name('site.category');
Route::get('/company-profile', [SiteController::class, 'about'])
        ->name('site.about');
Route::get('/cdm-message', [SiteController::class, 'cdm_message'])
        ->name('site.cdm_message');
Route::get('/technology', [SiteController::class, 'product_quality'])
        ->name('site.product_quality');
Route::get('/exports', [SiteController::class, 'export'])
        ->name('site.export');
Route::get('/information', [SiteController::class, 'product_information'])
        ->name('site.product_information');
Route::get('/catalogue', [SiteController::class, 'catalogue'])
        ->name('site.catalogue');
Route::get('/contact', [SiteController::class, 'contact'])
        ->name('site.contact');



// Route::get('/', function () {
//     return view('fontend.pages.home');
// })->name('site.home');

// Route::get('/gallery', [SiteController::class, 'gallery'])
//         ->name('site.gallery');
// Route::get('/catalogue/{id}', [SiteController::class, 'catalogue_detail'])
//         ->name('sites.catalogue_detail');

// Route::get('/product', [SiteController::class, 'product'])
//         ->name('site.product');


// Route::get('/technical_specification', [SiteController::class, 'technical_specification'])
//         ->name('site.technical_specification');


// Route::get('/blogs/{slug?}', [SiteController::class, 'news'])
//         ->name('site.news');
// Route::get('/blog/{slug}', [SiteController::class, 'blog_detail'])
//         ->name('site.blog_detail');
// Route::get('/calculator', [SiteController::class, 'calculator'])
//         ->name('site.calculator');
// Route::get('/Product_quality', [SiteController::class, 'product_quality'])
//         ->name('site.product_quality');
// Route::get('/dealers', [SiteController::class, 'dealers'])->name('dealers');
// Route::get('/certification', [SiteController::class, 'certification'])
//         ->name('site.certification');
Route::post('/product_form_submit', [SiteController::class, 'product_form_submit'])
        ->name('sites.product_form_submit');
Route::post('/quotation_form_submit', [SiteController::class, 'quotation_form_submit'])
        ->name('sites.quotation_form_submit');
Route::post('/dealer_form_submit', [SiteController::class, 'dealer_form_submit'])
        ->name('sites.dealer_form_submit');
Route::post('/vendor_form_submit', [SiteController::class, 'vendor_form_submit'])
        ->name('sites.vendor_form_submit');
require __DIR__ . '/auth.php';
