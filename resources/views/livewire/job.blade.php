
<div class="px-3 py-5 mb-3 shadow-sm hover:shadow-md rounded border-2 border-gray-300">

    <div class="flex justify-between">
        <h2 class="text-xl font-bold text-green-800">
            {{ $job->title }}
        </h2>

        <!-- bouton ajout favoris -->
        <button wire:click="addLike">
            <!--si pas encore liké-->
            @if($job->isLiked() === false )
                <i class="fa-solid fa-heart-circle-plus fa-2x text-green-400"></i>
            <!--si déjà liké-->
            @else
                <i class="fa-solid fa-heart-circle-minus fa-2x text-red-400"></i>
            @endif
        </button>

    </div>

    <p class="text-md text-gray-800">
        {{ $job->description }}
    </p>

    <div class="flex items-center align-baseline">
                <span class="h-2 w-2 bg-green-300 rounded-full mr-2">
                </span>


        <a href="{{ route('jobs.show', [$job->id]) }}" class="hover:text-green-400">
            Consulter la mission
        </a>
    </div>

    <span class="text-sm text-gray-600">
                Durée: {{ $job->time }} jours.
    </span>

</div>
