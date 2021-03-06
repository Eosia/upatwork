@extends('layouts.base')

@section('content')

    <h1 class="text-3xl text-green-500 mb-3">
        {{ $job->title }}
    </h1>

        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">

            <p class="text-md text-gray-800">
                Contenu: <br>
                {{ $job->description }}
            </p>

            <div class="flex items-center align-baseline my-3">
                Statut : <span class="h-2 w-2 bg-green-300 rounded-full mx-3"></span>

            </div>

            <div class="flex items-center align-baseline mb-3">
                <i class="fa-solid fa-user mr-3"></i> {{ $job->user->firstname }} {{ $job->user->lastname }}
            </div>

            <span class="text-sm text-gray-600">
                Durée: {{ $job->time }} jours.
            </span>

        </div>

    <!--formulaire de candidature-->
    <section class="my-10" x-data="{open: false}">
        <a href="#" class="bg-green-700 text-white px-3 py-2 rounded text-decoration-none" @click="open = !open">
            Cliquez ici pour postuler
        </a>

        <form class="mt-10" x-show="open" x-cloak method="POST" action="{{ route('proposals.store', $job) }}">
            @csrf
            <textarea class="p-3 font-thin w-100 min-h-min" name="content">
            </textarea>

            <button type="submit" class="block bg-green-700 text-white px-3 py-2 my-5 rounded">
                Soumettre ma candidature
            </button>
        </form>

    </section>


    <!-- boutons de retour-->
    <a href="{{ route('jobs.index') }}" class="btn-lg bg-green-600 text-white px-2 py-1 rounded text-decoration-none">Retour à l'accueil</a>

    @if($job->isLiked() === true )
    <a href="{{ route('panel.index') }}" class="btn-lg bg-blue-600 text-white px-2 py-1 rounded ml-5 text-decoration-none">Retour aux favoris</a>
    @endif


@endsection
