<?php

namespace App\Http\Livewire\FishingVessel;

use \App\Models\Bank;
use \App\Models\Vendor;

use Livewire\Component;

class Create extends Component
{
    public $name;
    public $vendor_id;

    public $banks;
    public $vendors;

    public $bank_id;
    public $account_name;
    public $account_number;

    public $formValidationStatus;

    // fishing vessel should be unique
    protected $rules = [
        'name' => 'required|unique:fishing_vessels,name',
        'vendor_id' => 'required',

        'bank_id' => 'required',
        'account_name' => 'required',
        'account_number' => 'numeric|required',
    ];

    protected $messages =
        [
            'name.required' => 'Enter a name for the fishing vessel',
            'vendor_id.required' => 'Select a vendor',
            'bank_id.required' => 'Select a bank',
            'account_name.required' => 'Enter an account name',
            'account_number.required' => 'Enter an account number',

        ];

    public function mount()
    {
        $this->banks = Bank::all();
        $this->vendors = Vendor::all();

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
