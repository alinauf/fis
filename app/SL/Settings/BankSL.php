<?php

namespace App\SL\Settings;

use App\Models\Bank;
use App\Models\Variant;
use App\SL\SL;
use Illuminate\Support\Facades\DB;

class BankSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Bank());
    }

    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $bank = Bank::where('name', $data['name'])->first();
            if ($bank) {
                return [
                    'status' => false,
                    'payload' => 'The bank already exists',
                ];
            }
            $bank = new Bank();
            $bank->name = $data['name'];
            $bank->description = $data['description'] ?? null;
            $bank->scientific_name = $data['scientific_name'] ?? null;
            $result = $bank->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The bank has been successfully created',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with saving the bank',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


    }

    public function update($bankId, $data)
    {
        DB::beginTransaction();

        $bank = Bank::where('id', $bankId)->first();

        try {
            $bank->name = $data['name'] ?? $bank->name;
            $result = $bank->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The bank has been successfully updated',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with updating the bank',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }



}
