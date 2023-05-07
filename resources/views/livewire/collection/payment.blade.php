<div x-data="{
formValidationStatus:@entangle('formValidationStatus'),
}"

     class=" "
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Make Vendor Payment') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Add payment details and settle") }}
        </p>
    </header>

    <form action="{{url("collection/$collection->id/invoice/$invoice->id/payment")}}"
          enctype="multipart/form-data"

          method="POST">
        @csrf


        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="amount" class="block text-sm font-medium text-gray-700"
                >
                    Amount (MVR) <span class="text-red-900">*</span>
                </label>
                <div class="mt-1">
                    <input type="text" name="amount"
                           wire:model="amount"
                           id="amount"
                           class="
                            @error('amount') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                </div>

                @error('amount')
                <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                @enderror
            </div>



            {{-- Comments--}}
            <div class="sm:col-span-3">
                <label for="des" class="block text-sm font-medium text-gray-700"
                >
                    Comments
                </label>
                <div class="mt-1">
                    <input type="text" name="comments"
                           wire:model="comments"
                           id="comments"
                           class="
                            @error('comments') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                </div>

                @error('comments')
                <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                @enderror
            </div>

            <div class=" sm:col-span-3">
                <label class="text-base font-semibold text-gray-900">Payment Type</label>
                <p class="text-sm text-gray-500">Is the payment made in cash or through bank transfer</p>
                <fieldset class="mt-4">

                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input id="bank_transfer" name="payment_type" wire:model="payment_type"
                                   value="bank_transfer"
                                   type="radio" checked
                                   class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600">
                            <label for="bank_transfer" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Bank Transfer</label>
                        </div>
                        <div class="flex items-center">
                            <input id="cash"
                                   value="cash"
                                   name="payment_type" wire:model="payment_type" type="radio"
                                   class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-600">
                            <label for="cash"
                                   class="ml-3 block text-sm font-medium leading-6 text-gray-900">Cash</label>
                        </div>
                    </div>
                </fieldset>
            </div>


            <div class="sm:col-span-3">
                <label for="payment_image" class="block text-sm font-medium leading-6 text-gray-900">Payment Receipt</label>
                <div class="mt-2 flex items-center gap-x-3">
                    @if ($payment_image&& $errors->isEmpty())
                        <div class="group relative">
                            <div class=" w-28 overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 ">
                                <img src="{{$payment_image->temporaryUrl()}}" class="h-full w-full object-contain ">
                            </div>
                        </div>
                    @endif
                    <input id="payment_image" name="payment_image" wire:model="payment_image" type="file" class="sr-only">
                    <button type="button"
                            @click="document.getElementById('payment_image').click()"
                            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Upload
                    </button>
                </div>
                @error('payment_image')
                <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                @enderror
            </div>


        </div>


        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Pay
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to confirm the payment"/>
    </form>
</div>
