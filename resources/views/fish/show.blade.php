<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('fish.partials.fish-information')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('fish.partials.variants')
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <livewire:fish.variant.create :fish="$fish"/>
            </div>
        </div>
    </div>
    <x-flash-message></x-flash-message>

</x-app-layout>
