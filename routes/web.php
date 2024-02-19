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

// Route::get('/', function () {
//     return view('Auth.login');
// });

Route::get('/','App\Http\Controllers\Authenfication\LoginController@index')->name('login');

Route::prefix('Auth')->group(function () {
    Route::post('/authentification','App\Http\Controllers\Authenfication\LoginController@login')->name('Auth.connexion');
    Route::get('/forget-password','App\Http\Controllers\Authenfication\ForgetPasswordController@index')->name('Auth.forget');
});

Route::group(['middleware' => 'auth'], function (){
    Route::prefix('Auth')->group(function () {
    Route::get('/change-password','App\Http\Controllers\Authenfication\ChangePasswordController@index')->name('Auth.changepsw');
    });

    Route::prefix('Dashboard')->group(function () {
    Route::get('/panel','App\Http\Controllers\Dashboard\DashboardController@index')->name('panel');

    });
});
