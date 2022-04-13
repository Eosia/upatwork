<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    JobController,
    PanelController,
    ProposalController
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


//Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');


// route de la liste des jobs
Route::resource('/jobs', JobController::class)->except('show');

// route d'une annonce
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');



// routes d'authentification
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    //route du dashboard utilisateur
    Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');
});

// routes proposal pour ne pas permettre plus d'une candidature à une annonce
Route::group(['middleware' => ['auth:sanctum', 'proposal']], function () {
    Route::post('/submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
   //Route::post('/proposals/{jobId}', [ProposalController::class, 'submitStore'])->name('proposals.store');
});

// redirections

//index des jobs vers page home
Route::permanentRedirect('/jobs', '/');

//dashboard vers panel
Route::permanentRedirect('/dashboard', '/panel');
