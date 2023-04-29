<x-app-layout>

    <a href="{{url("settings")}}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <main class=" lg:flex-auto ">
                    <div class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
                        {{--                        <div>--}}
                        {{--                            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>--}}
                        {{--                            <p class="mt-1 text-sm leading-6 text-gray-500">This information will be displayed publicly--}}
                        {{--                                so be careful what you share.</p>--}}

                        {{--                            <dl class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">--}}
                        {{--                                <div class="pt-6 sm:flex">--}}
                        {{--                                    <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">Full name</dt>--}}
                        {{--                                    <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">--}}
                        {{--                                        <div class="text-gray-900">Tom Cook</div>--}}
                        {{--                                        <button type="button"--}}
                        {{--                                                class="font-semibold text-blue-600 hover:text-blue-500">Update--}}
                        {{--                                        </button>--}}
                        {{--                                    </dd>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="pt-6 sm:flex">--}}
                        {{--                                    <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">Email address--}}
                        {{--                                    </dt>--}}
                        {{--                                    <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">--}}
                        {{--                                        <div class="text-gray-900">tom.cook@example.com</div>--}}
                        {{--                                        <button type="button"--}}
                        {{--                                                class="font-semibold text-blue-600 hover:text-blue-500">Update--}}
                        {{--                                        </button>--}}
                        {{--                                    </dd>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="pt-6 sm:flex">--}}
                        {{--                                    <dt class="font-medium text-gray-900 sm:w-64 sm:flex-none sm:pr-6">Title</dt>--}}
                        {{--                                    <dd class="mt-1 flex justify-between gap-x-6 sm:mt-0 sm:flex-auto">--}}
                        {{--                                        <div class="text-gray-900">Human Resources Manager</div>--}}
                        {{--                                        <button type="button"--}}
                        {{--                                                class="font-semibold text-blue-600 hover:text-blue-500">Update--}}
                        {{--                                        </button>--}}
                        {{--                                    </dd>--}}
                        {{--                                </div>--}}
                        {{--                            </dl>--}}
                        {{--                        </div>--}}

                        <div>
                            <h2 class="text-base font-semibold leading-7 text-gray-900">Bank</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-500">Create Bank which would be used</p>

                            @if($banks->count() > 0)
                                <ul role="list"
                                    class="mt-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6">
                                    @foreach($banks as $bank)
                                        <li class="flex justify-between gap-x-6 py-6">
                                            <div class="font-medium text-gray-900">{{$bank->name}}</div>
                                            <a href="{{route('bank.edit', $bank->id)}}"
                                                    class="font-semibold text-blue-600 hover:text-blue-500">
                                                Update
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif


                            <div class="flex border-t border-gray-100 pt-6">
                                <a href="{{route('bank.create')}}"
                                   class="text-sm font-semibold leading-6 text-blue-600 hover:text-blue-500">
                                    <span aria-hidden="true">+</span> Add another bank
                                </a>
                            </div>
                        </div>


                    </div>
                </main>
            </div>
        </div>
    </div>


</x-app-layout>
