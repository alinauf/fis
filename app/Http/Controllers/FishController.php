<?php

namespace App\Http\Controllers;

use App\Models\Fish;
use App\SL\Collection\FishSL;
use Illuminate\Http\Request;

class FishController extends Controller
{
    private $fishService;

    /**
     * FishController constructor.
     * @param FishSL $fishService
     */
    public function __construct(FishSL $fishService)
    {
        $this->fishService = $fishService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fish.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('fish.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->fishService->store($request->all());

        if ($result['status']) {
            return redirect('fish')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fish $fish)
    {
        return view('fish.show', ['fish' => $fish]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fish $fish)
    {
        return view('fish.edit', ['fish' => $fish]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fish $fish)
    {
        $result = $this->fishService->update($fish->id, $request->all());

        if ($result['status']) {
            return redirect('fish')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fish $fish)
    {
        $result = $this->fishService->destroy($fish->id);

        if ($result['status']) {
            return redirect('fish')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', 'Something went wrong.');
        }
    }

    public function storeVariant(Request $request, Fish $fish)
    {

        $data = $request->all();
        $data['fish_id'] = $fish->id;
        $result = $this->fishService->storeVariant($data);

        if ($result['status']) {
            return redirect()->back()->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }
}
