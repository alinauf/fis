<div class="py-4 ">
    @if($fishingVessel->bankAccounts->count() == 0)
        <div class="flex justify-center">
            <p class="text-gray-500">No banks found</p>
        </div>
    @else
        <ul role="list" class="divide-y divide-gray-100">
            @foreach($fishingVessel->bankAccounts as $bankAccount)
                <li class="flex items-center justify-between gap-x-6 py-5">
                    <div class="min-w-0">
                        <div class="flex items-start gap-x-3">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{$bankAccount->account_name}}</p>

                            @if($bankAccount->is_default)
                                <p class="rounded-md whitespace-nowrap mt-0.5 px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset
                                 text-green-700 bg-green-50 ring-green-600/20">
                                    Default
                                </p>
                            @endif

                        </div>
                        <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                            <p class="font-semibold whitespace-nowrap">Account Number:
                                {{$bankAccount->account_number}}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-none items-center gap-x-4">
                        @if(!$bankAccount->is_default)
                            <button wire:click="makePrimary({{$bankAccount->id}})"
                               class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Make Primary<span
                                        class="sr-only"></span></button>
                        @endif
                        <button wire:click="removeBankAccount({{$bankAccount->id}})"
                           class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Remove<span
                                    class="sr-only"></span></button>
                    </div>

                </li>
            @endforeach


        </ul>
    @endif
</div>
