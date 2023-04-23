<div x-data="{
formValidationStatus:@entangle('formValidationStatus'),
}"

     class="mt-2 bg-white px-6 sm:px-6 md:px-4 py-4 shadow overflow-hidden sm:rounded-lg"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Create Fishing Vessel</h1>
            <p class="mt-2 text-sm text-gray-700">Create a new fishing vessel</p>

        </div>


    </div>

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
                                   shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('name')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Contact Person--}}
                <div class="sm:col-span-3">
                    <label for="contact_person" class="block text-sm font-medium text-gray-700"
                    >
                        Contact Person <span class="text-red-900">*</span>
                    </label>
                    <div class="mt-1">
                        <input type="text" name="contact_person"
                               wire:model="contact_person"
                               id="contact_person"
                               class="
                            @error('contact_person') border border-red-500 @enderror
                                   shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('contact_person')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>

                {{-- Phone--}}
                <div class="sm:col-span-3">
                    <label for="phone" class="block text-sm font-medium text-gray-700"
                    >
                        Phone
                    </label>
                    <div class="mt-1">
                        <input type="text" name="phone"
                               wire:model="phone"
                               id="phone"
                               class="
                            @error('phone') border border-red-500 @enderror
                                   shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('phone')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Email--}}
                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700"
                    >
                        Email
                    </label>
                    <div class="mt-1">
                        <input type="text" name="email"
                               wire:model="email"
                               id="email"
                               class="
                            @error('email') border border-red-500 @enderror
                                   shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('email')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                <div class="sm:col-span-6">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Bank Information</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">This information will be used to transfer payments</p>
                </div>


                {{-- Bank Name--}}
                <div class="sm:col-span-3">
                    <label for="bank_name" class="block text-sm font-medium text-gray-700"
                    >
                        Bank Name
                    </label>
                    <div class="mt-1">
                        <input type="text" name="bank_name"
                               wire:model="bank_name"
                               id="bank_name"
                               class="
                            @error('bank_name') border border-red-500 @enderror
                                   shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('bank_name')
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
                                   shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm
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
                                   shadow-sm focus:ring-green-500 focus:border-green-500 block w-full sm:text-sm
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
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Save
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to create the fishing vessel"/>
    </form>
</div>
