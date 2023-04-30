<form action="{{url("collection/$collection->id/start")}}" method="POST">
    @csrf

    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="startCollectionModal" aria-labelledby="modal-title"
     role="dialog"
     aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"

             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"

             aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"

                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"


                class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5 13l4 4L19 7"/>
                    </svg>

                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Start Collection
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Select the collection vessel and create collection invoice
                        </p>
                    </div>

                    <div class="mt-2">
                        <label for="collection_vessel" class=" text-left block text-sm font-medium text-gray-700">Collection Vessel</label>
                        <select id="collection_vessel" name="collection_vessel"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="">Select Collection Vessel</option>
                            @foreach($collectionVessels as $collectionVessel)
                                <option value="{{ $collectionVessel->id }}">{{ $collectionVessel->name }}</option>
                            @endforeach
                        </select>
                        @error('collection_vessel') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>


                    <div class="mt-2">
                        <label for="fishing_vessel" class="block text-left text-sm font-medium text-gray-700">Fishing Vessel</label>
                        <select id="fishing_vessel" name="fishing_vessel"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <option value="">Select Fishing Vessel</option>
                            @foreach($fishingVessels as $fishingVessel)
                                <option value="{{ $fishingVessel->id }}">{{ $fishingVessel->name }}</option>
                            @endforeach
                        </select>
                        @error('fishing_vessel') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>




                </div>
            </div>
            <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent
                            shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:col-start-2 sm:text-sm">
                    Submit
                </button>

                <button type="button" @click="startCollectionModal=false"
                        class="mt-3 w-full inline-flex justify-center rounded-md border
                            border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700
                            hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0
                            sm:col-start-1 sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
</form>





