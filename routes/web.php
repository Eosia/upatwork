<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    JobController,
    PanelController,
    ProposalController,
    ConversationController
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

    //route d'acceptation d'une candidature
    Route::get('confirmProposal/{proposal}', [ProposalController::class, 'confirm'])->name('confirm.proposal');

    //route qui retourne la liste des conversatins d'un user
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    //route de la vue d'une conversation
    Route::get('/conversation/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');

});

// routes proposal pour ne pas permettre plus d'une candidature à une annonce
Route::group(['middleware' => ['auth:sanctum', 'proposal']], function () {
    Route::post('/submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
});

// redirections

//index des jobs vers page home
Route::permanentRedirect('/jobs', '/');

//dashboard vers panel
Route::permanentRedirect('/dashboard', '/panel');
