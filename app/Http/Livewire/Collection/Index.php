<?php

namespace App\Http\Livewire\Collection;

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
        $data =  \App\Models\Invoice
        ::where('id', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'desc')
        ->paginate(10);


        return view('livewire.collection.index' ,[
            'invoices'=> $data
        ] );

    }



}
