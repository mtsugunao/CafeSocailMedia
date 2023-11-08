<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <div class="flex items-center mt-1 mb-1 space-x-4">
        <button type="button" @click="showModal = true" class="flex justify-between w-full pt-1 pb-1 px-2 items-center text-sm text-gray-500 hover:bg-gray-100 font-medium">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden md:flex">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
            <sapn class="flex">Edit</sapn>
        </button>
    </div>
    <!-- Modal logic -->
    <div class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50" x-show="showModal">
        <div class="max-w-5xl py-3 mx-auto text-left bg-white rounded shadow-lg relative w-full h-full sm:w-2/3 md:w-1/2 sm:h-auto" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <header class="flex items-center justify-center relative">
                <h1 class="text-center m-10 md:mb-4 md:text-4xl text-3xl font-semibold text-black max-w-none">Edit</h1>
                <button type="button" @click="showModal = false" class="z-50 cursor-pointer pr-2 pb-2 absolute top-0 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </header>

            <div class="relative">
                <form action="{{ route('post.reply.put', ['postId' => $post->id, 'commentId' => $comment->id]) }}" method="post">
                @method('PUT')
                    @csrf
                    @if (session('success'))
                    <x-alert.success>{{ session('success') }}</x-alert.success>
                    @endif
                    <div class="p-3">
                        <div class="flex justify-end p-3 items-center">
                        <?php
                            $str = Str::length($comment->comment);
                            $len = 255 - (int)$str;
                        ?>
                            <p class="flex"><span class="charCount">{{ $len }}</span>&nbsp;words left</p>
                        </div>
                        <div class="pb-10 px-3">
                            <textarea name="reply" rows="6" class="myTextarea px-2 w-full text-sm text-gray-900 border-1 rounded-lg border-gray-50 focus:ring-lime-500 focus:border-lime-500 focus:ring-0 focus:outline-none" placeholder="To {{ $comment->user->name }}">{{ $comment->comment }}</textarea>
                        </div>
                        <div class="flex justify-center items-center space-x-2">
                            <button type="submit" class="mx-auto text-xl md:h-12 h-14 font-medium text-center text-white bg-lime-500 hover:bg-lime-700 rounded-lg focus:ring-4 focus:ring-lime-200 sm:w-3/5 w-full">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>