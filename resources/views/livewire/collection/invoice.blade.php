<div>
    <div class="max-w-full mx-auto sm:px-6 lg:px-8 grid sm:grid-cols-3  gap-6 ">

        <div class="col-span-2 mt-6  p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Add Invoice Items</h3>
                <p class="mt-1 text-sm text-gray-500">Select the items to add to the invoice</p>
            </div>

            <div class="grid grid-cols-6 gap-6 ">

                <div class="sm:col-span-6 ">
                    <label for="txCode" class="block text-sm font-medium text-gray-700">
                        Code</label>
                    <input type="search" name="variantSearch" wire:model="variantSearch" id="variantSearch"
                           @if($invoice->is_settled) disabled @endif
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3
                                   focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <ul role="list" class=" absolute " style="width:47rem">
                        @if($variantSearch != null && $selectedVariant ==null)
                            @foreach($variants as $variant)
                                <li class=" col-span-1 bg-white divide-y divide-gray-200 ">
                                    <a href="#" wire:click="updateSelectedVariantClick({{$variant->id}})"
                                       class="w-full flex items-center justify-between p-6 space-x-6
                                            overflow-auto
                                           hover: hover:bg-gray-50
                                           focus:ring-blue-500">
                                        <div class="flex-1 truncate">
                                            <div class="flex items-center space-x-3">
                                                <h3 class="text-gray-900 text-sm font-medium truncate">{{$variant->name}}</h3>
                                            </div>
                                            <p class="mt-1 text-gray-500 text-sm truncate">
                                                {{$variant->fish->name ?? ''}}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="mt-1 text-gray-500 text-sm truncate">
                                                Amount : {{$variant->price ?? '-'}}
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    @error('variantSearch')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount
                    </label>
                    <input type="text" id="amount" wire:model="variantAmount" @if($invoice->is_settled) disabled
                           @endif
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" min="1" wire:model="quantity"
                           @if($invoice->is_settled) disabled @endif
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>







            </div>

            <div class="px-4 py-3 mt-2  text-right ">
                <button type="button" wire:click="storeInvoiceItem" @if($invoice->is_settled) disabled @endif
                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white
                      @if($invoice->is_settled) bg-gray-600 hover:bg-gray-700 focus:ring-gray-500 @else
                        bg-slate-500 hover:bg-slate-700 :ring-slate-500 @endif
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus">
                    <!-- Heroicon name: solid/plus-circle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                              clip-rule="evenodd"/>
                    </svg>
                    Post Item
                </button>
            </div>


        </div>
        <div class="col-span-1 mt-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <section aria-labelledby="Invoice-Information">
                    <div class="p-3">
                        <div class="flex justify-between">

                            <div title="Invoice Status">
                                @if($invoice->is_collected)
                                    <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800">
                                        Collected
                                    </div>

                                @else
                                    <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800">
                                        Not Collected
                                    </div>
                                @endif
                            </div>

                            <div title="Invoice Status">
                                @if($invoice->is_settled)
                                    <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800">
                                        Settled
                                    </div>

                                @else
                                    <div
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800">
                                        Invoice Not Settled
                                    </div>
                                @endif
                            </div>
                        </div>
                        <dl class="mt-4 flow-root border-b border-gray-200 divide-y divide-gray-200">

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500 col-span-1">Bill To<dt>
                                <dd class="text-gray-900 "> {{$invoice->fishingVessel->name}}</dd>
                            </div>

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500 ">Description</dt>
                                <dd class="text-gray-900 ">{{$invoice->comments ?? '-'}}</dd>
                            </div>

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500">Reference</dt>
                                <dd class="text-gray-900 ">{{$invoice->payment_reference ?? '-'}}</dd>
                            </div>

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500 ">Total</dt>
                                <dd class="text-gray-900 ">{{$invoice->total ?? '-'}}</dd>
                            </div>

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500">Paid</dt>
                                <dd class="text-gray-900 ">{{$invoice->paid ?? '-'}}</dd>
                            </div>

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500">Collected?</dt>
                                <dd class="text-gray-900 ">
                                    {{
                                    isset($invoice->collected_date) ?
                                        \Carbon\Carbon::parse($invoice->collected_date)->format('l, jS F Y h:i a') : '-'
                                    }}
                                </dd>
                            </div>

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500">Settled?</dt>
                                <dd class="text-gray-900 ">
                                    {{
                                    isset($invoice->settled_date) ?
                                        \Carbon\Carbon::parse($invoice->settled_date)->format('l, jS F Y h:i a') : '-'
                                    }}
                                </dd>
                            </div>



                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500">Status</dt>
                                <dd class="text-gray-900">

                                    @if(!$invoice->is_collected )
                                        <button type="button" wire:click="settleCollection"
                                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <!-- Heroicon name: solid/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            @if($invoice->collected_date !=null)
                                                Re-Collect
                                            @else
                                                Collect
                                            @endif
                                        </button>

                                        {{--                                    TODO: Where to keep buttons--}}


                                    @else
                                        Unpaid
                                    @endif


                                    @if($invoice->is_collected)
                                        <button type="button" wire:click="reopenCollection()"
                                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <!-- Heroicon name: solid/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm4.707 3.707a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L8.414 9H10a3 3 0 013 3v1a1 1 0 102 0v-1a5 5 0 00-5-5H8.414l1.293-1.293z" clip-rule="evenodd" />
                                            </svg>
                                            Reopen Collection
                                        </button>
                                    @endif

                                </dd>
                            </div>

                            <div class="py-3 grid grid-cols-2 text-sm font-medium">
                                <dt class="text-gray-500">Pay</dt>
                                <dd class="text-gray-900">

                                    @if($invoice->is_collected && !$invoice->is_settled && $invoice->balance>0)
                                        <button type="button" wire:click="makeVendorPayment"
                                                class="mt-2 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                            </svg>
                                            Make Payment
                                        </button>

                                    @endif

                                </dd>
                            </div>

                        </dl>

                    </div>
            </section>
        </div>

        <div class="col-span-3 mt-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">

            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Collected Fishes</h3>
                <p class="mt-1 text-sm text-gray-500">View and manage items</p>
            </div>

        <ul role="list" class="divide-y divide-gray-100">
            @foreach($invoice->invoiceItems as $item)
                <li class="relative flex justify-between py-5">
                    <div class="flex gap-x-4 pr-6 sm:w-1/2 sm:flex-none">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                    {{$item->variant->name}}
                                </a>
                            </p>
                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                <a href="mailto:tom.cook@example.com" class="relative truncate hover:underline">
                                    {{$item->fish->name}}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between gap-x-4 sm:w-1/2 sm:flex-none">
                        <div class="hidden sm:block">
                            <p class="text-sm leading-6 text-gray-900">{{$item->total}}</p>
                            <div class="mt-1 flex items-center gap-x-1.5">

                                <p class="text-xs leading-5 text-gray-500">Quantity: {{$item->quantity}}</p>
                                <p class="text-xs leading-5 text-gray-500">Price: {{$item->price}}</p>

                            </div>
                        </div>

                        <svg class="h-5 w-5 flex-none text-gray-400" mlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" >
                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                        </svg>


                    </div>
                </li>

            @endforeach
        </ul>
        </div>






    </div>

</div>
