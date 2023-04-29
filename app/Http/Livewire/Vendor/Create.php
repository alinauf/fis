<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;

class Create extends Component
{
    public $name;
    public $phone;
    public $email;

    public $formValidationStatus;

    protected $rules = [
        'name' => 'required|unique:vendors,name',
        'phone' => 'numeric|required',
        'email' => 'email|nullable',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the fish',
            'phone.required' => 'Enter a phone number for the vendor',
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
        return view('livewire.vendor.create');
    }
}
