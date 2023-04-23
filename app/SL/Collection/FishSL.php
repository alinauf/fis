<?php

namespace App\SL\Collection;

use App\Models\Fish;
use App\SL\SL;
use Illuminate\Support\Facades\DB;

class FishSL extends SL
{
    public function __construct()
    {
        $this->setModel(new Fish());
    }

    public function store($data): array
    {
        DB::beginTransaction();
        try {
            $fish = Fish::where('name', $data['name'])->first();
            if ($fish) {
                return [
                    'status' => false,
                    'payload' => 'The fish already exists',
                ];
            }
            $fish = new Fish();
            $fish->name = $data['name'];
            $fish->description = $data['description'] ?? null;
            $result = $fish->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The fish has been successfully created',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with saving the fish',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


    }

    public function update($fishId, $data)
    {
        DB::beginTransaction();

        $fish = Fish::where('id', $fishId)->first();

        try {
            $fish->name = $data['name'] ?? $fish->name;
            $fish->description = $data['description'] ?? $fish->description;
            $result = $fish->save();

            DB::commit();

            if ($result) {
                return [
                    'status' => true,
                    'payload' => 'The fish has been successfully updated',
                ];
            } else {
                return [
                    'status' => false,
                    'payload' => 'There was an issue with updating the fish',
                ];
            }

        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

    }


}
