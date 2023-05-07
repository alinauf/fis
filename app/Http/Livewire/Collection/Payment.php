<?php

namespace App\Http\Livewire\Collection;

use Livewire\Component;
use Livewire\WithFileUploads;

class Payment extends Component
{
    use WithFileUploads;

    public $formValidationStatus;
    public $collection;
    public $invoice;

    public $payment_image;
    public $amount;
    public $comments;

    public $payment_type;


    protected $rules = [
        'amount' => 'required|numeric',
    ];

    protected $messages =
        [
            'amount.required' => 'Enter the amount paid',
            'amount.numeric' => 'Enter a valid amount',
        ];



    public function mount($collection, $invoice)
    {
        $this->payment_type = 'bank_transfer';
        $this->formValidationStatus = false;
        $this->collection = $collection;
        $this->invoice = $invoice;
        $this->amount = $invoice->balance;
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
        return view('livewire.collection.payment');
    }
}
