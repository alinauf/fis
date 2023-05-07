<?php

namespace App\Http\Controllers;

use App\Models\CollectionVessel;

use App\SL\Collection\CollectionVesselSL;
use Illuminate\Http\Request;

class CollectionVesselController extends Controller
{

    private $collectionVesselService;

    /**
     * FishController constructor.
     * @param CollectionVesselSL $collectionVesselService
     */
    public function __construct(CollectionVesselSL $collectionVesselService)
    {
        $this->collectionVesselService = $collectionVesselService;
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
        return view('collection-vessel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->collectionVesselService->store($request->all());

        if ($result['status']) {
            return redirect('settings')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CollectionVessel $collectionVessel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollectionVessel $collectionVessel)
    {
        return view('collection-vessel.edit', ['collectionVessel' => $collectionVessel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CollectionVessel $collectionVessel)
    {
        $result = $this->collectionVesselService->update($collectionVessel->id, $request->all());

        if ($result['status']) {
            return redirect('settings')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollectionVessel $collectionVessel)
    {
        $result = $this->collectionVesselService->destroy($collectionVessel->id);

        if ($result['status']) {
            return redirect('settings')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }

}
