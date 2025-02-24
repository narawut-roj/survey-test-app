<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [SurveyController::class, 'start'])->name('survey.start');
Route::get('/start', [SurveyController::class, 'start'])->name('survey.start');
Route::get('/survey', [SurveyController::class, 'index'])->name('survey.index');
Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');

Route::get('/thankyou', function () {
    return view('/thankyou');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
