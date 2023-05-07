<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Inventory;
use App\SL\Collection\FishSL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {
        $search = $this->search;

        $data = Inventory::where(function ($query) use ($search) {
            $query->whereHas('invoice', function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%");
            });
        })->orWhere(function ($query) use ($search) {
            $query->whereHas('collection', function ($q) use ($search) {
                $q->where('collection_no', 'like', "%{$search}%");
            });

        })
            ->orderBy('id', 'desc')
            ->paginate(10);


        return view('livewire.inventory.index', [
            'inventories' => $data
        ]);

    }


}
