<div x-data="{
formValidationStatus:@entangle('formValidationStatus'),
}"

     class=""
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

    <form action="{{url("fish/$fish->id")}}" method="POST"
          enctype="multipart/form-data"

    >

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


                <div class="col-span-full">
                    <label for="fish_photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        @if ($fish_photo&& $errors->isEmpty())
                            <div class="group relative">
                                <div class=" w-28 overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 ">
                                    <img src="{{$fish_photo->temporaryUrl()}}" class="h-full w-full object-contain ">
                                </div>
                            </div>
                        @else
                            @if($fish->getFirstMedia('Fish Image'))
                                <div class="group relative">
                                    <div class=" w-28 overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 ">
                                        <img src="{{$fish->getFirstMediaUrl('Fish Image')}}"
                                             class="h-full w-full object-contain ">
                                    </div>
                                </div>
                            @else
                                <svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            @endif
                        @endif


                        <input id="fish_photo" name="fish_photo" wire:model="fish_photo" type="file" class="sr-only">
                        <button type="button"
                                @click="document.getElementById('fish_photo').click()"
                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Change
                        </button>
                    </div>
                    @error('fish_photo')
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
