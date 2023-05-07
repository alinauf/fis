<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Invoice;
use App\SL\Collection\InvoiceSL;
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

    public function showPaymentScreen(Collection $collection, Invoice $invoice)
    {

        if($invoice->is_settled){
            return redirect()->route('collection.invoice', [$collection, $invoice])->with('success', 'Invoice already settled');
        }

        return view('collection.payment', [
            'collection' => $collection,
            'invoice' => $invoice
        ]);
    }


    public function handlePayment(Collection $collection, Invoice $invoice, Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_image' => 'image|max:1024',
        ]);

        $service = new InvoiceSL();



        $result = $service->settleInvoice($invoice, $request->all());


        if ($result['status']) {

            if ($request->hasFile('payment_image') && $request->file('payment_image')->isValid()) {
                $request->validate([
                    'payment_image' => 'image|max:1024',
                ]);
                $invoice->addMediaFromRequest('payment_image')->toMediaCollection('Payment Image');
            }
            return redirect()->route('collection.invoice', [$collection, $invoice])->with('success', $result['payload']);
        } else {
            return redirect()->back()->with('errors', $result['payload']);
        }

    }


}
