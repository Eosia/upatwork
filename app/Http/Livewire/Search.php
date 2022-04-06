<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class Search extends Component
{


    public String $query = '' ;
    public $jobs = [];

    public function updatedQuery()
    {
        if (strlen($this->query) > 3 ) {
            $words = '%' . $this->query . '%';

            $this->jobs = Job::where('title', 'like', $words)
                ->orWhere('description', 'like', $words)
                ->get();
        }

    }



    public function render()
    {
        return view('livewire.search');
    }
}
