<div x-data="{}"

     class=" "
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
>

    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Edit Bank') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update bank name") }}
        </p>
    </header>

    <form action="{{url("bank/$bank->id")}}" method="POST">
        @method('PUT')
        @csrf


        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            {{-- Name--}}
            <div class="sm:col-span-3">
                <label for="name" class="block text-sm font-medium text-gray-700"
                >
                    Name <span class="text-red-900">*</span>
                </label>
                <div class="mt-1">
                    <input type="text" name="name"
                           id="name"
                           value="{{$bank->name}}"
                           class="
                            @error('name') border border-red-500 @enderror
                                   shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm
                                   border-gray-300 rounded-md">
                </div>

                @error('name')
                <p class="mt-2 text-sm text-red-600">{{$message}}</p>
                @enderror
            </div>


        </div>


        <div class="mt-8 flex justify-end">
            <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent
                    shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-700
                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Save
            </button>
        </div>


        <x-confirm-create-modal title="Are you sure"
                                subtitle="Please confirm if you would like to update the bank"/>
    </form>
</div>
