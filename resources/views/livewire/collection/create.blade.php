<div
        x-data="{
formValidationStatus:@entangle('formValidationStatus'),
startCollectionModal: false
}"
>

    @if(!isset($collection))
        <div

                class=""
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
        >


            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Start Collection') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __("Enter the details to start collection day") }}
                </p>
            </header>

            <form action="{{url("collection")}}" method="POST">
                @csrf


                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


                    {{-- Location--}}
                    <div class="sm:col-span-3">
                        <label for="location" class="block text-sm font-medium text-gray-700"
                        >
                            Location <span class="text-red-900">*</span>
                        </label>
                        <div class="mt-1">
                            <input type="text" name="location"
                                   wire:model="location"
                                   id="location"
                                   class="
                            @error('location') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                        </div>

                        @error('location')
                        <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                        @enderror
                    </div>

                    {{-- Comments--}}
                    <div class="sm:col-span-3">
                        <label for="comments" class="block text-sm font-medium text-gray-700"
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


                </div>


                {{--    Validate the form. If Validation passes show modal to confirm--}}
                <div class="mt-8 flex justify-end">
                    <button wire:click="validateForm" type="button"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save
                    </button>
                </div>


                <x-confirm-create-modal title="Are you sure"
                                        subtitle="Please confirm if you would like to start the collection"/>
            </form>
        </div>
    @endif

    @if(isset($collection))
        @include('collection.partials.collection-day')
            @include('collection.partials.collection-start-modal')

    @endif
</div>
