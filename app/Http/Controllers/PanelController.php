<?php

namespace App\Http\Controllers;

use App\Models\{
    Job,
    Proposal,
    CoverLetter,
    User
};
use Illuminate\Http\Request;

class PanelController extends Controller
{

    // Liste des jobs sur la page d'accueil
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::online()->latest()->get();
        $users = User::all();
        $proposals = Proposal::all();
        $coverLetters = CoverLetter::all();



        return view('panel.index', [
            'jobs' => $jobs,
            'proposals'=>$proposals,
            'coverLetters'=>$coverLetters,
            'users'=>$users,
        ]);
    }

   /*
    public function index()
    {
        $proposals = auth()->user()->proposals()->get();

        return view('panel.index', compact('proposals'));
    }
   */

}
