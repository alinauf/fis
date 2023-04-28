<?php

namespace App\Http\Livewire\Fish\Variant;

use Livewire\Component;

class Create extends Component
{
    public $fish;
    public $name;
    public $price;

    public $formValidationStatus;


    public function mount($fish)
    {
        $this->fish = $fish;
    }

    // fish should be unique
    protected $rules = [
        'name' => 'required',
        'price' => 'required|numeric',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the variant',
            'price.required' => 'Enter a price for the variant',
        ];


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
        return view('livewire.fish.variant.create');
    }
}
