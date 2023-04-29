<?php

namespace App\SL\Collection;

use App\Models\Vendor;
use App\SL\SL;
use Illuminate\Support\Facades\DB;

class VendorSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Vendor());
    }

    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $vendor = Vendor::where('name', $data['name'])->first();
            if ($vendor) {
                return [
                    'status' => false,
                    'payload' => 'The vendor already exists',
                ];
            }
            $vendor = new Vendor();
            $vendor->name = $data['name'];
            $vendor->phone = $data['phone'];
            $vendor->email = $data['email'] ?? null;

            $result = $vendor->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The vendor has been successfully created',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with saving the vendor',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


    }

    public function update($vendorId, $data)
    {
        DB::beginTransaction();

        $vendor = Vendor::where('id', $vendorId)->first();

        try {
            $vendor->name = $data['name'] ?? $vendor->name;
            $vendor->phone = $data['phone'] ?? $vendor->phone;
            $vendor->email = $data['email'] ?? $vendor->email;
            $result = $vendor->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The vendor has been successfully updated',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with updating the vendor',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }


}
