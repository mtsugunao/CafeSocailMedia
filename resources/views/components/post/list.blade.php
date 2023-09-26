@props([
'posts' => []
])
<div class="bg-gray-200 rounded-md shadow-lg mt-5 w-full md:w-4/5 mx-auto">
    @foreach($posts as $post)
    <div class="flex justify-between flex-shrink-0 p-4 pb-0">
        <a href="#" class="flex-shrink-0 group block">
            <div class="flex items-center mb-3">
                <div>
                    <img class="inline-block lg:h-10 lg:w-10 w-6 h-6 rounded-full" src="https://pbs.twimg.com/profile_images/1121328878142853120/e-rpjoJi_bigger.png" alt="" />
                </div>
                <div class="ml-3">
                    <p class="text-base leading-6 font-medium text-black hover:text-gray-300">
                        {{ $post->user->name }}
                        <span class="text-sm leading-5 font-medium text-black transition ease-in-out duration-150">
                            {{ $post->created_at }}
                        </span>
                    </p>
                </div>
            </div>
        </a>
        <div class="flex items-center">
            <x-post.options :postId="$post->id" :userId="$post->user_id"></x-post.options>
        </div>
    </div>
    <div class="pl-14 pr-3">
            <div class="ml-3 more-link">
                    <a href="{{ route('cafe.detail.show', ['cafeId' => $post->cafe->id]) }}" class="text-base leading-6 font-medium text-black hover:text-gray-300">{{ $post->cafe->name }}</a>
                    <p class="text-base w-full pr-5 font-medium text-black">{{ nl2br(e($post->content)) }}</p>
                    <x-post.images :images="$post->images"/>
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