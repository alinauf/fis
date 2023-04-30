<x-app-layout>
    <a href="{{url("")}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Invoice: {{$collection->collection_no}}-{{$invoice->id}}
        </h2>
    </a>
    <div class="py-12">
        <livewire:collection.invoice :collection="$collection" :invoice="$invoice" />

    </div>
    <x-flash-message></x-flash-message>

</x-app-layout>
