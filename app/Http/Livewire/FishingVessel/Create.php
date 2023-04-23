<?php

namespace App\Http\Livewire\FishingVessel;

use Livewire\Component;

class Create extends Component
{


    public $name;
    public $contact_person;

    public $phone;
    public $email;

    public $bank_name;
    public $account_name;
    public $account_number;


    public $formValidationStatus;

    // fishing vessel should be unique
    protected $rules = [
        'name' => 'required|unique:fishing_vessels,name',
        'contact_person' => 'required',
        'phone' => 'numeric|nullable',
        'email' => 'email|nullable',

        'bank_name' => 'nullable',
        'account_name' => 'nullable',
        'account_number' => 'numeric|nullable',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the fish',
            'contact_person.required' => 'Enter a contact person for the fishing vessel',
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
        return view('livewire.fishing-vessel.create');
    }
}
