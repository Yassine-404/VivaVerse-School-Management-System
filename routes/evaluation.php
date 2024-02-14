<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvaluationController; // Assurez-vous d'importer le bon contrôleur

/************************ Crud Routes Start ******************************/
Route::group(['middleware'=>'auth'],function(){
        Route::group(['prefix'=>'evaluation','as'=>'evaluation.'],function(){ 
            Route::get('',[EvaluationController::class,'index'])->name('list'); 
            Route::get('create',[EvaluationController::class,'create'])->name('create'); 
            Route::post('store',[EvaluationController::class,'store'])->name('store'); 
            Route::get('edit/{id}',[EvaluationController::class,'edit'])->name('edit'); 
            Route::post('update/{id}',[EvaluationController::class,'update'])->name('update'); 
            Route::post('delete/{id}',[EvaluationController::class,'delete'])->name('delete'); 
            Route::get('/getModules/{niveauId}/{filliereId}', [EvaluationController::class,'getModules']);
            

        });
});
/************************ Crud Routes Ends ******************************/
