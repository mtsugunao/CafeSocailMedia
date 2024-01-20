<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full flex sm:flex-row flex-col justify-center sm:justify-start items-center mb-5">
                        <div class="sm:mb-0 mb-3">
                            <img class="inline-block lg:h-14 lg:w-14 h-12 w-12 lg:mx-10 mr-10 rounded-full" src="{{ isset(Auth::user()->profile_image) ? image_url_profiles(Auth::user()->profile_image) : asset('images/user_icon.png') }}" alt="" />
                            <p class="inline-block text-xl font-bold">{{ Auth::user()->name }}</p>
                        </div>
                        @php
                        $followingUsers = Auth::user()->follows->count();
                        $followers = Auth::user()->followers->count();
                        @endphp
                        <div class="px-5 sm:px-10">
                            <a href="{{ route('dashboard.followings') }}" class="inline-block font-semibold items-center">{{ $followingUsers }}&nbsp;<span class="text-gray-400">following</span></a>
                            <a href="{{ route('dashboard.followers') }}" class="px-5 sm:px-10 inline-blcok font-semibold items-center">{{ $followers }}&nbsp;<span class="text-gray-400">followers</span></a>
                        </div>
                    </div>
                    @php
                    if(isset(Auth::user()->cafe_id))
                    $cafe = App\Models\Cafe::where('id', Auth::user()->cafe_id)->firstOrFail();
                    @endphp
                        <div class="flex flex-col items-center justify-start space-y-2 w-ful lg:px-10">
                            <div class="flex flex-row justify-start w-full items-center">
                                <span class="text-sm sm:text-lg text-gray-600 pr-5">Favourite Cafe</span>
                                @if(isset($cafe))    
                                <a href="{{ route('cafe.detail.show', ['cafeId' => $cafe->id]) }}" class="w-1/2 sm:w-2/3 text-base hover:text-gray-400">{{ $cafe->name }}</a>
                                @endif
                                </p>
                            </div>
                            <div class="flex flex-row justify-start w-full items-center">
                                <span class="text-sm sm:text-lg text-gray-600 pr-5">Favourite Drink</span>
                                <span class="w-1/2 sm:w-2/3">{{ Auth::user()->favDrink }}</span>
                            </div>
                            <div class="flex flex-row justify-start items-start sm:items-center w-full">
                                <span class="text-sm sm:text-lg text-gray-600 pr-5">About Yourself!</span>
                                <span class="w-1/2 sm:w-2/3">{{ Auth::user()->aboutYou }}</span>
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
