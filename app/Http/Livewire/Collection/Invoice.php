<?php

namespace App\Http\Livewire\Collection;

use App\Models\Variant;
use App\SL\Collection\CollectionSL;
use App\SL\Collection\InvoiceSL;
use Livewire\Component;
use Livewire\WithPagination;

class Invoice extends Component
{
    use WithPagination;

    public $collection;
    public $invoice;

    public $variantSearch;

    public $selectedVariant;

    public $firstVariant;

    public $variantAmount;

    public $quantity;

    public $fish_type;


    public $reference;

    public $successMessageShow = false;

    protected $rules = [
        'variantSearch' => 'required',
    ];

    protected $messages = [
        'variantSearch.required' => 'Please select an item',
    ];


    protected $listeners = ['updateInvoiceView'];


    public function mount($collection, $invoice)
    {
        $this->collection = $collection;
        $this->invoice = $invoice;
        $this->quantity = 1;
        $this->fish_type = 'frozen';

    }

    public function updateInvoiceView()
    {
        $this->mount($this->collection, $this->invoice);
        $this->render();
    }


    public function updatedVariantSearch($property)
    {
        if ($property == '' || $property == null) {
            $this->selectedVariant = null;
        }
    }

    public function updateSelectedVariant()
    {
        if ($this->firstVariant != null) {
            $this->selectedVariant = $this->firstVariant;
            $this->updatedSelectedVariant();
            $this->variantSearch = $this->firstVariant->name;
        }
    }

    public function updatedSelectedVariant()
    {
        if ($this->selectedVariant->price != null) {
            $this->variantAmount = $this->selectedVariant->price;
        }
    }

    public function settleCollection()
    {
        $collection = new CollectionSL();
        $result = $collection->settleCollection($this->invoice->id);

        if ($result['status'] == true) {

            session()->flash('success', $result['payload']);

        } else {
            session()->flash('failure', $result['payload']);

        }
        $this->emit('updateInvoiceView');

    }

    public function reopenCollection()
    {
        $collection = new CollectionSL();
        $result = $collection->markeInvoiceAsNotCollected($this->invoice->id);

        if ($result['status']) {
            session()->flash('success', $result['payload']);

        } else {
            session()->flash('failure', $result['payload']);

        }
        $this->emit('updateInvoiceView');


    }


    public function updateSelectedVariantClick($variantId)
    {
        $selectedVariant = Variant::where('id', $variantId)->first();
        if ($selectedVariant != null) {
            $this->selectedVariant = $selectedVariant;
            $this->updatedSelectedVariant();
            $this->variantSearch = $selectedVariant->name;
        }
    }

    public function storeInvoiceItem()
    {
        $this->validate();

        $invoiceSl = new InvoiceSL();

        $data['invoice_id'] = $this->invoice->id;
        $data['collection_id'] = $this->invoice->collection_id;
        $data['fish_id'] = $this->selectedVariant->fish_id;
        $data['variant_id'] = $this->selectedVariant->id;
        $data['quantity'] = $this->quantity;
        $data['variant_price'] = $this->variantAmount;
        $data['is_frozen'] = $this->fish_type == 'frozen' ? true : false;

        $result = $invoiceSl->storeInvoiceItem($data);

        if ($result['status']) {
            session()->flash('success', $result['payload']);

        } else {
            session()->flash('failure', $result['payload']);
        }
        $this->emit('updateInvoiceView');

    }

    public function removeInvoiceItem($itemId)
    {
        $invoiceSL = new InvoiceSL();
        $result = $invoiceSL->removeInvoiceItem($itemId);

        if ($result['status']) {
            session()->flash('success', $result['payload']);
        } else {
            session()->flash('failure', 'Something went wrong. Please try again later.');
        }

        $this->emit('updateInvoiceView');

    }


    public function makeVendorPayment()
    {

    }

    public function render()
    {
        $data = Variant::where('name', 'like', '%' . $this->variantSearch . '%')->get();
        if ($data != null) {
            $this->firstVariant = $data->first();
        }
        return view('livewire.collection.invoice', ['variants' => $data]);
    }
}
