<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;

Route:: get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

        Route::get('/home-question-respon', function () {
    return view('home-question-respon');
})->name('home-question-respon');

Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::resource('pelanggan',PelangganController::class);
Route::resource('user', UserController::class);

