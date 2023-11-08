<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <div class="flex items-center mt-4 space-x-4">
        <button type="button" @click="showModal = true" class="flex items-center text-sm text-gray-500 hover:underline font-medium">
            <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
            </svg>
            Reply
        </button>
    </div>
    <!-- Modal logic -->
    <div class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50" x-show="showModal">
        <div class="max-w-5xl py-3 mx-auto text-left bg-white rounded shadow-lg relative w-full h-full sm:w-2/3 md:w-1/2 sm:h-auto" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <header class="flex items-center justify-center relative">
                <h1 class="text-center m-10 md:mb-4 sm:text-4xl text-3xl font-semibold text-black max-w-none">Reply</h1>
                <button type="button" @click="showModal = false" class="z-50 cursor-pointer pr-2 pb-2 absolute top-0 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </header>

            <div class="relative">
                <form action="{{ route('post.reply.create', ['postId' => $post->id, 'commentId' => $comment->id]) }}" method="post">
                    @csrf
                    @if (session('success'))
                    <x-alert.success>{{ session('success') }}</x-alert.success>
                    @endif
                    <div class="p-3">
                        <div class="flex justify-end p-3 items-center">
                            <p class="flex"><span class="charCount">255</span>&nbsp;words left</p>
                        </div>
                        <div class="pb-10 px-3">
                            <textarea name="reply" rows="6" class="myTextarea px-2 w-full text-sm text-gray-900 border-1 rounded-lg border-gray-50 focus:ring-lime-500 focus:border-lime-500 focus:ring-0 focus:outline-none" placeholder="To {{ $comment->user->name }}"></textarea>
                        </div>
                        <div class="flex justify-center items-center space-x-2">
                            <button type="submit" class="mx-auto text-xl md:h-12 h-14 font-medium text-center text-white bg-lime-500 hover:bg-lime-700 rounded-lg focus:ring-4 focus:ring-primary-200 sm:w-3/5 w-full">
                                Reply
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>