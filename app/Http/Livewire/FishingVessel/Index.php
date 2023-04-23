<?php

namespace App\Http\Livewire\FishingVessel;

use App\SL\Collection\FishingVesselSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $service = new FishingVesselSL();
        $data = $service->indexSearch('name', $this->search);

        return view('livewire.fishing-vessel.index', ['fishingVessels' => $data]);
    }
}
