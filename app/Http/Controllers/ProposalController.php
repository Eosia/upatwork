<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Job,
    Proposal,
    CoverLetter,
    User
};

class ProposalController extends Controller
{
    //
    /*ben ca
    public function store(Request $request, Job $job)
    {
        return view('proposals.store', compact('job'));
    }
    */
    public function store(Request $request, Job $job)
    {
        $jobs = Job::all();
        $users = User::all();
        $coverLetters = CoverLetter::all();

        $proposal = Proposal::create([
            'job_id' => $job->id,
            'validated'=>false
        ]);

        CoverLetter::create([
            'proposal_id' => $proposal->id,
            'content' => $request->input('content')
        ]);

        $success = "Votre candidature a bien été envoyée !";

        return redirect()->route('panel.index')->withSuccess($success);
    }





}
