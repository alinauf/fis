<?php

namespace App\Http\Livewire\Collection;

use App\Models\Collection;
use App\Models\CollectionVessel;
use App\Models\FishingVessel;
use Livewire\Component;

class Create extends Component
{
    public $formValidationStatus;
    public $collection;
    public $comments;
    public $location;

    public $fishingVessels;
    public $collectionVessels;

    protected $rules = [
        'location' => 'required',
    ];

    protected $messages =
        [
            'location.required' => 'Enter the location where the collection will be made',
        ];

    public function mount()
    {
        $this->collection = Collection::whereDate('created_at', now())->first();
        $this->fishingVessels = FishingVessel::all();
        $this->collectionVessels = CollectionVessel::all();

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function validateForm()
    {
        if ($this->validate()) {
            $this->formValidationStatus = true;
        } else {
            $this->formValidationStatus = false;
        }
    }

    public function render()
    {
        return view('livewire.collection.create');
    }
}
