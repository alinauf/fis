<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = new User();
        $user->name = 'Ali Nauf';
        $user->email = 'nauf@live.com';
        $user->password = bcrypt('Test@123');
        $user->save();

        $user = new User();
        $user->name = 'Tester';
        $user->email = 'jhon@test.com';
        $user->password = bcrypt('Test@123');
        $user->save();


        $bank = new \App\Models\Bank();
        $bank->name = 'BML';
        $bank->save();

        $bank2 = new \App\Models\Bank();
        $bank2->name = 'MIB';
        $bank2->save();

        $vendor = new \App\Models\Vendor();
        $vendor->name = 'Test Vendor';
        $vendor->email = 'vendor@example.test';
        $vendor->phone = '1234567890';
        $vendor->save();

        $vendor2 = new \App\Models\Vendor();
        $vendor2->name = 'Test Vendor 2';
        $vendor2->email = 'vendor2@example.test';
        $vendor2->phone = '1234567890';
        $vendor2->save();


        $collectionVessel = new \App\Models\CollectionVessel();
        $collectionVessel->name = 'Test Collection Vessel';
        $collectionVessel->contact_person = 'Test Contact Person';
        $collectionVessel->email = 'collection@example.com';
        $collectionVessel->phone = '1234567890';
        $collectionVessel->description = 'Test Description';
        $collectionVessel->location = 'Test Location';
        $collectionVessel->save();


        $collectionVessel2 = new \App\Models\CollectionVessel();
        $collectionVessel2->name = 'Test Collection Vessel 2';
        $collectionVessel2->contact_person = 'Test Contact Person 2';
        $collectionVessel2->email = 'collection2@example.com';
        $collectionVessel2->phone = '12345678902';
        $collectionVessel2->description = 'Test Description 2';
        $collectionVessel2->location = 'Test Location 2';
        $collectionVessel2->save();

        $fishingVessel = new \App\Models\FishingVessel();
        $fishingVessel->name = 'Test Fishing Vessel';
        $fishingVessel->vendor_id = 1;
        $fishingVessel->save();


        $fishingVessel = new \App\Models\FishingVessel();
        $fishingVessel->name = 'Test Fishing Vessel 2';
        $fishingVessel->vendor_id = 2;
        $fishingVessel->save();


        $bankAccount = new \App\Models\BankAccount();
        $bankAccount->bank_id = 1;
        $bankAccount->fishing_vessel_id = 1;
        $bankAccount->account_number = '1234567890';
        $bankAccount->account_name = 'Test Account Name';
        $bankAccount->is_default = true;
        $bankAccount->save();

        $bankAccount2 = new \App\Models\BankAccount();
        $bankAccount2->bank_id = 2;
        $bankAccount2->fishing_vessel_id = 2;
        $bankAccount2->account_number = '1234567892';
        $bankAccount2->account_name = 'Test Account Name';
        $bankAccount2->is_default = true;
        $bankAccount2->save();



    }
}
