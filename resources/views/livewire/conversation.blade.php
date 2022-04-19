<div class="my-5">
    <div class="max-w-1/2 w-1/2 mx-auto">
        <h1 class="text-3xl text-green-500 mb-5">Mission : {{ $conversation->job->title }}</h1>
        @foreach($conversation->messages as $message)
            <div class="rounded-lg px-3 py-3 mb-2 font-medium
    {{ $message->user->id === auth()->user()->id  ? 'bg-green-500 text-white mr-auto max-w-1/2 w-1/2' : 'ml-auto bg-gray-300 text-gray-700 max-w-1/2 w-1/2'}}">
                <p class="font-light">
                    {{ $message->user->id === auth()->user()->id  ?
                        'Vous avez dit : ' : $message->user->firstname. ' ' .$message->user->lastname. ' a dit :'}}</p>
                <p>{{ $message->content }}</p>
                <span class="font-light mt-2">
                    {{ $message->created_at->diffForHumans() }}
                </span>
            </div>
        @endforeach
        <p class="mt-5">Appuyer sur entrer ou cliquer sur le bouton pour envoyer votre message</p>
        <textarea wire:model="message" wire:keydown.enter.prevent="sendMessage" class="border rounded px-3 py-4 mt-3 my-2 shadow-md w-full"></textarea>

        <button class="btn btn-md btn-success px-3 py-2 mb-5"  wire:click.prevent="sendMessage">
            Envoyer
        </button>
    </div>
</div>
