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



Route::get('/login','App\Http\Controllers\Authenfication\LoginController@index')->name('login');
    Route::post('/authentification','App\Http\Controllers\Authenfication\LoginController@login')->name('Auth.connexion');
    Route::get('/forget-password','App\Http\Controllers\Authenfication\ForgetPasswordController@index')->name('Auth.forget');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/change-password','App\Http\Controllers\Authenfication\ChangePasswordController@index')->name('Auth.changepsw');
    Route::post('/change-password','App\Http\Controllers\Authenfication\ChangePasswordController@_updatePassword')->name('Auth.update_Password');

    //Tableau de bord
    Route::get('/panel','App\Http\Controllers\Dashboard\DashboardController@index')->name('panel');
    // Profile
    Route::post('/save-profile',[App\Http\Controllers\Admin\ProfileController::class, 'createProfile'])->name("save-profile");
    Route::get('/profile',[App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
});
