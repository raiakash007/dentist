<?php

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

Route::get('/', function () {
    return view('welcome');
});


//Clear config cache:
 Route::get('/config-cache', function() {
     $exitCode = Artisan::call('cache:clear');
    //  return 'Application cache cleared';
     $exitCode = Artisan::call('config:cache');
    //  return 'Config cache cleared';
      $exitCode = Artisan::call('view:clear');
    //  return 'View cache cleared';
       Artisan::call('cache:clear');
    dd("Cache Clear All");
 }); 
 
 
Route::get('users','Api/ApiController@GetAllUsers')->name('api_get_all_users');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('sendmail', 'TestController@sendmail')->name('admin.home');



// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~Admin Route ~~~~~~~~~~~~~~~~~~~~~~~~~

Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::post('/admin/delete_record', 'AdminController@delete_record')->name('admin/delete_record');
Route::post('/admin/retrieve', 'AdminController@retrieve')->name('admin/retrieve');

Route::get('admin/doctor', 'AdminController@doctor')->name('admin.doctor');
Route::get('admin/doctor_list', 'AdminController@doctor_list')->name('admin.doctor_list');

Route::get('admin/sub-admin', 'AdminController@sub_admin')->name('admin.sub-admin');
Route::post('admin/add_admin_subadmin', 'AdminController@add_admin_subadmin')->name('admin.add_admin_subadmin');
Route::post('admin/edit_admin_subadmin', 'AdminController@edit_admin_subadmin')->name('admin.edit_admin_subadmin');
Route::get('admin/sub_admin_list', 'AdminController@sub_admin_list')->name('admin.sub_admin_list');


Route::get('admin/permission', 'AdminController@permission')->name('admin.permission');
Route::post('admin/add_permission', 'AdminController@add_permission')->name('admin.add_permission');
Route::post('admin/edit_permission', 'AdminController@edit_permission')->name('admin.edit_permission');
Route::get('admin/permission_list', 'AdminController@permission_list')->name('admin.permission_list');
