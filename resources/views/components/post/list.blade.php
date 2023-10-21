@props([
'posts' => []
])
<div class="bg-gray-200 rounded-md shadow-lg mt-5 w-full md:w-4/5 mx-auto">
    @foreach($posts as $post)
    <div class="flex justify-between items-center p-4 pb-0 mb-3">
        <div class="inline-block">
            <a href="{{ route('cafeseeker', ['userId' => $post->user->id]) }}">
                <div class="flex items-center">
                    <div>
                        <img class="inline-block w-10 h-10 rounded-full" src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png" alt="" />
                    </div>
                    <div class="ml-3">
                        <a href="{{ route('cafeseeker', ['userId' => $post->user->id]) }}" class="text-base leading-6 font-medium text-black hover:text-gray-300">
                            {{ $post->user->name }}
                            <span class="text-sm leading-5 font-medium text-black transition ease-in-out duration-150">
                                {{ $post->created_at }}
                            </span>
                        </a>
                    </div>
                </div>
            </a>
        </div>
        <div class="flex">
            <x-post.options :postId="$post->id" :userId="$post->user_id" :post="$post"></x-post.options>
        </div>
    </div>
    <div class="pl-14 pr-3">
        <div x-data="{ isOpen : false, contentHeight : '' }" x-init="setTimeout(() => { contentHeight = $el.getBoundingClientRect().height }, 100)">
            <div x-bind:style="isOpen ? 'height: contentHeight + `px`' : 'max-height: 150px; overflow: hidden;'">
                <a href="{{ route('cafe.detail.show', ['cafeId' => $post->cafe->id]) }}" class="text-base leading-6 font-medium text-black hover:text-gray-300">{{ $post->cafe->name }}</a>
                <p class="text-lg w-full pr-5 font-medium text-black">{{ nl2br(e($post->content)) }}</p>
                <x-post.images :images="$post->images" />
            </div>
            <div class="flex w-full justify-center items-center">
                <button @click="isOpen = !isOpen" class="items-center bg-black mt-3 rounded-lg" x-show="!isOpen && contentHeight >= 150">
                    <span x-text="isOpen ? '' : 'Show more...'" class="text-white px-2"></span>
                </button>
            </div>
        </div>
        <div class="flex">
            <div class="w-full">

                <div class="flex items-center justify-start">

                    <div class="flex text-center">
                        <x-element.commentbutton :href="route('post.comment.show', ['postId' => $post->id])">
                        </x-element.commentbutton>
                        @livewire('like', ['post' => $post])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>