<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoctelController;
use App\Http\Controllers\RenderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//SECCION RENDER JQUERY - LARAVEL COMPONENT
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[RenderController::class, 'index'])->name('coctel.index');
    Route::get('/dashboard/section',[RenderController::class, 'renderData' ])->name('render.data');
});

//SECCION OPERACIONES CRUD 
Route::middleware('auth')->group(function(){
    
    Route::post('/confirmacion',[CoctelController::class , 'index'])->name('confirmacion.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
