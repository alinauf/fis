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
            {{ __('Edit Fish') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Edit a new fish item") }}
        </p>
    </header>

    <form action="{{url("fish/$fish->id")}}" method="POST">
        @method('PUT')
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

                {{-- Scientific Name--}}
                <div class="sm:col-span-3">
                    <label for="scientific_name" class="block text-sm font-medium text-gray-700"
                    >
                        Scientific Name
                    </label>
                    <div class="mt-1">
                        <input type="text" name="scientific_name"
                               wire:model="scientific_name"
                               id="scientific_name"
                               class="
                            @error('scientific_name') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('scientific_name')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


                {{-- Description--}}
                <div class="sm:col-span-3">
                    <label for="des" class="block text-sm font-medium text-gray-700"
                    >
                        Description
                    </label>
                    <div class="mt-1">
                        <input type="text" name="description"
                               wire:model="description"
                               id="description"
                               class="
                            @error('description') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                    </div>

                    @error('description')
                    <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                    @enderror
                </div>


            </div>
        </div>

        {{--    Validate the form. If Validation passes show modal to confirm--}}
        <div class="mt-8 flex justify-end">
            <button wire:click="validateForm" type="button"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Update
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to update the fish"/>
    </form>
</div>
