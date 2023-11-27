<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 jusfify-center">
            <div class="bg-white md:overflow-auto shadow-sm sm:rounded-lg w-full lg:w-4/5 mx-auto">
                <div class="p-6 text-gray-900">
                    @if($followings->count() > 0)
                    @foreach($followings as $following)
                   <div class="flex flex-row w-full justify-start items-center mb-3">
                        <div class="flex justify-start items-center">     
                            <img class="inline-block lg:h-14 lg:w-14 h-12 w-12 lg:mx-10 mr-10 rounded-full" src="{{ isset($following->profile_image) ? image_url_profiles($following->profile_image) : asset('images/user_icon.png') }}" alt="{{ $following->name }}" />
                            <a href="{{ route('cafeseeker', ['userId' => $following->id]) }}" class="font-medium text-gray-400 md:hover:underline">{{ $following->name }}</a>
                        </div>
                        <div class="w-1/3 md:w-1/5 items-center">
                            @livewire('follow', ['user' => $following])
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="flex w-full md:justify-start justify-center">
                        <p class="text-gray-400 font-medium">You have not been following anyone yet</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>