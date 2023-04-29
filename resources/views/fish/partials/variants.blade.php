

<header>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Variants') }}
    </h2>
</header>

<div class=" overflow-hidden">
    <div class="py-4 ">
        @if($fish->variants->count() == 0)
            <div class="flex justify-center">
                <p class="text-gray-500">No variants found</p>
            </div>
        @else

            <ul role="list" class="divide-y divide-gray-100">
                @foreach($fish->variants as $variant)
                    <li class="flex items-center justify-between gap-x-6 py-5">
                        <div class="min-w-0">
                            <div class="flex items-start gap-x-3">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{$variant->name}}</p>
                            </div>
                            <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                                <p class="font-semibold whitespace-nowrap">Price:
                                    MVR {{number_format($variant->price,2)}}</p>
                                <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                                    <circle cx="1" cy="1" r="1"/>
                                </svg>
                                <p class="truncate">Unit: {{$variant->is_weight_unit ? 'weight' : 'quantity'}}</p>
                            </div>
                        </div>
                        <div class="flex flex-none items-center gap-x-4">
                            <a href="#"
                               class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Edit<span
                                        class="sr-only"></span></a>
                            <a href="#"
                               class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Remove<span
                                        class="sr-only"></span></a>

                        </div>
                    </li>
                @endforeach


            </ul>

        @endif


    </div>
</div>
