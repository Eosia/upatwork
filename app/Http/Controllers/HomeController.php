<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
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

        return view('home.index', [
            'jobs' => $jobs,
        ]);

    }
}
