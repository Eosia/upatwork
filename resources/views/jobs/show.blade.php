@extends('layouts.base')

@section('content')

    <h1 class="text-3xl text-green-500 mb-3">
        {{ $job->title }}
    </h1>

        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">

            <p class="text-md text-gray-800">
                {{ $job->description }}
            </p>

            <div class="flex items-center align-baseline my-3">
                Statut : <span class="h-2 w-2 bg-green-300 rounded-full mx-3"></span>

            </div>

            <div class="flex items-center align-baseline mb-3">
                <i class="fa-solid fa-user mr-3"></i> {{ $job->user->name }}

            </div>

            <span class="text-sm text-gray-600">
                Durée: {{ $job->time }} jours.
            </span>

        </div>

    <!--formulaire de candidature-->
    <section class="my-10" x-data="{open: false}">
        <a href="#" class="bg-green-700 text-white px-3 py-2 rounded" @click="open = !open">
            Cliquez ici pour postuler
        </a>

        <form class="mt-10" action="" x-show="open" x-cloak>
            <textarea id="candidature" class="p-3 font-thin">
            </textarea>

            <button type="submit" class="block bg-green-700 text-white px-3 py-2 my-5 rounded">
                Soumettre ma candidature
            </button>
        </form>

    </section>


    <!-- boutons de retour-->
    <a href="{{ route('jobs.index') }}" class="btn-lg bg-green-600 text-white px-2 py-1 rounded">Retour à l'accueil</a>

    @if($job->isLiked() === true )
    <a href="{{ route('panel.index') }}" class="btn-lg bg-blue-600 text-white px-2 py-1 rounded ml-5">Retour aux favoris</a>
    @endif


@endsection
