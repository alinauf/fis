<?php

namespace App\Http\Livewire\Fish;

use App\SL\Collection\FishSL;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $service = new FishSL();
        $data = $service->indexSearch('name', $this->search);

        return view('livewire.fish.index', ['fishes' => $data]);
    }
}
