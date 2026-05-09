<?php

use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\AttributeValueController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CatalogueController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\DealerController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\FileUploadController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\admin\PagesControler;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SliderControler;
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

Route::group(['prefix' => 'admin'], function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });

        Route::get('/d_dashboard', function () {
            return view('admin.dashboard');
        });
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('user', [UserController::class, 'index'])
            ->name('user');
        Route::get('user/add', [UserController::class, 'create'])
            ->name('user.add');
        Route::post('user/save', [UserController::class, 'store'])
            ->name('user.save');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])
            ->name('user.edit');
        Route::post('user/update/{id}', [UserController::class, 'update'])
            ->name('user.update');
        Route::get('user/destroy/{id}', [UserController::class, 'destroy'])
            ->name('user.destroy');
    });
    Route::middleware('auth')->group(function () {
        Route::get('roles', [RolesController::class, 'index'])
            ->name('roles');
        Route::get('roles/add', [RolesController::class, 'create'])
            ->name('roles.add');
        Route::post('roles/save', [RolesController::class, 'store'])
            ->name('roles.save');
        Route::get('roles/edit/{id}', [RolesController::class, 'edit'])
            ->name('roles.edit');
        Route::post('roles/update', [RolesController::class, 'update'])
            ->name('roles.update');
        Route::post('roles/destroy/{id}', [RolesController::class, 'destroy'])
            ->name('roles.destroy');
    });
    Route::middleware('auth')->group(function () {
        Route::get('permission', [PermissionController::class, 'index'])
            ->name('permission');
        Route::get('permission/add', [PermissionController::class, 'create'])
            ->name('permission.add');
        Route::post('permission/save', [PermissionController::class, 'store'])
            ->name('permission.save');
        Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])
            ->name('permission.edit');
        Route::post('permission/update', [PermissionController::class, 'update'])
            ->name('permission.update');
        Route::post('permission/destroy/{id}', [PermissionController::class, 'destroy'])
            ->name('permission.destroy');
    });

    // Categories Routes
    Route::middleware('auth')->group(function () {
        Route::get('category', [CategoryController::class, 'index'])
            ->name('category');
        Route::get('category/add', [CategoryController::class, 'create'])
            ->name('category.add');
        Route::post('category/save', [CategoryController::class, 'store'])
            ->name('category.save');
        Route::get('category/edit/{id}', [CategoryController::class, 'edit'])
            ->name('category.edit');
        Route::patch('category/update', [CategoryController::class, 'update'])
            ->name('category.update');
        Route::post('category/destroy/{id}', [CategoryController::class, 'destroy'])
            ->name('category.destroy');
    });

    // Brands Routes
    Route::middleware('auth')->group(function () {
        Route::get('brands', [BrandController::class, 'index'])
            ->name('brands');
        Route::get('brands/add', [BrandController::class, 'create'])
            ->name('brands.add');
        Route::post('brands/save', [BrandController::class, 'store'])
            ->name('brands.save');
        Route::get('brands/edit/{id}', [BrandController::class, 'edit'])
            ->name('brands.edit');
        Route::patch('brands/update', [BrandController::class, 'update'])
            ->name('brands.update');
        Route::post('brands/destroy/{id}', [BrandController::class, 'destroy'])
            ->name('brands.destroy');
    });

    // attributes Routes
    Route::middleware('auth')->group(function () {
        Route::get('attributes', [AttributeController::class, 'index'])
            ->name('attributes');
        Route::get('attributes/add', [AttributeController::class, 'create'])
            ->name('attributes.add');
        Route::post('attributes/save', [AttributeController::class, 'store'])
            ->name('attributes.save');
        Route::get('attributes/edit/{id}', [AttributeController::class, 'edit'])
            ->name('attributes.edit');
        Route::patch('attributes/update', [AttributeController::class, 'update'])
            ->name('attributes.update');
        Route::post('attributes/destroy/{id}', [AttributeController::class, 'destroy'])
            ->name('attributes.destroy');
    });

    // attribute values Routes
    Route::middleware('auth')->group(function () {
        Route::get('attribute_value/{id}', [AttributeValueController::class, 'show'])
            ->name('attribute_value');
        Route::get('attribute_value/add', [AttributeValueController::class, 'create'])
            ->name('attribute_value.add');
        Route::post('attribute_value/save', [AttributeValueController::class, 'store'])
            ->name('attribute_value.save');
        Route::get('attribute_value/edit/{id}', [AttributeValueController::class, 'edit'])
            ->name('attribute_value.edit');
        Route::patch('attribute_value/update', [AttributeValueController::class, 'update'])
            ->name('attribute_value.update');
        Route::post('attribute_value/destroy/{id}', [AttributeValueController::class, 'destroy'])
            ->name('attribute_value.destroy');
    });

    // colors Routes
    Route::middleware('auth')->group(function () {
        Route::get('colors', [ColorController::class, 'index'])
            ->name('colors');
        Route::get('colors/add', [ColorController::class, 'create'])
            ->name('colors.add');
        Route::post('colors/save', [ColorController::class, 'store'])
            ->name('colors.save');
        Route::get('colors/edit/{id}', [ColorController::class, 'edit'])
            ->name('colors.edit');
        Route::patch('colors/update', [ColorController::class, 'update'])
            ->name('colors.update');
        Route::post('colors/destroy/{id}', [ColorController::class, 'destroy'])
            ->name('colors.destroy');
    });

    // products Routes
    Route::middleware('auth')->group(function () {
        Route::get('products', [ProductController::class, 'index'])
            ->name('products');
        Route::get('products/add', [ProductController::class, 'create'])
            ->name('products.add');
        Route::post('products/save', [ProductController::class, 'store'])
            ->name('products.save');
        Route::get('products/edit/{id}', [ProductController::class, 'edit'])
            ->name('products.edit');
        Route::patch('products/update', [ProductController::class, 'update'])
            ->name('products.update');
        Route::post('products/destroy/{id}', [ProductController::class, 'destroy'])
            ->name('products.destroy');
        Route::post('products/add_more_choice_option', [ProductController::class, 'add_more_choice_option'])
            ->name('products.add-more-choice-option');
        Route::get('products/change_section', [ProductController::class, 'change_section'])
            ->name('products.change_section');
    });


    // slider Routes
    Route::middleware('auth')->group(function () {
        Route::get('slider', [SliderControler::class, 'index'])
            ->name('slider');
        Route::get('slider/add', [SliderControler::class, 'create'])
            ->name('slider.add');
        Route::post('slider/save', [SliderControler::class, 'store'])
            ->name('slider.save');
        Route::get('slider/edit/{id}', [SliderControler::class, 'edit'])
            ->name('slider.edit');
        Route::patch('slider/update', [SliderControler::class, 'update'])
            ->name('slider.update');
        Route::post('slider/destroy/{id}', [SliderControler::class, 'destroy'])
            ->name('slider.destroy');
    });

    // catalogue Routes
    Route::middleware('auth')->group(function () {
        Route::get('catalogues', [CatalogueController::class, 'index'])
            ->name('catalogues');
        Route::get('catalogue/add', [CatalogueController::class, 'create'])
            ->name('catalogue.add');
        Route::post('catalogue/save', [CatalogueController::class, 'store'])
            ->name('catalogue.save');
        Route::get('catalogue/edit/{id}', [CatalogueController::class, 'edit'])
            ->name('catalogue.edit');
        Route::patch('catalogue/update', [CatalogueController::class, 'update'])
            ->name('catalogue.update');
        Route::post('catalogue/destroy/{id}', [CatalogueController::class, 'destroy'])
            ->name('catalogue.destroy');
    });

    // pages Routes
    Route::middleware('auth')->group(function () {
        Route::get('pages', [PagesControler::class, 'index'])
            ->name('pages');
        Route::get('pages/add', [PagesControler::class, 'create'])
            ->name('pages.add');
        Route::post('pages/save', [PagesControler::class, 'store'])
            ->name('pages.save');
        Route::get('pages/edit/{id}', [PagesControler::class, 'edit'])
            ->name('pages.edit');
        Route::patch('pages/update', [PagesControler::class, 'update'])
            ->name('pages.update');
        Route::post('pages/destroy/{id}', [PagesControler::class, 'destroy'])
            ->name('pages.destroy');
    });

    Route::middleware('auth')->group(function () {
        Route::get('blog-category', [BlogCategoryController::class, 'index'])
            ->name('blog-category');
        Route::get('blog-category/add', [BlogCategoryController::class, 'create'])
            ->name('blog-category.add');
        Route::post('blog-category/save', [BlogCategoryController::class, 'store'])
            ->name('blog-category.save');
        Route::get('blog-category/edit/{id}', [BlogCategoryController::class, 'edit'])
            ->name('blog-category.edit');
        Route::patch('blog-category/update', [BlogCategoryController::class, 'update'])
            ->name('blog-category.update');
        Route::post('blog-category/destroy/{id}', [BlogCategoryController::class, 'destroy'])
            ->name('blog-category.destroy');
    });

    Route::middleware('auth')->group(function () {
        Route::get('blog', [BlogController::class, 'index'])
            ->name('blog');
        Route::get('blog/add', [BlogController::class, 'create'])
            ->name('blog.add');
        Route::post('blog/save', [BlogController::class, 'store'])
            ->name('blog.save');
        Route::get('blog/edit/{id}', [BlogController::class, 'edit'])
            ->name('blog.edit');
        Route::patch('blog/update', [BlogController::class, 'update'])
            ->name('blog.update');
        Route::post('blog/destroy/{id}', [BlogController::class, 'destroy'])
            ->name('blog.destroy');
    });
    Route::middleware('auth')->group(function () {
        Route::get('contact_inquiry', [InquiryController::class, 'contact_inquiry'])
            ->name('contact_inquiry');
        Route::get('product_inquiry', [InquiryController::class, 'product_inquiry'])
            ->name('product_inquiry');
        Route::get('contact_inquiry/destroy/{id}', [InquiryController::class, 'contact_inquiry_destroy'])
            ->name('contact_inquiry.destroy');
        Route::get('dealer_inquiry', [InquiryController::class, 'dealer_inquiry'])
            ->name('dealer_inquiry');
        Route::get('inquiry_detail/{id}', [InquiryController::class, 'dealer_inquiry_detail'])
            ->name('inquiry_detail.view');
        Route::get('dealer_inquiry/destroy/{id}', [InquiryController::class, 'dealer_inquiry_destroy'])
            ->name('dealer_inquiry.destroy');
        Route::get('dealer_inquiry/approve/{id}', [InquiryController::class, 'dealer_inquiry_approve'])
            ->name('dealer_inquiry.approve');
        Route::get('vendor_inquiry', [InquiryController::class, 'vendor_inquiry'])
            ->name('vendor_inquiry');
    });

    Route::middleware('auth')->group(function () {
        Route::get('dealer', [DealerController::class, 'index'])
            ->name('dealer');
    });
});


// Upload Files
Route::middleware('auth')->group(function () {
    Route::get('/refresh-csrf', function () {
        return csrf_token();
    });

    Route::post('/dsj-uploader', [FileUploadController::class, 'show_uploader']);
    Route::post('/dsj-uploader/upload', [FileUploadController::class, 'upload']);
    Route::get('/dsj-uploader/get_uploaded_files', [FileUploadController::class, 'get_uploaded_files']);
    Route::post('/dsj-uploader/get_file_by_ids', [FileUploadController::class, 'get_preview_files']);
    Route::get('/dsj-uploader/download/{id}', [FileUploadController::class, 'attachment_download'])->name('download_attachment');

    //Upload
    Route::any('/uploads/', [FileUploadController::class, 'index'])->name('my_uploads.all');
    Route::any('/uploads/new', [FileUploadController::class, 'create'])->name('my_uploads.new');
    Route::any('/uploads/file-info', [FileUploadController::class, 'file_info'])->name('my_uploads.info');
    Route::get('/uploads/destroy/{id}', [FileUploadController::class, 'destroy'])->name('my_uploads.destroy');
});
require __DIR__ . '/auth.php';
