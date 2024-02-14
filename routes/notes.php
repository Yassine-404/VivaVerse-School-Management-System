<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController; // Assurez-vous d'importer le bon contrôleur

/************************ Crud Routes Start ******************************/
Route::group(['middleware'=>'auth'],function(){
        Route::group(['prefix'=>'notes','as'=>'notes.'],function(){ 
            Route::get('', [NoteController::class, 'notesForm'])->name('notesForm');
            Route::post('notes', [NoteController::class, 'storeNotes'])->name('store');
        });
});
/************************ Crud Routes Ends ******************************/
