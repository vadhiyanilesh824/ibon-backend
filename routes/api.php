<?php

use App\Http\Controllers\api\V1\MediaController;
use App\Http\Controllers\api\V1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\V1\HomeController;
use App\Http\Controllers\api\V1\CatalogueController;
use App\Http\Controllers\api\V1\Product_mainController;
use App\Http\Controllers\api\V1\InquiryController;
use App\Http\Controllers\api\V1\GeneralController;
use App\Http\Controllers\api\V1\AppUserController;
use App\Http\Controllers\api\V1\ProductController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('v1')->group(function () {
//     Route::apiResource("post", PostController::class);
//     Route::apiResource("media", MediaController::class);
// });

//,'namespace' => "App/Http/Controllers/api/V1"
Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource("post", PostController::class);
    Route::apiResource("media", MediaController::class);
});

//Route::group(['prefix' => 'v1', 'namespace'=> )

Route::get('home', [HomeController::class, 'home']);
Route::get('catalogue', [CatalogueController::class, 'catalogue']);
Route::get('product_main', [Product_mainController::class, 'product_main']);
Route::get('favourite', [Product_mainController::class, 'favourite']);
route::get('product', [Product_mainController::class, 'product']);
Route::get('product_detail', [Product_mainController::class, 'product_detail']);

route::post('catalogue', [InquiryController::class, 'catalogue']);
route::post('product_inquiry_send', [InquiryController::class, 'catalogue2']);

route::post('quotes', [InquiryController::class, 'quotes']);
route::post('delear', [InquiryController::class, 'delear']);
route::post('appointment', [InquiryController::class, 'appointment']);
Route::get('country', [GeneralController::class, 'country']); //get country  data 
Route::get('search', [Product_mainController::class, 'search']);
Route::get('app_users', [AppUserController::class, 'app_user_list']); //user register
Route::post('register', [AppUserController::class, 'register']); //user register
Route::post('otpverify', [AppUserController::class, 'otpverify']); //user otp verify
Route::post('Resendotp', [AppUserController::class, 'Resendotp']); //user resend otp 
Route::post('login', [AppUserController::class, 'login']); //user login 
Route::post('changepassword', [AppUserController::class, 'changepassword']); //user change password
Route::post('updateprofile', [AppUserController::class, 'updateprofile']); //update profile
route::post('Notification', [AppUserController::class, 'Notification']); //notifaction
Route::post('forgotpassword', [AppUserController::class, 'forgotpassword']);
route::post('validateotp', [AppUserController::class, 'validateotp']);
route::post('resetpassword', [AppUserController::class, 'resetpassword']); //reset passwowrd
Route::get('showprofile', [AppUserController::class, 'showprofile']); //show profile data 
Route::get('state', [GeneralController::class, 'state']);
Route::get('city', [GeneralController::class, 'city']);
Route::get('generalinformation', [GeneralController::class, 'generalinformation']);

Route::get('product_list', [ProductController::class, 'product_list']);
Route::get('category_list', [ProductController::class, 'category_list']);
Route::get('catalogue_list', [ProductController::class, 'catalogue_list']);
Route::get('brand_list', [ProductController::class, 'brand_list']);
Route::get('color_list', [ProductController::class, 'color_list']);
Route::get('all_colors', [ProductController::class, 'all_colors']);
Route::get('attribute_list', [ProductController::class, 'attribute_list']);
Route::post('change_product_status', [ProductController::class, 'change_product_section']);
Route::get('slider_list', [ProductController::class, 'slider_list']);
Route::get('uploaded_files', [ProductController::class, 'uploaded_files_list']);
Route::post('delete_uploaded_file', [ProductController::class, 'destroy_uploaded_files']);
route::post('block_app_user', [AppUserController::class, 'block_app_user']);
route::post('unblock_app_user', [AppUserController::class, 'unblock_app_user']);

Route::get('contact_inquiry', [ProductController::class, 'contact_inquiry']);
Route::get('product_inquiry', [ProductController::class, 'product_inquiry']);
Route::get('dealer_inquiry', [ProductController::class, 'dealer_inquiry']);
Route::get('vendor_inquiry', [ProductController::class, 'vendor_inquiry']);
Route::get('dealer_inquiry_approve', [ProductController::class, 'dealer_inquiry_approve']);

Route::post('add_color', [ProductController::class, 'color_store']);
Route::post('add_attribute', [ProductController::class, 'attribute_store']);
Route::post('add_brand', [ProductController::class, 'brand_store']);
Route::post('add_slider', [ProductController::class, 'slider_store']);

Route::post('add_category', [ProductController::class, 'category_store']);
Route::post('add_product', [ProductController::class, 'product_store']);
Route::post('attribute_values_by_id', [ProductController::class, 'attribute_values']);

Route::post('attribute_delete', [ProductController::class, 'attribute_delete']);
Route::post('brand_delete', [ProductController::class, 'brand_delete']);
Route::post('color_delete', [ProductController::class, 'color_delete']);
Route::post('product_delete', [ProductController::class, 'product_delete']);
Route::post('category_delete', [ProductController::class, 'category_delete']);
Route::post('slider_delete', [ProductController::class, 'slider_delete']);

Route::post('color_edit', [ProductController::class, 'color_edit']);
Route::post('color_update', [ProductController::class, 'color_update']);
// Route::post('brand_update',[ProductController::class,'brand_update']);

Route::post('slider_update', [ProductController::class, 'slider_update']);
Route::post('brand_update', [ProductController::class, 'brand_update']);
Route::post('attribute_update', [ProductController::class, 'attribute_update']);
Route::post('product_update', [ProductController::class, 'product_update']);
Route::post('category_update', [ProductController::class, 'category_update']);

Route::post('add_catalogue', [ProductController::class, 'catalogue_store']);
Route::post('catalogue_update', [ProductController::class, 'catalogue_update']);
Route::post('catalogue_delete', [ProductController::class, 'catalogue_delete']);


Route::post('upload_file', [MediaController::class, 'upload']);

Route::get('dashboard', [ProductController::class, 'dashboard']);
