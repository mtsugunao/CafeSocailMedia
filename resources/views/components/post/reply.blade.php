<div>
    @if($comment->parent_comment_id === null)
    <article class="p-3 text-base bg-white rounded-lg">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <a href="{{ route('cafeseeker', ['userId' => $comment->user->id])}}" class="inline-block items-center mr-3 text-sm text-gray-900 font-semibold"><img class="mr-2 w-6 h-6 rounded-full inline-block items-center" src="{{ isset($comment->user->profile_image) ? image_url_profiles($comment->user->profile_image) : asset('images/user_icon.png') }}" alt="{{ $comment->user->name}}">{{ $comment->user->name }}</a>
                <p class="text-sm text-gray-600 items-center"><time>{{ Carbon\Carbon::parse($comment->created_at)->format('Y/m/d H:i') }}</time></p>
            </div>
            <div class="flex w-1/6 justify-end items-center">
                <div class="relative" x-data="{ 
                        isOpen: false}">
                    <button @click="isOpen = !isOpen" x-cloak @keydown.escape="isOpen = false" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                        <span class="sr-only" aria-hidden="true">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-show="isOpen" @click.away="isOpen = false" class="absolute z-10 mt-2 w-24 bg-white rounded-lg divide-y divide-gray-100 shadow-lg">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownMenuIconHorizontalButton">
                            @if(Auth::id() === $comment->user_id)
                            <li>
                                <x-element.editModal :comment="$comment" :post="$post"></x-element.editModal>
                            </li>
                            <li>
                                <x-element.deleteModal :comment="$comment"></x-element.deleteModal>
                            </li>
                            @endif
                            <li class="mb-1 mt-1">
                                <a href="{{ route('form') }}" class="flex w-full pt-1 pb-1 px-2 items-center text-sm text-gray-500 hover:bg-gray-100 font-medium">Report</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <div class="md:flex flex-col items-start mt-2 md:mt-4">
            <a href="{{ route('cafeseeker', ['userId' => $post->user->id])}}" class="font-medium text-lime-600 no-underline md:hover:underline decoration-lime-500 md:pr-4"><span>@</span>{{ $post->user->name }}</a>
            <p class="text-gray-500 flex-col">{{ $comment->comment}}</p>
        </div>
        <x-element.modal :comment="$comment" :post="$post"></x-element.modal>
    </article>
    <x-post.nestReply :comment="$comment" :post="$post" />
    @endif
</div>