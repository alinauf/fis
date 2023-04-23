<?php

namespace App\Http\Livewire\FishingVessel;

use Livewire\Component;

class Edit extends Component
{

    public $fishingVessel;

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
        'name' => 'required',
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


    public function mount($fishingVessel)
    {
        $this->formValidationStatus = false;
        $this->name = $fishingVessel->name;
        $this->contact_person = $fishingVessel->contact_person;
        $this->phone = $fishingVessel->phone;
        $this->email = $fishingVessel->email;
        $this->bank_name = $fishingVessel->bank_name;
        $this->account_name = $fishingVessel->account_name;
        $this->account_number = $fishingVessel->account_number;

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
        return view('livewire.fishing-vessel.edit');
    }
}
