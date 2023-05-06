<?php

namespace App\SL\Collection;

use App\Models\Invoice;
use App\SL\SL;
use Illuminate\Support\Facades\DB;

class InvoiceSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Invoice());
    }

    public function storeInvoiceItem($data)
    {


        $invoiceId = $data['invoice_id'];
        $collectionId = $data['collection_id'];
        $fishId = $data['fish_id'];
        $variantId = $data['variant_id'];
        $quantity = $data['quantity'];
        $amount = $data['variant_price'];
        $isFrozen = $data['is_frozen'];


        DB::beginTransaction();

        try {
            //calculate subtotal
            $subtotal = ($amount * $quantity);

            //calculate total
            $total = ($subtotal);

            $invoiceItem = new \App\Models\InvoiceItem();
            $invoiceItem->collection_id = $collectionId;
            $invoiceItem->invoice_id = $invoiceId;
            $invoiceItem->fish_id = $fishId;
            $invoiceItem->variant_id = $variantId;
            $invoiceItem->quantity = $quantity;
            $invoiceItem->price = $amount;
            $invoiceItem->total = $subtotal;
            $invoiceItem->is_frozen = $isFrozen;

            $invoiceItemResult = $invoiceItem->save();


            if ($invoiceItemResult) {
                $invoice = \App\Models\Invoice::find($invoiceId);

                $invoice->total = ($invoice->total + $invoiceItem->total);
                $invoice->balance = ($invoice->balance + $invoiceItem->total);

                $invoice->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error($e->getMessage());

            return [
                'status' => false,
                'payload' => 'An error occurred while saving the invoice item',
                'error' => $e->getMessage()
            ];

        }

        DB::commit();
        \Log::info('Transaction posted successfully');

        return [
            'status' => true,
            'payload' => 'The Transaction has been successfully posted'
        ];
    }

    public function removeInvoiceItem($itemId)
    {
        $invoiceItem = \App\Models\InvoiceItem::find($itemId);

        $invoice = \App\Models\Invoice::find($invoiceItem->invoice_id);

        if ($invoice->is_settled || $invoice->is_collected) {
            return [
                'status' => false,
                'payload' => 'The invoice is already settled or cancelled'
            ];
        }

        if ($invoiceItem->delete()) {
            $invoice = \App\Models\Invoice::find($invoiceItem->invoice_id);
            $invoice->total = ($invoice->total - $invoiceItem->total);
            $invoice->balance = ($invoice->balance - $invoiceItem->total);
            $invoice->save();
        }

        return [
            'status' => true,
            'payload' => 'The invoice item has been successfully removed'
        ];

    }


}
