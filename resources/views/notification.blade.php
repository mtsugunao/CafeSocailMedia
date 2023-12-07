<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 jusfify-center">
            <div class="bg-white shadow-sm sm:rounded-lg w-full lg:w-4/5 mx-auto">
                <div class="py-2">
                    @if(auth()->user()->unreadNotifications()->count() > 0)
                    <div class="flex justify-center w-full mb-2">
                        <a href="{{ route('mark-as-read') }}" class="bg-lime-500 hover:bg-lime-400 text-white font-bold py-2 px-4 border-b-4 border-lime-700 hover:border-lime-500 rounded w-1/2 text-center">Mark All as Read</a>
                    </div>
                    @endif
                    @if(auth()->check())
                    @forelse(auth()->user()->unreadNotifications()->get() as $notification)
                    <a href="{{ $notification->data['url'] }}" class="justify-between flex items-center border-b px-4 py-3 hover:bg-gray-100">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full object-cover mx-1" src="{{ isset($notification->data['user_profile']) ? image_url_profiles($notification->data['user_profile']) : asset('images/user_icon.png') }}" alt="">
                            <p class="text-slate-500 hover:text-black text-sm mx-2 items-center">
                                <span class="font-bold items-center" href="{{ $notification->data['url'] }}">{{ $notification->data['user_name']}}</span>&nbsp{{ $notification->data['title'] }}
                            </p>
                        </div>
                        <div>
                            @php
                            $diff = Carbon\Carbon::parse($notification->data['date'])->diff(now());
                            @endphp

                            @if($diff->days > 30)
                            <p class="text-slate-500 text-sm px-2">30+ days ago</p>
                            @elseif($diff->days > 0)
                            <p class="text-slate-500 text-sm px-2">{{ $diff->days }}d</p>
                            @elseif($diff->h > 0)
                            <p class="text-slate-500 text-sm px-2">{{ $diff->h }}h</p>
                            @else
                            <p class="text-slate-500 text-sm px-2">{{ $diff->i }}m</p>
                            @endif
                        </div>
                    </a>
                    @empty
                    <p class="text-slate-500 hover:text-black w-full text-center">No notifications yet</p>
                    @endforelse
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>