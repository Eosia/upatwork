<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
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
Route::get('/', [JobController::class, 'index'])->name('jobs.index');


// route de la liste des jobs
Route::resource('/', JobController::class)->except('index');

// route d'une annonce
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');


/*
Route::group(['middleware' => ['auth']], function () {
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
    Route::get('/home', [ProposalController::class, 'home'])->name('home');

    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversation/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');

    Route::get('/confirmProposal/{proposal}', [ConversationController::class, 'confirm'])->name('confirm.proposal');
});
*/

//Route::get('/home', function () {
//   return view('home');
//})->middleware('auth')->name('home');

// routes d'authentification

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    //route du dashboard utilisateur
    Route::get('/panel', [PanelController::class, 'index'])->name('panel.index');
    //Route::get('/panel', [ProposalController::class, 'home'])->name('home');

    Route::post('/submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
   //Route::post('/proposals/{jobId}', [ProposalController::class, 'submitStore'])->name('proposals.store');
});
