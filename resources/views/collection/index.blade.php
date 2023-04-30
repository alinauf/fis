<x-app-layout>

    <a href="{{url("collection")}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Collection') }}
        </h2>
    </a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <livewire:collection.create />
            </div>

            <livewire:collection.index />

        </div>
    </div>

    <x-flash-message></x-flash-message>

</x-app-layout>
