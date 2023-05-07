<?php

namespace App\SL\Collection;

use App\Models\BankAccount;
use App\Models\CollectionVessel;

use App\SL\SL;
use Illuminate\Support\Facades\DB;

class CollectionVesselSL extends SL
{
    public function __construct()
    {
        $this->setModel(new CollectionVessel());
    }

    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $collectionVessel = CollectionVessel::where('name', $data['name'])->first();
            if ($collectionVessel) {
                return [
                    'status' => false,
                    'payload' => 'The collection vessel already exists',
                ];
            }


            $collectionVessel = new CollectionVessel();
            $collectionVessel->name = $data['name'];
            $collectionVessel->contact_person = $data['contact_person'];
            $collectionVessel->email = $data['email'];
            $collectionVessel->phone = $data['phone'];
            $collectionVessel->description = $data['description'] ?? null;
            $collectionVessel->location = $data['location'] ?? null;


            $result = $collectionVessel->save();




            DB::commit();

            if ($result) {

                return [
                    'status' => true,
                    'payload' => 'The collection vessel has been successfully created',
                ];
            } else {
                DB::rollback();
                return [
                    'status' => false,
                    'payload' => 'There was an issue with saving the collection vessel',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


    }

    public function update($collectionVesselId, $data)
    {
        DB::beginTransaction();

        $collectionVessel = CollectionVessel::where('id', $collectionVesselId)->first();

        try {
            $collectionVessel->name = $data['name'] ?? $collectionVessel->name;
            $collectionVessel->contact_person = $data['contact_person'] ?? $collectionVessel->contact_person;
            $collectionVessel->email = $data['email'] ?? $collectionVessel->email;
            $collectionVessel->phone = $data['phone'] ?? $collectionVessel->phone;
            $collectionVessel->description = $data['description'] ?? $collectionVessel->description;
            $collectionVessel->location = $data['location'] ?? $collectionVessel->location;
            $result = $collectionVessel->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The collection vessel has been successfully updated',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with updating the collection vessel',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }




}
