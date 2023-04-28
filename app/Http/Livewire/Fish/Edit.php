<?php

namespace App\Http\Livewire\Fish;

use Livewire\Component;

class Edit extends Component
{

    public $fish;
    public $name;
    public $description;
    public $scientific_name;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required|unique:fish,name',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the fish',
        ];

    public function mount($fish)
    {
        $this->formValidationStatus = false;
        $this->name = $fish->name;
        $this->description = $fish->description;
        $this->scientific_name = $fish->scientific_name;

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
        return view('livewire.fish.edit');
    }
}
