<div class="flex">
    <div x-data="{ dropdownOpen: false }" class="relative items-center">
        <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 inline-flex justify-center items-center px-5 h-full">
            <svg class="flex-shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
                <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
            </svg>
            @if(auth()->user()->unreadNotifications()->count() > 0 && auth()->user()->unreadNotifications()->count() < 99) <span class="absolute top-0 end-6 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-red-500 text-white">{{ auth()->user()->unreadNotifications()->count() }}</span>
                @elseif(auth()->user()->unreadNotifications()->count() > 99)
                <span class="absolute top-0 end-5 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-red-500 text-white">99+</span>
                @endif
        </button>

        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

        <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
            <div class="py-2">
                @if(auth()->user()->unreadNotifications()->count() > 0)
                <button type="button" wire:click="markAsRead" class="bg-lime-500 hover:bg-lime-400 text-white font-bold py-2 px-4 border-b-4 border-lime-700 hover:border-lime-500 rounded w-full text-center">Mark All as Read</button>
                @endif
                @if(auth()->check())
                @forelse(auth()->user()->unreadNotifications()->take(5)->get() as $notification)
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
            @if(auth()->user()->unreadNotifications()->count() > 5)
            <a href="{{ route('notifications')}}" class="block bg-gray-800 text-white text-center font-bold py-2">See all notifications</a>
            @endif
        </div>
    </div>
</div>