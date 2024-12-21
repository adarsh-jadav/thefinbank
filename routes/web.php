<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\admin\UserPermissionController;
use App\Http\Controllers\admin\Admin_userController;

use App\Http\Controllers\admin\ContactusController;
use App\Http\Controllers\admin\CMSController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\PopularProductController;
use App\Http\Controllers\admin\EnquiryController;
use App\Http\Controllers\admin\SystemController;
use App\Http\Controllers\admin\TestimonialController;


/* front controller start */

use App\Http\Controllers\front\HomeController;


/* front controller end */

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

Route::controller(HomeController::class)->group(function() {

    Route::get('/', 'index')->name('register');
    Route::get('loans/{category_page_url}', 'products')->name('loan');
    Route::get('loan/{page_url}', 'product_detail')->name('loan.single');
    Route::get('loan/{category_page_url?}/{page_url?}', 'product_detail')->name('loan.category');
    Route::get('enquiry/{page_url}','enquiry_now_form')->name('enquiry');
    Route::get('loans','product_listing')->name('product-all');
    Route::post('enquiry-form','enquiry_form_store')->name('enquiry-form.store');
    Route::post('contact-form','contact_form_store')->name('contact-form.store');
    Route::get('about-us','about_us')->name('about-us');
    Route::get('contact-us','contact_us')->name('contact-us');
    Route::get('apply-now','apply_now')->name('apply-now');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    //Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/admin', 'dashboard')->name('dashboard');
    Route::get('/dashboard', 'dashboard')->name('dashboard');

	Route::get('/logout', 'logout')->name('logout');

});

 Route::middleware('auth')->group(function () {

     //change Password
     Route::get('password_change','\App\Http\Controllers\admin\PasswordChangeController@index')->name('password_change');
     Route::Post('check-current-password','\App\Http\Controllers\admin\PasswordChangeController@check_current_password')->name('check-current-password');
     Route::Post('change-password-form','\App\Http\Controllers\admin\PasswordChangeController@change_password_form')->name('change-password-form');

    // Banner
    Route::resource('/admin/banner', '\App\Http\Controllers\admin\BannerController');
    Route::get('/admin/delete-banner', [BannerController::class, 'destroy'])->name('delete-banner');
    Route::post('banner-set-order', '\App\Http\Controllers\admin\BannerController@set_order');

    // Popular Product Categories
    Route::resource('/admin/popularproducts', '\App\Http\Controllers\admin\PopularProductController');
    Route::get('/admin/delete-popularproducts', [PopularProductController::class, 'destroy'])->name('delete-popular-product');
    Route::post('popular-product-set-order', '\App\Http\Controllers\admin\PopularProductController@set_order');
    Route::post('popular-product-set-home-1', '\App\Http\Controllers\admin\PopularProductController@set_home_1');
    Route::post('popular-product-set-home-2', '\App\Http\Controllers\admin\PopularProductController@set_home_2');

    // Category
    Route::resource('/admin/category', '\App\Http\Controllers\admin\CategoryController');
    Route::get('/admin/delete-category', [CategoryController::class, 'destroy'])->name('delete-category');
    Route::post('category-set-order', '\App\Http\Controllers\admin\CategoryController@category_set_order');
    Route::post('category-set-home-1', '\App\Http\Controllers\admin\CategoryController@set_home_1');
    Route::post('category-set-home-2', '\App\Http\Controllers\admin\CategoryController@set_home_2');

    // Products
    Route::resource('/admin/product', '\App\Http\Controllers\admin\ProductController');
    Route::get('/admin/delete-product', [ProductController::class, 'destroy'])->name('delete-product');
    Route::post('ckeditor/upload', [ProductController::class, 'upload'])->name('ckeditor.upload');
    Route::post('product-set-order', '\App\Http\Controllers\admin\ProductController@set_order');
    Route::post('product-set-home', '\App\Http\Controllers\admin\ProductController@set_home');

    // Enquiries
    Route::resource('/admin/enquiries', '\App\Http\Controllers\admin\EnquiryController');
    Route::get('/admin/delete-enquiries', [EnquiryController::class, 'destroy'])->name('delete-enquiries');

    // Contact Us
    Route::resource('/admin/contact-us', '\App\Http\Controllers\admin\ContactusController');
    Route::get('/admin/delete-contactus', [ContactusController::class, 'destroy'])->name('delete-contactus');

    //system
    Route::resource('/admin/system', '\App\Http\Controllers\admin\SystemController');
     
   //Testimonial
   Route::resource('/admin/testimonial', '\App\Http\Controllers\admin\TestimonialController');
   Route::get('/admin/delete-testimonial', [TestimonialController::class, 'destroy'])->name('delete-testimonial');
   
    //Userpermission
    Route::resource('/userpermission', '\App\Http\Controllers\admin\UserPermissionController');
    Route::get('delete_permission', [UserPermissionController::class, 'delete_permission'])->name('delete_permission');
    Route::get('destroyPermission', [UserPermissionController::class, 'destroyPermission'])->name('destroyPermission');

    //Admin User
    Route::resource('/adminuser', '\App\Http\Controllers\admin\Admin_userController');
    Route::get('/delete_admin', [Admin_userController::class, 'destroy'])->name('delete_admin');
    Route::post('check_mail', 'App\Http\Controllers\admin\Admin_userController@check_mail');

 });