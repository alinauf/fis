<?php

namespace App\SL\Collection;

use App\Models\BankAccount;
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
            $fishingVessel->vendor_id = $data['vendor_id'];
            $result = $fishingVessel->save();

            $bankAccount = new BankAccount();


            DB::commit();

            if ($result) {


                $data['fishing_vessel_id'] = $fishingVessel->id;
                $data['is_default'] = true;

                $resultBank = $this->addBankAccount($data);

                if (!$resultBank['status']) {
                    DB::rollback();
                    return $resultBank;
                }

                return [
                    'status' => true,
                    'payload' => 'The fishing vessel has been successfully created',
                ];
            } else {
                DB::rollback();
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

    public function addBankAccount($data)
    {
        DB::beginTransaction();
        try {
            $bankAccount = BankAccount::where('fishing_vessel_id', $data['fishing_vessel_id'])
                ->where('account_number', $data['account_number'])
                ->where('bank_id', $data['bank_id'])
                ->first();
            if ($bankAccount) {
                return [
                    'status' => false,
                    'payload' => 'The bank account is already added with the fishing vessel',
                ];
            }

            $bankAccount = new BankAccount();

            $bankAccount->bank_id = $data['bank_id'];
            $bankAccount->fishing_vessel_id = $data['fishing_vessel_id'];
            $bankAccount->account_number = $data['account_number'];
            $bankAccount->account_name = $data['account_name'];
            $bankAccount->is_default = $data['is_default'];

            $resultBank = $bankAccount->save();

            DB::commit();

            if ($resultBank) {
                return [
                    'status' => true,
                    'payload' => 'The bank account has been successfully created',
                ];
            } else {
                DB::rollback();
                return [
                    'status' => false,
                    'payload' => 'There was an issue with saving the bank account',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function removeBankAccount($accountId)
    {
        DB::beginTransaction();
        try {
            $bankAccount = BankAccount::where('id', $accountId)
                ->first();
            if (!$bankAccount) {
                return [
                    'status' => false,
                    'payload' => 'The bank account is not added with the fishing vessel',
                ];
            }

            if ($bankAccount->is_default) {
                return [
                    'status' => false,
                    'payload' => 'The default bank account cannot be removed',
                ];
            }

            $resultBank = $bankAccount->delete();

            DB::commit();

            if ($resultBank) {
                return [
                    'status' => true,
                    'payload' => 'The bank account has been successfully removed',
                ];
            } else {
                DB::rollback();
                return [
                    'status' => false,
                    'payload' => 'There was an issue with removing the bank account',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }

    public function makeBankAccountPrimary($vesselId, $accountId)
    {
        // make all bank accounts of the fishing vessel as not default
        $bankAccounts = BankAccount::where('fishing_vessel_id', $vesselId)->get();

        foreach ($bankAccounts as $bankAccount) {
            $bankAccount->is_default = false;
            $bankAccount->save();
        }

        // make the selected bank account as default
        $bankAccount = BankAccount::where('fishing_vessel_id', $vesselId)
            ->where('id', $accountId)
            ->first();
        $bankAccount->is_default = true;
        $bankAccount->save();

        return [
            'status' => true,
            'payload' => 'The bank account has been successfully made as primary',
        ];


    }


}
