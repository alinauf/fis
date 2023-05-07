<div>
    @if (session()->has('success'))

        <div x-data="{ successMessageShow: @entangle('successMessageShow') }"

             x-init="setTimeout(() => successMessageShow = false, 1000)"
             x-show="successMessageShow"


             aria-live="assertive"
             class="fixed z-50 inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">

                <div


                        x-transition:enter="transform ease-out duration-300 transition"
                        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                        x-transition:leave="transition ease-in duration-100"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"


                        class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/check-circle -->
                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">
                                    Successfully saved!
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
                                    {{session('success')}}
                                </p>
                            </div>
                            <div class="ml-4 flex-shrink-0 flex">
                                <button @click="successMessageShow=false"
                                        class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Close</span>
                                    <!-- Heroicon name: solid/x -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{session()->forget('success')}}
    @endif

    <div class="max-w-full mx-auto sm:px-6 lg:px-8 grid sm:grid-cols-3  gap-x-4 gap-y-6 ">


        <div class="col-span-2 p-4 sm:py-6 sm:px-8 bg-white  sm:rounded-lg">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Add Invoice Items</h3>
                <p class="mt-1 text-sm text-gray-500">Select the items to add to the invoice</p>
            </div>

            <div class="grid grid-cols-6 gap-6 ">

                <div class="sm:col-span-6 ">
                    <label for="txCode" class="block text-sm font-medium text-gray-700">
                        Code</label>
                    <input type="search" name="variantSearch" wire:model="variantSearch" id="variantSearch"
                           @if($invoice->is_settled || $invoice->is_collected) disabled @endif
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
                    <input type="text" id="amount" wire:model="variantAmount"
                           @if($invoice->is_settled || $invoice->is_collected) disabled
                           @endif
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" min="1" wire:model="quantity"
                           @if($invoice->is_settled || $invoice->is_collected) disabled @endif
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>


                <div class="col-span-6 sm:col-span-3">
                    <label class="text-base font-semibold text-gray-900">Fish Type</label>
                    <p class="text-sm text-gray-500">Is the fish frozen or alive</p>
                    <fieldset class="mt-4">
                        <legend class="sr-only">Fish Type</legend>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <input id="frozen" name="fish_type" wire:model="fish_type"
                                       value="frozen"
                                       @if($invoice->is_settled || $invoice->is_collected) disabled @endif
                                       type="radio" checked
                                       class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600">
                                <label for="frozen" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Frozen</label>
                            </div>
                            <div class="flex items-center">
                                <input id="live"
                                       value="alive"
                                       @if($invoice->is_settled || $invoice->is_collected) disabled @endif
                                       name="fish_type" wire:model="fish_type" type="radio"
                                       class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600">
                                <label for="live"
                                       class="ml-3 block text-sm font-medium leading-6 text-gray-900">Alive</label>
                            </div>
                        </div>
                    </fieldset>
                </div>


            </div>

            <div class="flex justify-end ">
                <button type="button" wire:click="storeInvoiceItem"
                        @if($invoice->is_settled || $invoice->is_collected) disabled @endif
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white
                      @if($invoice->is_settled || $invoice->is_collected) bg-gray-600 hover:bg-gray-700 focus:ring-gray-500 @else
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


        <!-- Invoice Details -->
        <div class="col-span-1 ">
            <div class=" p-8  rounded-lg  bg-white ">

                <div class="max-w-full">
                    <h1 class="text-xl font-bold tracking-tight text-gray-900 "> Collection Details </h1>
                </div>

                <dl class="mt-4 space-y-6 border-t border-gray-200 px-2 py-6 ">

                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Invoice No</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            {{$collection->collection_no}}-{{$invoice->id}}
                        </dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm"> Date</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            {{$invoice->created_at->format('d M Y h:i A')}}
                        </dd>
                    </div>

                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Collection Vessel</dt>
                        <dd class="text-sm font-medium text-gray-900">{{$invoice->collectionVessel->name}}</dd>
                    </div>

                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Fishing Vessel</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            {{$invoice->fishingVessel->name}}
                        </dd>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <dt class="text-sm">Status</dt>
                        <dd class="text-base font-medium text-gray-900">
                            @if($invoice->is_collected)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  Collected
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                  Not Collected
                                </span>
                            @endif
                        </dd>
                    </div>

                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Payment</dt>
                        <dd class="text-base font-medium text-gray-900">
                            @if($invoice->is_settled)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Settled
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                  Not Settled
                                </span>
                            @endif
                        </dd>
                    </div>
                    @if($invoice->is_settled)
                        <div class="flex items-center justify-between">
                            <dt class="text-sm">Payment Reference</dt>
                            <dd class="text-sm font-medium text-gray-900">
                                {{$invoice->payment_reference}}
                                @if($invoice->getFirstMediaUrl('Payment Image'))
                                    -
                                    <a
                                            href="{{$invoice->getFirstMediaUrl('Payment Image')}}"
                                            download>
                                <span class="text-blue-900">

                                    Download
                                </span>
                                    </a>
                                @endif
                            </dd>
                        </div>
                    @endif


                    @if($invoice->is_collected && !$invoice->is_settled)

                        <div class="flex justify-end text-sm font-medium sm:mt-4">
                            <button type="button" wire:click="reopenCollection()"
                                    class="text-blue-600 hover:text-blue-500">
                                Re-open for collection?
                            </button>
                        </div>
                    @endif


                </dl>


            </div>
        </div>

        {{--Collected Fishes--}}
        <div class="col-span-2 rounded-lg bg-white ">
            <div class="max-w-full py-8 px-8 lg:pb-24">
                <div class="max-w-xl">
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Collected Fishes </h1>
                    <p class="mt-2 text-sm text-gray-500">View and manage collected Items</p>
                </div>

                <div class="mt-16">
                    <h2 class="sr-only">Collected Fishes</h2>

                    <div class="space-y-20">
                        <div>
                            <table class="mt-4 w-full text-gray-500 sm:mt-6">
                                <caption class="sr-only">
                                    Products
                                </caption>
                                <thead class="sr-only text-left text-sm text-gray-500 sm:not-sr-only">
                                <tr>
                                    <th scope="col" class="py-3 pr-8 font-normal sm:w-2/5 lg:w-1/3">Item</th>
                                    <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Status</th>
                                    <th scope="col" class="hidden w-1/5 py-3 pr-8 font-normal sm:table-cell">Price</th>
                                    <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Quantity</th>
                                    <th scope="col" class="hidden py-3 pr-8 font-normal sm:table-cell">Total</th>
                                    <th scope="col" class="w-0 py-3 text-right font-normal"></th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 border-b border-gray-200 text-sm sm:border-t">

                                @foreach($invoice->invoiceItems as $item)
                                    <tr>
                                        <td class="py-6 pr-8">
                                            <div class="flex items-center">

                                                @if($item->fish->getFirstMediaUrl('Fish Image'))
                                                    <img src="{{$item->fish->getFirstMediaUrl('Fish Image')}}"
                                                         class="mr-6 h-16 w-16 rounded object-contain object-center">
                                                @endif
                                                <div>
                                                    <div class="font-medium text-gray-900">{{$item->variant->name}}</div>
                                                    <div class="font-medium text-gray-500">{{$item->fish->name}}</div>


                                                    <div class="mt-1 sm:hidden">{{$item->price}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">{{$item->is_frozen ? 'Frozen': 'Alive'}}</td>

                                        <td class="hidden py-6 pr-8 sm:table-cell">{{$item->price}}</td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">{{$item->quantity}}</td>
                                        <td class="hidden py-6 pr-8 sm:table-cell">{{$item->total}}</td>

                                        <td class="whitespace-nowrap py-6 text-right font-medium">
                                            @if(!$invoice->is_settled && !$invoice->is_collected)
                                                <button wire:click="removeInvoiceItem({{$item->id}})"
                                                        class="text-red-800">
                                                    <span class="hidden lg:inline">Remove</span>
                                                </button>
                                            @endif

                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- Order summary -->
        <div class="col-span-1 ">


            <div class=" p-8  rounded-lg  bg-white shadow-sm">

                <div class="max-w-full">
                    <h1 class="text-xl font-bold tracking-tight text-gray-900 "> Order Summary </h1>
                </div>

                <dl class="mt-4 space-y-6 border-t border-gray-200 px-2 py-6 ">

                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Total</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            MVR {{$invoice->paid ? number_format($invoice->total, 2) : '-'}}
                        </dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm">Paid</dt>
                        <dd class="text-sm font-medium text-gray-900">MVR
                            {{$invoice->paid ? number_format($invoice->paid, 2) : '-'}}
                        </dd>
                    </div>
                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <dt class="text-base font-medium">To be paid</dt>
                        <dd class="text-base font-medium text-gray-900">
                            MVR
                            {{$invoice->balance ? number_format($invoice->balance, 2) : '-'}}
                        </dd>
                    </div>

                    @if($invoice->is_collected && !$invoice->is_settled)

                        <div class="flex justify-end text-sm font-medium sm:mt-4">
                            <button type="button" wire:click="reopenCollection()"
                                    class="text-blue-600 hover:text-blue-500">
                                Re-open for collection?
                            </button>
                        </div>
                    @endif


                </dl>

                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">

                    @if($invoice->is_collected && !$invoice->is_settled && $invoice->balance>0)
                        <div class="w-full rounded-md border border-transparent text-center  bg-green-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                            <a href="{{url("collection/$collection->id/invoice/$invoice->id/payment")}}"
                               class="text-center ">
                                Make Payment
                            </a>
                        </div>

                    @endif

                    @if(!$invoice->is_collected && !$invoice->is_settled && $invoice->balance>0)
                        <button type="button"
                                wire:click="settleCollection"
                                class="w-full rounded-md border border-transparent bg-blue-600 px-4 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-50">
                            Confirm Collection
                        </button>
                    @endif

                </div>


            </div>
        </div>

    </div>

</div>
