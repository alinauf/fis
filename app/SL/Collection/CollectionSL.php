<?php

namespace App\SL\Collection;

use App\Models\BankAccount;
use App\Models\Collection;
use App\Models\FishingVessel;
use App\Models\Invoice;
use App\SL\SL;
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


}
