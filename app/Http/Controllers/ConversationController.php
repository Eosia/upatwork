<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Conversation,
    Message,
    Proposal
};

class ConversationController extends Controller
{
    //

    public function index()
    {
        $conversations = auth()->user()->conversations()->latest()->get();

        return view('conversations.index', [
            'conversations' => $conversations
        ]);
        //dd($conversations);
    }

    public function show(Conversation $conversation)
    {
        //abort_if($conversation->from !== auth()->user()->id && $conversation->to !== auth()->user()->id , 403 );

        return view('conversations.show', [
            'conversation' => $conversation,
        ]);
    }
}
