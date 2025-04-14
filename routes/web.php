<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoctelController;
use App\Http\Controllers\RenderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[RenderController::class, 'index'])->name('coctel.index');
    Route::get('/dashboard/section',[RenderController::class, 'renderData' ])->name('render.data');
});

Route::middleware('auth')->group(function(){
    Route::get('/confirmacion',[CoctelController::class , 'index'])->name('confirmacion.index');
});
// Route::get('/dashboard',[CoctelController::class, 'getAll'])->name('dashboard');

// // Route::get('/dashboard', function () {
// //     return view('dashboard');
// // }

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
