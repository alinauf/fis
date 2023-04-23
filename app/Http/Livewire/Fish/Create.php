<?php

namespace App\Http\Livewire\Fish;

use Livewire\Component;

class Create extends Component
{

    public $name;
    public $description;

    public $formValidationStatus;

    // fish should be unique
    protected $rules = [
        'name' => 'required|unique:fish,name',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the fish',
        ];

    public function mount()
    {
        $this->formValidationStatus = false;
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
        return view('livewire.fish.create');
    }
}
