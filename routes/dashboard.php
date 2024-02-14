<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::group(['middleware'=>'auth'],function(){
        Route::group(['prefix'=>'dashboards','as'=>'dashboard.'],function(){
            Route::get('etudiant',[DashboardController::class,'Etudiant'])->name('etudiant');
            Route::get('enseignant',[DashboardController::class,'Enseignant'])->name('enseignant');
            Route::get('agent-scolarite',[DashboardController::class,'agentScolarite'])->name('agentscolarite');
            Route::get('agent-pedagogique',[DashboardController::class,'agentPedagogique'])->name('agentpedagogique');
            //Route::get('demo-ten',[DashboardController::class,'demoTen'])->name('demo_ten');
        });
});