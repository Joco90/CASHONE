<?php

use App\Http\Controllers\CodeOperation\NatureComptableController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'auth'], function (){

    Route::get('/nature-comptable', [NatureComptableController::class,'newNatureComptView'])->name('nature-comptable');
    Route::post('/nature-comptable', [NatureComptableController::class,'newNatureCompt'])->name('nature-comptable');
    Route::post('/edit-nature-comptable', [NatureComptableController::class,'editNatureCompt'])->name('edit-nature-comptable');
    
});