<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full flex sm:flex-row flex-col justify-center sm:justify-start items-center mb-5">
                        <div class="sm:mb-0 mb-3">
                            <img class="inline-block lg:h-14 lg:w-14 h-12 w-12 lg:mx-10 mr-10 rounded-full" src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png" alt="" />
                            <p class="inline-block text-xl font-bold">{{ Auth::user()->name }}</p>
                        </div>
                        @php
                        $followingUsers = Auth::user()->follows->count();
                        $followers = Auth::user()->followers->count();
                        @endphp
                        <div class="px-5 sm:px-10">
                            <a href="#" class="inline-block font-semibold items-center">{{ $followingUsers }}&nbsp;<span class="text-gray-400">following</span></a>
                            <a href="#" class="px-5 sm:px-10 inline-blcok font-semibold items-center">{{ $followers }}&nbsp;<span class="text-gray-400">followers</span></a>
                        </div>
                    </div>
                    <div class="mb-5">
                        <x-post.list :posts="Auth::user()->getPaginate()"></x-post.list>
                    </div>
                    {{ Auth::user()->getPaginate()->links('vendor.pagination.tailwindPagination') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
