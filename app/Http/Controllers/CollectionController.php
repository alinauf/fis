<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\SL\Collection\CollectionSL;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

    private $collectionService;

    /**
     * CollectionController constructor.
     * @param CollectionSL $collectionService
     */
    public function __construct(CollectionSL $collectionService)
    {
        $this->collectionService = $collectionService;
    }

    public function index()
    {

        return view('collection.index');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = $this->collectionService->createCollection($request->all());

        if ($result['status']) {
            return redirect('collection')->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }
    }

    public function startCollection(Collection $collection, Request $request)
    {
        // validate the request for collection_vessel and fishing_vessel

        $request->validate([
            'collection_vessel' => 'required',
            'fishing_vessel' => 'required',
        ]);

        $data['collection_id'] = $collection->id;
        $data['collection_vessel_id'] = $request['collection_vessel'];
        $data['fishing_vessel_id'] = $request['fishing_vessel'];

        $result = $this->collectionService->createInvoice($data);

        if ($result['status']) {
            return redirect('collection/' . $collection->id . '/invoice/' . $result['invoice_id'])->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }


    }
}
