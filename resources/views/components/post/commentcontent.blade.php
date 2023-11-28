<div class="rounded-md mt-5 w-full mx-auto bg-white shadow-md">
    <div class="flex justify-between flex-shrink-0 p-4 pb-0">
        <a href="#" class="flex-shrink-0 group block">
            <div class="flex items-center mb-3">
                <div>
                    <img class="inline-block lg:h-10 lg:w-10 w-6 h-6 rounded-full" src="{{ isset($post->user->profile_image) ? image_url_profiles($post->user->profile_image) : asset('images/user_icon.png') }}" alt="{{ $post->user->name }}" />
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
        <div class="flex w-1/6 justify-start items-center">
            <x-post.options :postId="$post->id" :userId="$post->user_id" :post="$post"></x-post.options>
        </div>
    </div>
    <div class="pl-14 pr-3">
            <div class="ml-3 more-link">
                    <a href="{{ route('cafe.detail.show', ['cafeId' => $post->cafe->id]) }}" class="text-base leading-6 font-medium text-black hover:text-gray-300">{{ $post->cafe->name }}</a>
                    <p class="text-base w-full pr-5 font-medium text-black">{!! nl2br(e($post->content)) !!}</p>
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
</div>