<?php

use App\UsersModel;

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

Route::get('/', 'FrontEndController@index');
Route::get('/about', 'FrontEndController@about');
Route::get('/faq', 'FrontEndController@faq');
Route::get('/contact', 'FrontEndController@contact');
Route::get('/listall', 'FrontEndController@all');
Route::get('/listfeatured', 'FrontEndController@featured');
Route::get('/services/{category}', 'FrontEndController@category');
Route::get('/services/order/{id}', 'FrontEndController@order');
Route::post('/subscribe', 'FrontEndController@subscribe');
Route::post('/profile/email', 'FrontEndController@usermail');
Route::post('/contact/email', 'FrontEndController@contactmail')->name('front.contact.submit');
Route::get('/profile/{id}/{name}', 'FrontEndController@viewprofile');
Route::get('product/{id}/{title}', 'FrontEndController@productdetails');
Route::get('product/view/click/{id}', 'FrontEndController@click')->name('product.click');
Route::get('category/{slug}', 'FrontEndController@catproduct');
Route::get('loadcategory/{slug}/{page}', 'FrontEndController@loadcatproduct');
Route::get('search/{search}', 'FrontEndController@searchproduct');
Route::get('finalize', 'FrontEndController@finalize');

Route::post('user/review', 'FrontEndController@reviewsubmit')->name('review.submit');

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.login');

Route::get('/login', function () {
    return view('admin.login');
});

Route::get('admin/themecolor', function () {
    return view('admin.themecolor');
});

Auth::routes();

Route::get('/admin/dashboard', 'HomeController@index');
Route::post('/admin/updatecolor', 'SettingsController@themecolor');

Route::post('admin/settings/title', 'SettingsController@title');
Route::post('admin/settings/payment', 'SettingsController@payment');
Route::post('admin/settings/about', 'SettingsController@about');
Route::post('admin/settings/address', 'SettingsController@address');
Route::post('admin/settings/footer', 'SettingsController@footer');
Route::post('admin/settings/logo', 'SettingsController@logo');
Route::post('admin/settings/favicon', 'SettingsController@favicon');
Route::post('admin/settings/background', 'SettingsController@background');
Route::resource('/admin/settings', 'SettingsController');

Route::resource('/admin/sliders', 'SliderController');

Route::get('/admin/customers/email/{id}', 'CustomerController@email');
Route::post('/admin/customers/emailsend', 'CustomerController@sendemail');
Route::resource('/admin/customers', 'CustomerController');

Route::get('admin/language', 'LanguageController@lang')->name('admin-lang-index');
Route::post('admin/language', 'LanguageController@langup')->name('admin-lang-update');

Route::post('/admin/testimonial/titles', 'TestimonialController@titles');
Route::resource('/admin/testimonial', 'TestimonialController');
Route::post('the/genius/ocean/2441139', 'FrontEndController@subscription');


Route::resource('/admin/services', 'ServiceController');
Route::get('/admin/categories/delete/{id}', 'CategoryController@delete');
Route::resource('/admin/categories', 'CategoryController');

Route::get('/subcats/{id}', 'SubCategoryController@subcats');
Route::get('/childcats/{id}', 'ChildCategoryController@childcats');

Route::resource('/admin/subcategory', 'SubCategoryController');
Route::resource('/admin/childcategory', 'ChildCategoryController');

Route::post('admin/pagesettings/about', 'PageSettingsController@about');
Route::post('admin/pagesettings/faq', 'PageSettingsController@faq');
Route::post('admin/pagesettings/contact', 'PageSettingsController@contact');
Route::resource('/admin/pagesettings', 'PageSettingsController');

Route::get('admin/products/status/{id}/{status}', 'ProductController@status');
Route::resource('/admin/products', 'ProductController');
Route::get('admin/ads/status/{id}/{status}', 'AdvertiseController@status');

Route::resource('/admin/ads', 'AdvertiseController');
Route::resource('/admin/social', 'SocialLinkController');
Route::resource('/admin/tools', 'SeoToolsController');
Route::get('admin/subscribers/download', 'SubscriberController@download');

Route::resource('/admin/subscribers', 'SubscriberController');
Route::post('/admin/adminpassword/change/{id}', 'AdminProfileController@changepass');
Route::get('/admin/adminpassword', 'AdminProfileController@password');
Route::resource('/admin/adminprofile', 'AdminProfileController');
