<?php

namespace App\SL\Collection;

use App\Models\BankAccount;
use App\Models\Collection;
use App\Models\FishingVessel;
use App\Models\Inventory;
use App\Models\Invoice;
use App\SL\SL;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CollectionSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Collection());
    }

    public function createCollection($data)
    {
        DB::beginTransaction();
        try {

            $collection = Collection::whereDate('created_at', now())->first();

            if ($collection) {
                return [
                    'status' => false,
                    'payload' => 'There is already a collection for today',
                ];
            }
            $collection = new Collection();
            $collection->collection_no = $this->generateCollectionNo();
            $collection->comments = $data['comments'] ?? null;
            $collection->location = $data['location'];
            $collection->save();

            $result = $collection->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The collection has been successfully created',
                ];
            } else {
                DB::rollback();
                return [
                    'status' => false,
                    'payload' => 'There was an issue with saving the collection',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


    }

    public function generateCollectionNo()
    {
        $collectionNo = 'F';
        $collectionCount = Collection::all()->count();

        if ($collectionCount == 0) {
            $collNo = 1;
        } else {
            $getLatestCollection = Collection::orderBy('id', 'desc')->first();
            $collNo = $getLatestCollection->id + 1;
        }

        $collectionNo .= $collNo;
        return $collectionNo;
    }

    public function createInvoice($data)
    {
        DB::beginTransaction();
        try {


            $invoice = new Invoice();
            $invoice->collection_id = $data['collection_id'];
            $invoice->collection_vessel_id = $data['collection_vessel_id'];
            $invoice->fishing_vessel_id = $data['fishing_vessel_id'];

            $result = $invoice->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The invoice has been successfully created',
                    'invoice_id' => $invoice->id,
                ];
            } else {
                DB::rollback();
                return [
                    'status' => false,
                    'payload' => 'There was an issue with creating the invoice',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


    }

    public function settleCollection($invoiceId)
    {
        $settleInvoice = $this->markInvoiceCollectedStatus($invoiceId);

        if(!$settleInvoice['status']){
            return $settleInvoice;
        }

        // fetch all the items in invoice
        $invoice = Invoice::find($invoiceId);

        $invoiceItems = $invoice->invoiceItems;
        $collection = $invoice->collection;


        $inventory = Inventory::where('collection_id', $collection->id)->get();

        if ($inventory->count() > 0) {
            $this->removeItemsFromInventory($collection->id);
        }

        $this->addItemsToInventory($invoiceItems);

        return [
            'status' => true,
            'payload' => 'The collection has been settled',
        ];


    }

    public function addItemsToInventory($items)
    {
        foreach ($items as $item) {
            $inventory = new Inventory();
            $inventory->collection_id = $item->collection_id;
            $inventory->invoice_id = $item->invoice_id;
            $inventory->fish_id = $item->fish_id;
            $inventory->variant_id = $item->variant_id;
            $inventory->quantity = $item->quantity;
            $inventory->is_frozen = $item->is_frozen;
            if (!$inventory->save()) {
                \Log::error('There was an issue with saving the inventory item', ['item' => $item]);
            }
        }
    }

    public function removeItemsFromInventory($collectionId)
    {
        $inventory = Inventory::where('collection_id', $collectionId)->get();
        foreach ($inventory as $item) {
            $item->delete();
        }
    }


    public function markeInvoiceAsNotCollected($invoiceId)
    {
        $invoice = \App\Models\Invoice::find($invoiceId);

        if (!$invoice) {
            return ['status' => false, 'payload' => 'There was an issue with setting the collection on the invoice'];
        }

        $invoice->is_collected = false;
        $invoice->collected_date = null;

        if ($invoice->save()) {
            return [
                'status' => true,
                'payload' => 'Invoice has been marked as not collected',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with marking the invoice as not collected',
            ];
        }

    }

    public function markInvoiceCollectedStatus($invoiceId)
    {

        $invoice = \App\Models\Invoice::find($invoiceId);

        if (!$invoice) {
            return ['status' => false, 'payload' => 'There was an issue with setting the collection on the invoice'];
        }

        $invoice->is_collected = true;
        $invoice->collected_date = Carbon::now();

        if ($invoice->save()) {
            return [
                'status' => true,
                'payload' => 'Invoice has been marked as collected',
            ];
        } else {
            return [
                'status' => false,
                'payload' => 'There was an issue with marking the invoice as collected',
            ];
        }
    }


}
