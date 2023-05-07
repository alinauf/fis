<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\CollectionVessel;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        $collectionVessels = CollectionVessel::all();

        return view('settings.index', ['banks' => $banks, 'collectionVessels' => $collectionVessels]);
    }
}
