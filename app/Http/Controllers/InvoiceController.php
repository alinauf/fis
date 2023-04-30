<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{


    /**
     * Display the specified resource.
     */
    public function show(Collection $collection, Invoice $invoice)
    {
        return view('collection.invoice', [
            'collection' => $collection,
            'invoice' => $invoice
        ]);

    }


}
