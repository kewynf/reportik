<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return ["message" => "Hello World"];
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ExamController::class)
        ->name('exam.')
        ->prefix('exam')
        ->group(function () {
            Route::get('/{exam}', 'renderExam')->name('render');
            Route::get('/{exam}/discord/create', 'createDiscordChannel')->name('discord.create');
            Route::get('/{exam}/start', 'start')->name('start');
            Route::get('/{exam}/end', 'end')->name('end');
            Route::get('/{exam}/during/{step}', 'during')->name('during');
            Route::get('/{exam}/during/{step}/next', 'nextStep')->name('nextStep');
            Route::get('/{exam}/during/{step}/previous', 'previousStep')->name('previousStep');
        });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
