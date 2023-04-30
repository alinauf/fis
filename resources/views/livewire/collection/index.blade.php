<div >

    <div class="">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Collections</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all Collections in the system</p>
                <div class="mt-1 flex-1">
                    {{--Datatable Search Box--}}
                    <x-search-datatable placeholder="Search Collection Invoices"></x-search-datatable>
                </div>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Collection ID</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Invoice ID</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Vessel</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Is Collected</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Is Settled</th>

                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Manage</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($invoices as $invoice)

                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{$invoice->collection->collection_no}}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                         {{$invoice->collection->collection_no}}-{{$invoice->id}}
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{$invoice->fishingVessel->name}}
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{$invoice->total}}
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($invoice->is_collected)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Collected
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Not Collected
                                            </span>
                                        @endif
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($invoice->is_settled)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Settled
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Not Settled
                                            </span>
                                        @endif
                                    </td>


                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{url("collection/".$invoice->collection->id."/invoice/".$invoice["id"])}}" class="text-blue-600 hover:text-blue-900">View</a>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="mt-8">
                        {{$invoices->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <x-flash-message></x-flash-message>

</div>
