<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\SL\Collection\VendorSL;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    private $vendorService;

    /**
     * VendorController constructor.
     * @param VendorSL $vendorService
     */
    public function __construct(VendorSL $vendorService)
    {
        $this->vendorService = $vendorService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->vendorService->store($request->all());

        if ($result['status']) {
            return redirect('vendor')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return view('vendor.show', ['vendor' => $vendor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', ['vendor' => $vendor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $result = $this->vendorService->update($vendor->id, $request->all());

        if ($result['status']) {
            return redirect('vendor')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $result = $this->vendorService->destroy($vendor->id);

        if ($result['status']) {
            return redirect('vendor')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
