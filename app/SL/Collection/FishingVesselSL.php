<?php

namespace App\SL\Collection;

use App\Models\FishingVessel;
use App\SL\SL;
use Illuminate\Support\Facades\DB;

class FishingVesselSL extends SL
{
    public function __construct()
    {
        $this->setModel(new FishingVessel());
    }

    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $fishingVessel = FishingVessel::where('name', $data['name'])->first();
            if ($fishingVessel) {
                return [
                    'status' => false,
                    'payload' => 'The fishing vessel already exists',
                ];
            }
            $fishingVessel = new FishingVessel();
            $fishingVessel->name = $data['name'];
            $fishingVessel->contact_person = $data['contact_person'];

            $fishingVessel->phone = $data['phone'] ?? null;
            $fishingVessel->email = $data['email'] ?? null;

            $fishingVessel->bank_name = $data['bank_name'] ?? null;
            $fishingVessel->account_name = $data['account_name'] ?? null;
            $fishingVessel->account_number = $data['account_number'] ?? null;

            $result = $fishingVessel->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The fishing vessel has been successfully created',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with saving the fishing vessel',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


    }

    public function update($fishingVesselId, $data)
    {
        DB::beginTransaction();

        $fishingVessel = FishingVessel::where('id', $fishingVesselId)->first();

        try {
            $fishingVessel->name = $data['name'] ?? $fishingVessel->name;
            $fishingVessel->contact_person = $data['contact_person'] ?? $fishingVessel->contact_person;

            $fishingVessel->phone = $data['phone'] ?? $fishingVessel->phone;
            $fishingVessel->email = $data['email'] ?? $fishingVessel->email;

            $fishingVessel->bank_name = $data['bank_name'] ?? $fishingVessel->bank_name;
            $fishingVessel->account_name = $data['account_name'] ?? $fishingVessel->account_name;
            $fishingVessel->account_number = $data['account_number'] ?? $fishingVessel->account_number;
            $result = $fishingVessel->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The fishing vessel has been successfully updated',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with updating the fishing vessel',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }


}
