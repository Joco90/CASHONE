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
     return redirect('authentification/login');
 });



Route::get('authentification/login','Authenfication\LoginController@index')->name('login');
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
    Route::get('gestion-des-utilisateurs/liste-users','UtilisateurController@index')->name('users.liste');
    Route::get('gestion-des-utilisateurs/user-create','UtilisateurController@create')->name('users.create');
    Route::post('gestion-des-utilisateurs/user-save','UtilisateurController@save')->name('users.save');
    Route::get('/gestion-des-utilisateurs/del-user/{ref}','UtilisateurController@destroy')->name('users.del');
    Route::get('/gestion-des-utilisateurs/edit-user/{ref}','UtilisateurController@edit')->name('users.edit');
    Route::get('gestion-des-utilisateurs/details-user/{ref}','UtilisateurController@detail')->name('users.detail');
    Route::post('gestion-des-utilisateurs/update-user','UtilisateurController@update')->name('users.update');

    //Personel
    Route::get('/gestion-personel/liste','Personnel\PersonnelController@index')->name('personel.liste');
    Route::get('/gestion-personel/personnel-create','Personnel\PersonnelController@create')->name('personel.nouveau');
    Route::post('/gestion-personel/personnel-save','Personnel\PersonnelController@store')->name('personel.enregistrer');
    Route::get('/gestion-personel/personnel-modifier/{ref}','Personnel\PersonnelController@edit')->name('personel.modifier');
    Route::get('/gestion-personel/personnel-supprimer/{ref}','Personnel\PersonnelController@edit')->name('personel.modifier');
    Route::get('/gestion-personel/personnel-details/{ref}','Personnel\PersonnelController@show')->name('personel.details');
    Route::post('/gestion-personel/recherch-personnel','Personnel\PersonnelController@recherchPersonnel')->name('personel.recherch');
    Route::post('/gestion-personel/trouver-personnel','Personnel\PersonnelController@getPersonnel')->name('personel.getPersonnel');

    Route::get('/import-personel/impotation-personnel','Personnel\ImportpersonnelController@index')->name('importation.personel');
    Route::post('/import-personel/recherche-chaine','Personnel\ImportpersonnelController@rechercheChaine')->name('importpersonel.rechercheChaine');
    Route::post('/import-personel/trouver-chaine','Personnel\ImportpersonnelController@getChaine')->name('importpersonel.getChaine');
    Route::post('/import-personel/import-agent','Personnel\ImportpersonnelController@importPersonnel')->name('importpersonel.getAgent');

    // Type de contrat
    Route::get('/gestion-de-type-contrat/liste','TypeContratController@index')->name('typeContrat.liste');
    Route::post('/gestion-de-type-contrat/contrat-save','TypeContratController@store')->name('typeContrat.save');

    // Chaine de connexion de base de donnée
    Route::get('/gestion-de-connexion/cashonev4','ChaineConnexionController@index')->name('reprise.cashonev4');
    Route::post('/gestion-de-connexion/save-chaine','ChaineConnexionController@apiChaineSave')->name('reprise.save');
});
