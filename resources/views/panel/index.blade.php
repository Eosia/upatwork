@extends('layouts.base')

@section('content')
    <div class="mx-auto text-center">
        <h1>Bonjour {{ auth()->user()->name }} !</h1>
    </div>

    <section class="container-fluid mt-20">
        <div class="flex justify-content-evenly align-items-start flex-wrap">
            <!--mes favoris-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                <h3 class="mb-5">
                    Vos favoris ({{ auth()->user()->likes()->count() }})
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
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3">
                <h3 class="mb-5">
                    Vos candidatures ({{ auth()->user()->proposals->count() }})
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
                                Lettre de motivation : {{ $proposal->content }}
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

        </div>
    </section>


@endsection

