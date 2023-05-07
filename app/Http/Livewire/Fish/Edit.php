<?php

namespace App\Http\Livewire\Fish;

use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $fish;
    public $name;
    public $description;
    public $scientific_name;

    public $formValidationStatus;

    public $fish_photo;

    protected $rules = [
        'name' => 'required',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the fish',
        ];

    public function mount($fish)
    {
//        dd($fish->getFirstMedia('Fish Image'));
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
