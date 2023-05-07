<x-app-layout>

    <a href="{{url("inventory")}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inventory') }}
        </h2>
    </a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <livewire:inventory.index/>
        </div>
    </div>

    <x-flash-message></x-flash-message>

</x-app-layout>
