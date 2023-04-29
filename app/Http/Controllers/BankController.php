<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\SL\Collection\FishSL;
use App\SL\Settings\BankSL;
use Illuminate\Http\Request;

class BankController extends Controller
{
    private $bankService;

    /**
     * FishController constructor.
     * @param  $bankService
     */
    public function __construct(BankSL $bankService)
    {
        $this->bankService = $bankService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:banks',
        ]);

        $result = $this->bankService->store($request->all());

        if ($result['status']) {
            return redirect('settings')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return view('bank.edit', ['bank' => $bank]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        $result = $this->bankService->update($bank->id, $request->all());

        if ($result['status']) {
            return redirect('settings')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
