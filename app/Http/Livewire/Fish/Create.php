<?php

namespace App\Http\Livewire\Fish;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;


    public $name;
    public $description;
    public $scientific_name;
    public $fish_photo;



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
