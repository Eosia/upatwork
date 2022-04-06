<div class="inline-block my-auto ml-10 mr-5">
    {{-- Do your work, then step back. --}}
    <input class="bg-gray-100 text-gray-900 border-2 px-3 py-2 w-64 rounded-full focus:outline-none placeholder-gray-500"
           placeholder="&#x1F50D; Rechercher un job ..."
           wire:model="query" />

    <div class="absolute bg-gray-300 text-md w-64 mt-1 border rounded-full">

        @if(strlen($this->query)>2)
            <div class="px-3 py-2">
                @if(count($jobs)>0)
                    @foreach($jobs as $job)
                        <p class="text-green-600">
                            <i class="fa-solid fa-check mr-1"></i> {{ $job->title }}
                        </p>
                    @endforeach

                @else
                    <span class="text-red-600">
                        <i class="fa-solid fa-x mr-1"></i>
                        0 Résultats pour "{{ $query }}"
                </span>
                @endif
            </div>

        @endif

    </div>

</div>

