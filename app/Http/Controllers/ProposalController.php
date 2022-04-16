<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Conversation,
    Message,
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

    public function confirm(Request $request)
    {
        $proposal = Proposal::findOrFail($request->proposal);

        $proposal->fill(['validated'=>1]);

        if($proposal ->isDirty())
        {

            $proposal->save();

            $conversation = Conversation::create([
                'from' => auth()->user()->id,
                'to' => $proposal->user->id,
                'job_id' =>$proposal->job_id
            ]);

            Message::create([
                'user_id' => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content' => 'Bonjour, j\'ai validé votre candidature'
            ]);

            return redirect()->route('panel.index');

        }


    }

    public function index()
    {
        $proposals = auth()->user()->proposals()->get();

        return view('panel.index', compact('proposals'));
    }

}
