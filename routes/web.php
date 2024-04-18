<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class,'main'])->middleware('auth');
    Route::get('/dashboard',[MainController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('applications',ApplicationController::class);
    Route::get('application/{application}/answer',[AnswerController::class, 'answer'])->name('answer.answer');
    Route::post('application/{application}/answer',[AnswerController::class, 'answerStore'])->name('answer.store');
});


require __DIR__.'/auth.php';
