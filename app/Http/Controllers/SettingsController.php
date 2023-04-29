<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return view('settings.index', ['banks' => $banks]);
    }
}
