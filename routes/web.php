<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
  JobController,
};

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
    return view('welcome');
});

// route de la liste des jobs
Route::get('/jobs', [\App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');


// routes d'authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
