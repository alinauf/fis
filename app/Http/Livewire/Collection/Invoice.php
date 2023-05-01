<?php

namespace App\Http\Livewire\Collection;

use App\Models\Variant;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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


    public function mount($collection, $invoice)
    {
        $this->collection = $collection;
        $this->invoice = $invoice;
        $this->quantity = 1;
        $this->fish_type = 'frozen';

    }


    public function updatedInvariantSearch($property)
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
        $invoice = \App\Models\Invoice::find($this->invoice->id);

        if (!$invoice) {
            return ['status' => false, 'payload' => 'There was an issue with the collection'];
        }

        $invoice->is_collected = true;
        $invoice->collected_date = Carbon::now();

        if ($invoice->save()) {
            session()->flash('success', 'The items have been successfully collected');
            $this->render();
        } else {
            session()->flash('errors', 'There was an issue with collecting the Items');
        }
    }

    public function reopenCollection()
    {
        $invoice = \App\Models\Invoice::find($this->invoice->id);

        if (!$invoice) {
            return ['status' => false, 'payload' => 'There was an issue with the collection'];
        }
        $invoice->is_collected = false;


        if ($invoice->save()) {
            session()->flash('success', 'The collection has successfullt reopened');
            $this->render();
        } else {
            session()->flash('errors', 'There was an issue with collecting the Items');
        }

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

    public function makeVendorPayment()
    {

    }

    public function storeInvoiceItem()
    {
        $this->validate();

        $data = [$this->invoice->id, $this->invoice->collection_id, $this->selectedVariant->fish_id,
            $this->selectedVariant->id,
            $this->quantity];

        $quantity = $this->quantity;
        $amount = $this->selectedVariant->price;

        DB::beginTransaction();

        try {
            //calculate subtotal
            $subtotal = ($amount * $quantity);

            //calculate total
            $total = ($subtotal );

            $invoiceItem = new \App\Models\InvoiceItem();
            $invoiceItem->collection_id = $this->invoice->collection_id;
            $invoiceItem->invoice_id = $this->invoice->id;
            $invoiceItem->fish_id = $this->selectedVariant->fish_id;
            $invoiceItem->variant_id = $this->selectedVariant->id;
            $invoiceItem->quantity = $quantity;
            $invoiceItem->price = $amount;
            $invoiceItem->total = $subtotal;
            $invoiceItem->is_frozen = $this->fish_type == 'frozen' ? true : false;

            $invoiceItemResult = $invoiceItem->save();



            if ($invoiceItemResult) {
                $invoice = \App\Models\Invoice::find($this->invoice->id);

                    $invoice->total = ($invoice->total + $invoiceItem->total);
                    $invoice->balance = ($invoice->balance + $invoiceItem->total);

                $invoice->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error($e->getMessage());

            session()->flash('failure', 'There was an issue with posting the Transaction');

        }

        DB::commit();
        \Log::info('Transaction posted successfully');

        session()->flash('success', 'The Transaction has been successfully posted');
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
