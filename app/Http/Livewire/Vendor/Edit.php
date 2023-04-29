<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $phone;
    public $email;
    public $vendor;


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

    public function mount($vendor)
    {
        $this->formValidationStatus = false;

        $this->name = $vendor->name;
        $this->phone = $vendor->phone;
        $this->email = $vendor->email;
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
        return view('livewire.vendor.edit');
    }
}
