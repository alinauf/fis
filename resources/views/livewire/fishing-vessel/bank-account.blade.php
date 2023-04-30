<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Bank Accounts') }}
        </h2>
    </header>

    <div class=" ">
        @include('fishing-vessel.partials.bank-accounts')

        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

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

        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Save
            </button>
        </div>


    </div>

</div>
