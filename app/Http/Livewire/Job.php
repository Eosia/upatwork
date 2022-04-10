<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Job extends Component
{

    public $job;

    public function addLike()
    {

        if(auth()->check())
        {

            auth()->user()->likes()->toggle($this->job->id);
            //$this->emit('flash-message', 'Favoris ajouté', 'success');

            /*
            if(auth()->user()->likes()->toggle($this->job->id)) {
                $this->emit('flash-message', 'Favoris ajouté', 'success');
                return;
            }
            else if(! auth()->user()->likes()->toggle($this->job->id))
            {
                $this->emit('flash-message', 'Favoris retiré', 'success');
                return;
            }
            */

        }

        else {
            $this->emit('flash-message', 'Merci de vous connecter pour ajouter une job dans vos favoris.', 'error');
            return;
        }

    }

    public function render()
    {
        return view('livewire.job');
    }
}
