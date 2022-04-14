@extends('layouts.base')

@section('content')
    <div class="mx-auto text-center">
        <h1>Bonjour {{ auth()->user()->name }} !</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="container-fluid mt-20">
        <div class="flex justify-content-evenly align-items-start flex-wrap">
            <!--mes favoris-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <h3 class="mb-5 mx-auto text-center">
                    Favoris ({{ auth()->user()->likes()->count() }})
                </h3>
                <div class="w-30">
                    @foreach(auth()->user()->likes as $like)
                        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-30 text-sm text-gray-700">
                            <div class="flex justify-between">
                                <h2 class="text-xl font-bold text-green-800">
                                    {{ $like->title }}
                                </h2>
                            </div>
                            <p class="text-md text-gray-800">
                                {{ $like->description }}
                            </p>
                            <div class="flex items-center align-baseline">
                                    <span class="h-2 w-2 bg-green-300 rounded-full mr-2">
                                    </span>
                                <a href="{{ route('jobs.show', [$like->id]) }}"
                                   class=" text-green-800 hover:text-green-400">
                                    Consulter la mission
                                </a>
                            </div>
                            <span class="text-sm text-gray-600">
                                    Durée: {{ $like->time }} jours.
                                </span>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--mes favoris/-->

            <!--mes candidatures-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <h3 class="mb-5 mx-auto text-center">
                    Candidatures ({{ auth()->user()->proposals->count() }})
                </h3>
                <div>
                    @foreach($proposals as $proposal)
                        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-30 text-sm text-gray-700">
                            <div class="flex justify-between">
                                <h2 class="text-xl font-bold text-green-800">
                                    {{ $proposal->job->title }}
                                </h2>
                            </div>
                            <p class="text-md text-gray-800">
                                Lettre de motivation :
                                <br>
                                {{ $proposal->coverLetter->content }}
                            </p>
                            <div class="flex items-center align-baseline">
                                    <span class="h-2 w-2 bg-green-300 rounded-full mr-2">
                                    </span>
                                <a href="{{ route('jobs.show', [$proposal->job->id]) }}"
                                   class=" text-green-800 hover:text-green-400">
                                    Consulter la mission
                                </a>
                            </div>
                            <span class="text-sm text-gray-600">
                                    Durée: {{ $proposal->job->time }} jours.
                        </span>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--mes candidatures/-->

            <!--mes annonces-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <h3 class="mb-5 mx-auto text-center">
                    Annonces ({{ auth()->user()->jobs()->count() }})
                </h3>
                <div class="w-30">
                    @foreach(auth()->user()->jobs as $job)
                        <div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-30 text-sm text-gray-700">
                            <div class="flex justify-between">
                                <h2 class="text-xl font-bold text-green-800">
                                    {{ $job->title }}
                                    <br>
                                    ({{ $job->proposals->count() }} @choice('proposition|propositions', $job->proposals))
                                </h2>
                            </div>
                            <p class="text-md text-gray-800">
                                {{ $job->description }} :
                            </p>
                            <div class="flex items-center align-baseline">
                                    <span class="h-2 w-2 bg-green-300 rounded-full mr-2">
                                    </span>
                                <a href="{{ route('jobs.show', [$job->id]) }}"
                                   class=" text-green-800 hover:text-green-400">
                                    Consulter la mission
                                </a>
                            </div>
                            <span class="text-sm text-gray-600">
                                    Durée: {{ $job->time }} jours.
                            </span>

                            <ul class="list-none ml-4">

                                @foreach($job->proposals as $proposal)
                                    <li class="mt-2">• "{{ $proposal->coverLetter->content }}" par
                                        <strong>
                                            {{ $proposal->user->name }}
                                        </strong>
                                    </li>
                                    @if ($job->proposal->validated)
                                        <span class="bg-white border border-green-500 text-xs p-1 my-2 inline-block text-green-500 rounded">Déjà validé</span>
                                    @else
                                        <a href="{{ route('confirm.proposal', [$proposal->id])}}" class="bg-green-500 text-xs py-2 px-2 mt-2 mb-3 inline-block text-white hover:bg-green-200 hover:text-green-500 duration-200 transition rounded">Valider la proposition</a>
                                    @endif
                                @endforeach
                            </ul>

                        </div>
                    @endforeach
                </div>
            </div>
            <!--mes annonces/-->


        </div>
    </section>


@endsection

