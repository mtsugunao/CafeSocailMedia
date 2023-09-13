<div>
    <!-- dsiplaying replies -->
    @if(count($comment->replies) > 0)
    @foreach($comment->replies as $reply)
    <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                            alt="Jese Leos">{{ $reply->user->name }}</p>
                <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-12"
                            title="February 12th, 2022">{{ Carbon\Carbon::parse($reply->created_at)->format('Y/m/d H:i') }}</time></p>
            </div>
            <div class="relative" x-data="{ 
                    isOpen: false}"
            >
                <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50"
                    type="button">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                        <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                    </svg>
                    <span class="sr-only" aria-hidden="true">Comment settings</span>
                </button>
                <!-- Dropdown menu -->
                <div x-show="isOpen" @click.away="isOpen = false"
                    class="absolute z-10 mt-2 w-36 bg-white rounded-lg divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700"
                        aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            @livewire('comment.edit', ['edit' => $reply, 'post' => $post, 'postId' => $reply->post->id])
                        </li>
                        <li>
                            @livewire('comment.remove', ['removableId' => $reply->id])
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Report</a>
                        </li>
                    </ul>
                </div>
            </div>
            </footer>
        @livewire('comment.update', ['comment' => $reply])
        @livewire('comment.reply', ['comment' => $reply, 'post' => $post])
    </article>
    @livewire('comment.show-reply', ['comment' => $reply, 'post' => $post])
    @endforeach
    @endif
</div>