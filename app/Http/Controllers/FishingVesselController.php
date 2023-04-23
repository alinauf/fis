<?php

namespace App\Http\Controllers;

use App\Models\FishingVessel;
use App\SL\Collection\FishingVesselSL;
use Illuminate\Http\Request;

class FishingVesselController extends Controller
{

    private $fishingVesselService;

    /**
     * FishController constructor.
     * @param FishingVesselSL $fishingVesselService
     */
    public function __construct(FishingVesselSL $fishingVesselService)
    {
        $this->fishingVesselService = $fishingVesselService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fishing-vessel.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fishing-vessel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->fishingVesselService->store($request->all());

        if ($result['status']) {
            return redirect('fishing-vessel')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(FishingVessel $fishingVessel)
    {
        return view('fishing-vessel.show', ['fishingVessel' => $fishingVessel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FishingVessel $fishingVessel)
    {
        return view('fishing-vessel.edit', ['fishingVessel' => $fishingVessel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FishingVessel $fishingVessel)
    {
        $result = $this->fishingVesselService->update($fishingVessel->id, $request->all());

        if ($result['status']) {
            return redirect('fishing-vessel')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FishingVessel $fishingVessel)
    {
        $result = $this->fishingVesselService->destroy($fishingVessel->id);

        if ($result['status']) {
            return redirect('fishing-vessel')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }
}
