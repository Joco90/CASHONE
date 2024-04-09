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
     return redirect('Auth/login');
 });



Route::get('Auth/login','Authenfication\LoginController@index')->name('login');
    Route::post('/authentification','Authenfication\LoginController@login')->name('Auth.connexion');
    Route::get('/forget-password','Authenfication\ForgetPasswordController@index')->name('Auth.forget');

Route::group(['middleware' => 'auth'], function (){

    Route::get('/change-password','Authenfication\ChangePasswordController@index')->name('Auth.changepsw');
    Route::post('/change-password','Authenfication\ChangePasswordController@_updatePassword')->name('Auth.update_Password');
    Route::post('/logout','Authenfication\LoginController@logout')->name('Auth.logout');

    //Tableau de bord
    Route::get('/cashone/panel','Dashboard\DashboardController@index')->name('panel');
    // Profile
    Route::post('/save-profile','Admin\ProfileController@createProfile')->name("save-profile");
    Route::get('/profile','Admin\ProfileController@index')->name('profile');
    // Api de modification
    Route::post('/edit-profile','Admin\ProfileController@update')->name('editProfile');
    Route::post('/del-profile','Admin\ProfileController@destroy')->name('delProfile');

    // Users
    Route::get('/liste-users','UtilisateurController@index')->name('users.liste');
    Route::get('/user-create','UtilisateurController@create')->name('users.create');
    Route::post('/user-save','UtilisateurController@save')->name('users.save');
    Route::get('/del-user/{ref}','UtilisateurController@destroy')->name('users.del');
    Route::get('gestion-des-utilisateurs/edit-user/{ref}','UtilisateurController@edit')->name('users.edit');
    Route::get('gestion-des-utilisateurs/details-user/{ref}','UtilisateurController@detail')->name('users.detail');
    Route::post('gestion-des-utilisateurs/update-user','UtilisateurController@update')->name('users.update');
});
