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
//         \App\Models\User::factory(10)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

        $user = new User();
        $user->name = 'Ali Nauf';
        $user->email = 'nauf@live.com';
        $user->password = bcrypt('Test@123');
        $user->save();

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

        $fishingVessel = new \App\Models\FishingVessel();
        $fishingVessel->name = 'Test Fishing Vessel';
        $fishingVessel->vendor_id = 1;
        $fishingVessel->save();

        $fishingVessel = new \App\Models\FishingVessel();
        $fishingVessel->name = 'Test Fishing Vessel 2';
        $fishingVessel->vendor_id = 2;
        $fishingVessel->save();

    }
}
