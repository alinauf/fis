<?php

namespace App\Http\Livewire\Vendor;

use App\SL\Collection\FishingVesselSL;
use App\SL\Collection\VendorSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        $service = new VendorSL();
        $data = $service->indexSearch('name', $this->search);

        return view('livewire.vendor.index', ['vendors' => $data]);
    }


}
