<?php

namespace App\Http\Livewire\CollectionVessel;

use Livewire\Component;

class Edit extends Component
{


    public $name;
    public $collectionVessel;

    public $contact_person;

    public $email;
    public $phone;
    public $description;
    public $location;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required|unique:collection_vessels,name',
        'contact_person' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the collection vessel',
            'contact_person.required' => 'Enter a contact person',
            'email.required' => 'Enter an email address',
            'phone.required' => 'Enter a phone number',
        ];

    public function mount($collectionVessel)
    {
        $this->collectionVessel = $collectionVessel;
        $this->name = $collectionVessel->name;
        $this->contact_person = $collectionVessel->contact_person;
        $this->email = $collectionVessel->email;
        $this->phone = $collectionVessel->phone;
        $this->description = $collectionVessel->description;
        $this->location = $collectionVessel->location;
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
        return view('livewire.collection-vessel.edit');
    }
}
