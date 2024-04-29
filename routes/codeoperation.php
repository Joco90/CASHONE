<?php

use App\Http\Controllers\CodeOperation\CorrespondNatureController;
use App\Http\Controllers\CodeOperation\NatureComptableController;
use App\Http\Controllers\CodeOperation\TypeContratController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'auth'], function (){

    Route::get('/nature-comptable', [NatureComptableController::class,'newNatureComptView'])->name('nature-comptable');
    Route::post('/nature-comptable', [NatureComptableController::class,'newNatureCompt'])->name('nature-comptable');
    Route::post('/edit-nature-comptable', [NatureComptableController::class,'editNatureCompt'])->name('edit-nature-comptable');

    Route::get('/liste-correspondance', [CorrespondNatureController::class,'listeCorrespondance'])->name('liste-correspondance');
    Route::get('/nouvelle-correspondance', [CorrespondNatureController::class,'viewNouveau'])->name('nouvelle-correspondance');
    Route::post('/recherch-code-compta', [CorrespondNatureController::class,'recherchCode'])->name('recherch-code-compta');
    Route::post('/get-code-compta', [CorrespondNatureController::class,'getCodeInfo'])->name('get-code-compta');
    Route::post('/save-correspondance-compta', [CorrespondNatureController::class,'saveCorrespond'])->name('save-correspondance-compta');

    Route::get('/type-contrat',[TypeContratController::class,'index'])->name('typeContrat.liste');





});
