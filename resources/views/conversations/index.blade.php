@extends('layouts.base')

@section('content')
    <h1 class="text-3xl text-green-500 mb-5">Vos conversations</h2>
        @foreach($conversations as $conversation)
            <a href="{{ route('conversation.show', $conversation->id) }}" class="focus:outline-none">
                <div class="flex items-center justify-between px-3 py-10 mb-3 shadow-md rounded mb-3 border-2 hover:border-green-300 cursor-pointer">
                    <p class="font-semibold">{{ Illuminate\Support\Str::limit($conversation->messages->last()->content, 50) }}
                    </p>

                    <p class="font-thin text-gray-500">envoyé par
                        <strong>{{ auth()->user()->id === $conversation->messages->last()->user->id ? 'vous'
                            : $conversation->messages->last()->user->firstname.' '.$conversation->messages->last()->user->lastname }}
                        </strong>

                        {{ $conversation->messages->last()->created_at->diffForHumans() }}
                    </p>

                    @if($conversation->messages->last()->user->id !== auth()->user()->id)
                        <div class="flex flex-column justify-content-center align-items-center">
                            <i class="fa-solid fa-comment-dots fa-3x text-green-600 mb-2"></i>
                            <span>
                                Nouveau(x) Message(s) de :
                                <span class="font-bold">
                                    {{ $conversation->messages->last()->user->firstname }} {{ $conversation->messages->last()->user->lastname }}
                                </span>
                            </span>
                        </div>
                    @else
                        <div class="flex flex-column justify-content-center align-items-center">
                            <i class="fa-solid fa-comment-slash fa-3x text-red-600 mb-2"></i>
                            <span>Pas de nouveaux messages</span>
                        </div>
                    @endif

                </div>
            </a>
    @endforeach
@endsection
