<div x-data="{
formValidationStatus:@entangle('formValidationStatus'),
}"

     class="overflow-hidden"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>



    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Create Fishing Vessel') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Create a new fishing vessel") }}
        </p>
    </header>

    <form action="{{url("fishing-vessel")}}" method="POST">
        @csrf

        <div class="">
            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


                {{-- Name--}}
                <div class="sm:col-span-3">
                    <label for="name" class="block text-sm font-medium text-gray-700"
                    >
                        Name <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="name"
                               wire:model="name"
                               id="name"
                               class="
                            @error('name') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Vendor Name--}}
                <div class="sm:col-span-3">
                    <label for="vendor_id" class="block text-sm font-medium leading-6 text-gray-900">Vendor </label>
                    <div class="mt-2">
                        <select id="vendor_id" name="vendor_id"
                                wire:model="vendor_id"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option selected >Select a vendor</option>

                        @foreach($vendors as $vendor)
                                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('vendor_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                <div class="sm:col-span-6">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Bank Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be used to transfer
                        payments</p>
                </div>

                {{-- Bank Name--}}
                <div class="sm:col-span-4">
                    <label for="bank_id" class="block text-sm font-medium leading-6 text-gray-900">Bank </label>
                    <div class="mt-2">
                        <select id="bank_id" name="bank_id"
                                wire:model="bank_id"
                                class="block
                                  @error('bank_id') border border-red-500 @enderror
                                 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option selected >Select a bank</option>

                        @foreach($banks as $bank)
                                <option value="{{$bank->id}}">{{$bank->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('bank_id')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Account Name--}}
                <div class="sm:col-span-3">
                    <label for="account_name" class="block text-sm font-medium text-gray-700"
                    >
                        Account Name
                    </label>
                    <div class="mt-1">
                        <input type="text" name="account_name"
                               wire:model="account_name"
                               id="account_name"
                               class="
                            @error('account_name') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('account_name')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Account Number--}}
                <div class="sm:col-span-3">
                    <label for="account_number" class="block text-sm font-medium text-gray-700"
                    >
                        Account Number
                    </label>
                    <div class="mt-1">
                        <input type="text" name="account_number"
                               wire:model="account_number"
                               id="account_number"
                               class="
                            @error('account_number') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('account_number')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


            </div>
        </div>

        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Save
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to create the fishing vessel"/>
    </form>
</div>
