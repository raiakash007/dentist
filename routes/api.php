<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group([
//     'prefix' => 'auth'
// ], function(){
//     Route::post('signin', 'DoctorController@signin');
//     Route::post('signup', 'DoctorController@signup');

//     Route::group([
//         'middleware' => 'auth.api'
//     ], function(){
//         Route::get('logout', 'DoctorController@logout');
//     });
// });


Route::post('login', 'AuthController@login');
Route::post('user_register', 'AuthController@user_register');
Route::post('doctor_register_login', 'AuthController@doctor_register_login');
Route::post('forgot_password', 'AuthController@forgot_password');
Route::post('set_new_password', 'AuthController@set_new_password');
Route::post('doctor_code', 'DoctorController@doctor_code');