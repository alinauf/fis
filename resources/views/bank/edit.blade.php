<x-app-layout>

    <a href="{{url("settings")}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('bank.partials.edit-bank')
            </div>
        </div>
    </div>
</x-app-layout>
