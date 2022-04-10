@extends('layouts.base')

@section('content')

    <h1 class="text-3xl text-green-500 mb-3">
        {{ $job->title }}
    </h1>

        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">

            <h2 class="text-xl font-bold text-green-800">

            </h2>

            <p class="text-md text-gray-800">
                {{ $job->description }}
            </p>

            <div class="flex items-center align-baseline">
                Statut : <span class="h-2 w-2 bg-green-300 rounded-full mx-3"></span>

            </div>

            <span class="text-sm text-gray-600">
                Durée: {{ $job->time }} jours.
            </span>

        </div>

    <a href="{{ route('jobs.index') }}" class="btn-lg bg-green-600 text-white px-2 py-1 rounded">Retour à l'accueil</a>
@endsection
