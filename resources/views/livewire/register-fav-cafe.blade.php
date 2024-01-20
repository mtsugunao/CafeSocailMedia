<div id="parentDiv" class="flex flex-row items-center w-full {{ isset($cafe) ? 'justify-between' : 'justify-start' }}">
    <div id="selectedCafe">
        <p class="flex gap-1 text-sm sm:text-xl text-gray-600 font-semibold"></p>
    @if(isset($cafe))
        <p id="oldCafe" class="flex gap-1 text-sm sm:text-xl text-gray-600 font-semibold"><span>{{ $cafe->name }}</span></p>
    @endif
        <input type="hidden" name="favCafe" value="{{ Auth::user()->cafe_id }}" />
    @error('favCafe')
        <x-alert.error>{{ $message}}</x-alert.error>
    @enderror
    </div>
    <div x-data="{ 'searchModelOpen' : false }" @keydown.escape="searchModelOpen = false">
        <!-- Modal toggle -->
        <button @click="searchModelOpen =!searchModelOpen" class="inline-flex items-center text-white bg-lime-500 hover:bg-lime-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-8 h-8 pr-3" viewBox="0 0 50 50">
                <path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path>
            </svg>
            <span class="hidden sm:inline">Add a favourite cafe</span>
            <span class="sm:hidden">Add cafe</span>
        </button>

        <div x-show="searchModelOpen" class="fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-on:click.away="searchModelOpen = false">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-show="searchModelOpen" x-on:click.away="searchModelOpen = false" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                    <div class="flex items-center justify-between space-x-4 mb-5">
                        <h1 class="text-xl font-medium text-gray-800 ">Search a cafe</h1>
                        <button type="button" @click="searchModelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="relative justify-center flex w-full">
                        <input type="search" wire:model="keyword" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:ring-0 focus:border-lime-400 focus:border-2 focus:text-neutral-700 focus:outline-none" placeholder="keyword..." aria-label="Search" aria-describedby="button-addon1" />
                        <!--Search button-->
                        <button type="search" wire:click.prevent="searchCafe" class="relative z-[2] flex items-center rounded-r bg-lime-500 px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-lime-700 hover:shadow-lg focus:bg-lime-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-lime-800 active:shadow-lg" type="submit" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-row justify-between w-full pt-2">
                        @if(isset($keyword))
                        <p>Searched by <span class="text-lime-600">{{ $keyword }}</span></p>
                        @endif
                        <diV class="flex justify-start">
                        <div class="sm:hidden w-full">
                        {{ $searchResults->links('vendor.pagination.resultPaginate') }}
                        </div>
                        </div>
                    </div>
                    <div>
                        @foreach ($searchResults as $searchResult)
                        <div class="flex flex-row text-left items-start justify-start py-1">
                            <a id="favCafe" data-value="{{ $searchResult->id }}" @click="searchModelOpen = false" class="flex gap-2 items-center title-font md:text-xl text-sm mb-2 font-medium text-gray-700 hover:text-gray-400">
                                <span>{{ $searchResult->name }}</span>
                            </a>
                        </div>
                        @endforeach
                        {{ $searchResults->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const $searchResultCafes = [...document.querySelectorAll('[data-value]')];
    const $selectedCafe = document.getElementById('selectedCafe');
    const $p = $selectedCafe.querySelector('p');
    const $parentDiv = document.getElementById('parentDiv');
    const $input = $selectedCafe.querySelector('input');
    const $oldCafe = document.getElementById('oldCafe');

    const handleClick = e => {
        if ($p.textContent)
            $p.textContent = '';
        if($oldCafe !== null)
            $oldCafe.innerText = '';
        $parentDiv.classList.replace('justify-start', 'justify-between');
        $input.value = e.currentTarget.getAttribute('data-value');
        $p.insertAdjacentText('beforeend', e.currentTarget.innerText.trimEnd());
    };

    // valueの比較
    // map, filter, reduce, find, findIndex, some, every
    $searchResultCafes.map(cafe => cafe.addEventListener('click', handleClick));
</script>