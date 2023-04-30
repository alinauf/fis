<?php

namespace App\Http\Livewire\FishingVessel;

use App\Models\Bank;
use App\Models\Vendor;
use App\SL\Collection\FishingVesselSL;
use Livewire\Component;

class BankAccount extends Component
{
    public $fishingVessel;

    public $banks;

    public $bank_id;
    public $account_name;
    public $account_number;

    public $formValidationStatus;

    protected $listeners = ['bankAccountAdded'];


    protected $rules = [
        'bank_id' => 'required',
        'account_name' => 'required',
        'account_number' => 'numeric|required',
    ];

    protected $messages =
        [
            'bank_id.required' => 'Select a bank',
            'account_name.required' => 'Enter an account name',
            'account_number.required' => 'Enter an account number',
        ];


    public function mount($fishingVessel)
    {
        $this->fishingVessel = $fishingVessel;
        $this->banks = Bank::all();
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

            $service = new FishingVesselSL();
            $service->addBankAccount([
                'fishing_vessel_id' => $this->fishingVessel->id,
                'bank_id' => $this->bank_id,
                'account_name' => $this->account_name,
                'account_number' => $this->account_number,
                'is_default' => false,
            ]);

            $this->emit('bankAccountAdded');



        } else {
            $this->formValidationStatus = false;
        }
    }

    public function bankAccountAdded()
    {
        $this->mount($this->fishingVessel);
        $this->render();
    }

    public function removeBankAccount($accountId)
    {
        $service = new FishingVesselSL();
        $result = $service->removeBankAccount($accountId);

        if (!$result['status']) {
            session()->flash('failure', $result['payload']);
            return;
        }

        $this->emit('bankAccountAdded');

    }

    public function makePrimary($accountId)
    {
        $service = new FishingVesselSL();
        $result= $service->makeBankAccountPrimary($this->fishingVessel->id,$accountId);

        if (!$result['status']) {
            session()->flash('failure', $result['payload']);
            return;
        }

        $this->emit('bankAccountAdded');

    }



    public function render()
    {
        return view('livewire.fishing-vessel.bank-account');
    }
}
