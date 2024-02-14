<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController; // Assurez-vous d'importer le bon contrôleur

/************************ Crud Routes Start ******************************/
Route::group(['middleware'=>'auth'],function(){
        Route::group(['prefix'=>'etudiant','as'=>'etudiant.'],function(){ 
            Route::get('list',[EtudiantController::class,'index'])->name('list'); 
            Route::get('create',[EtudiantController::class,'create'])->name('create'); 
            Route::post('store',[EtudiantController::class,'store'])->name('store'); 
            Route::get('edit/{id}',[EtudiantController::class,'edit'])->name('edit'); 
            Route::post('update/{id}',[EtudiantController::class,'update'])->name('update'); 
            Route::post('delete/{id}',[EtudiantController::class,'delete'])->name('delete'); 
        });
});
/************************ Crud Routes Ends ******************************/
