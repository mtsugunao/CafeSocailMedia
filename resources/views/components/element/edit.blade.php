@props([
'post'
])
@auth
<div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
    <!-- Trigger for Modal -->
    <div class="relative">
        <button type="button" @click="showModal = true" class="flex w-full px-2 justify-between items-center pt-1 pb-1 hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden md:flex">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
            <span>Edit</span>
        </button>
    </div>

    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50" x-show="showModal">
        <!-- Modal inner -->
        <div class="max-w-5xl py-3 mx-auto text-left bg-white rounded shadow-lg relative w-full sm:h-auto h-full md:w-2/3" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
            <!-- Title / Close-->
            <header class="flex items-center justify-center relative">
                <h1 class="text-center m-10 md:mb-4 md:text-2xl text-4xl font-semibold text-black max-w-none">Edit Post</h1>
                <button type="button" @click="showModal = false" class="z-50 cursor-pointer pr-2 pb-2 absolute top-0 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </header>


            <!-- content -->
            <div class="relative">
                <form action="{{ route('post.update.put', ['postId' => $post->id]) }}" method="post" id="edit" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="p-3">
                        <div class="flex justify-between p-3 items-center">
                            <p class="flex text-2xl md:text-lg font-semibold px-4 md:px-2">{{ $post->cafe->name }}</p>
                            <?php
                            $str = Str::length($post->content);
                            $len = 140 - (int)$str;
                            ?>
                            <p class="flex"><span class="length">{{ $len }}</span>&nbsp;words left</p>
                        </div>
                        <div class="pb-10 px-3">
                            <textarea name="post" row="4" type="text" class="focus:ring-lime-400 focus:border-lime-400 border-1 mt-1 block w-full md:text-sm text-base border
                            border-gray-400 rounded-md pb-4" id="count-down">{{ $post->content }}</textarea>

                            <x-post.images :images="$post->images"></x-post.image>
                                @error('post')
                                <p style="color: red">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="flex-col justify-center items-center space-x-2">
                            <button form="edit" type="submit" class="mx-auto w-1/2 md:h-12 h-13 border border-green-500 bg-green-500 text-center text-xl font-medium text-white shadow-sm transition-all
                    hover:border-green-700 hover:bg-green-700 focus:ring rounded-lg focus:ring-green-200 disabled:cursor-not-allowed disabled:border-green-300 disabled:bg-green-300">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endauth