<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <!-- Trigger for Modal -->
    <button type="button" @click="showModal = true" class="w-full bg-transparent hover:bg-lime-500 text-lime-700 font-semibold hover:text-white py-2 px-4 border border-lime-500 hover:border-transparent rounded">Area Search</button>

    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50" x-show="showModal">
        <!-- Modal inner -->
        <div class="flex container flex-col max-w-5xl pt-3 mx-auto text-left bg-white rounded shadow-lg relative h-full w-full md:w-5/6 md:h-4/5" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <header class="flex items-center justify-center relative">
                <h1 class="text-center mb-4 text-2xl font-semibold text-black max-w-none">Search By Area</h1>
                <button type="button" @click="showModal = false" class="z-50 cursor-pointer pr-2 pb-2 absolute top-0 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </header>


            <!-- content -->
            <div class="overflow-y-auto md:pb-3 pb-15">
                <form action="{{ route('cafe.search.province') }}" method="GET" id="province">
                    @csrf
                    <div>
                        <h2 class="text-center mb-4 text-xl font-semibold text-gray-900 dark:text-white">Canada</h2>
                        <!-- Canada content -->
                        <ul class="flex flex-wrap justify-start items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg lg:flex-row dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <!-- Checkbox -->
                            @foreach($caProvince as $index => $province)
                            <li class="w-1/4 lg:w-1/5 px-5 border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="{{ $ca[$index] }}" name="canada[]" type="checkbox" value="{{ $province }}" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="{{ $ca[$index] }}" class="w-full py-3 ml-2 text-sm md:text-lg font-medium text-gray-900 dark:text-gray-300">{{ $province }}</label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <h2 class="text-center mb-4 font-semibold text-xl text-gray-900 dark:text-white">USA</h2>
                        <!-- USA content -->
                        <ul class="flex flex-wrap justify-start items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg lg:flex-row dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <!-- Checkbox -->
                            @foreach($usStates as $index => $state)
                            <li class="w-1/4 lg:w-1/5 px-5 border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    <input id="{{ $us[$index] }}" name="canada[]" type="checkbox" value="{{ $state }}" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="{{ $us[$index] }}" class="w-full py-3 ml-2 text-sm md:text-lg font-medium text-gray-900 dark:text-gray-300">{{ $state }}</label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </form>
            </div>

            <button form="province" type="submit" class="items-center w-full md:h-12 border border-green-500 bg-green-500 py-2.5 text-center text-xl font-medium text-white shadow-sm transition-all
                    hover:border-green-700 hover:bg-green-700 focus:ring focus:ring-green-200 disabled:cursor-not-allowed disabled:border-green-300 disabled:bg-green-300">
                Search
            </button>
        </div>
    </div>
</div>