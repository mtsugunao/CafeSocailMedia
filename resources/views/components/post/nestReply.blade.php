@if(count($comment->replies) > 0)
@foreach($comment->replies as $reply)
<article class="py-6 px-3 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg">
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold"><img class="mr-2 w-6 h-6 rounded-full" src="{{ isset($post->user->profile_image) ? image_url_profiles($post->user->profile_image) : asset('images/user_icon.png') }}" alt="{{ $reply->user->name }}">{{ $reply->user->name }}</p>
            <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-12" title="February 12th, 2022">{{ Carbon\Carbon::parse($reply->created_at)->format('Y/m/d H:i') }}</time></p>
        </div>
        <div class="flex w-1/6 justify-start items-center mr-2">
            <div class="relative" x-data="{ isOpen: false}">
                <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                    <span class="sr-only" aria-hidden="true">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 mt-2 w-24 bg-white rounded-lg divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownMenuIconHorizontalButton">
                        @if(Auth::id() === $reply->user_id)
                        <li>
                            <x-element.editModal :comment="$reply" :post="$post"></x-element.editModal>
                        </li>
                        <li>
                        <x-element.deleteModal :comment="$reply"></x-element.deleteModal>
                        </li>
                        @endif
                        <li class="mt-1 mb-1">
                            <a href="{{ route('form') }}" class="flex w-full pt-1 pb-1 px-2 items-center text-sm text-gray-500 hover:bg-gray-100 font-medium">Report</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <div class="flex items-center mt-4 space-x-4">
        @php
        $parentId = $reply->parent_comment_id;
        $userId = App\Models\Comment::where('id', $parentId)->firstOrFail();
        $name = App\Models\User::where('id', $userId->user_id)->firstOrFail();
        @endphp
        <p class="flex-col"><span>@&nbsp;</span>{{ $name->name }}</p>
        <p class="text-gray-500">{{ $reply->comment}}</p>
    </div>
    <x-element.modal :comment="$reply" :post="$post"></x-element.modal>
</article>
@if(count($reply->replies) > 0)
<x-post.nestReply :comment="$reply" :post="$post" />
@endif
@endforeach
@endif