<section class="bg-white py-8 lg:py-16 antialiased">
  <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900">{{ $post->content }}</h2>
        </div>
        @if(session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
        @endif
    <form action="{{ route('post.comment.save', ['postId' => $post->id]) }}" class="mb-6" method="post">
        @csrf
        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" name='comment' rows="6"
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"
                placeholder="Write a comment for {{ $post->user->name }}" required></textarea>
        </div>
        @if (session()->has('delete.success'))
            <div class="alert alert-success">
                {{ session('delete.success') }}
            </div>
        @endif 
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-lime-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
            Post comment
        </button>
    </form>
    @foreach($post->comments as $comment)
    @php $errorVarName = "error_{$comment->id}"; @endphp
    @if($comment->parent_comment_id === null)
    <article class="p-6 text-base bg-white rounded-lg">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 font-semibold"><img
                        class="mr-2 w-6 h-6 rounded-full"
                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                        alt="Michael Gough">{{ $comment->user->name }}</p>
                <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08"
                        title="February 8th, 2022">{{  Carbon\Carbon::parse($comment->created_at)->format('Y/m/d H:i') }}</time></p>
            </div>
            <div class="relative"x-data="{ 
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
                    class="absolute z-10 mt-2 w-36 bg-white rounded-lg divide-y divide-gray-100 shadow-lg">
                    <ul class="py-1 text-sm text-gray-700"
                        aria-labelledby="dropdownMenuIconHorizontalButton">
                        <li>
                            @livewire('comment.edit', ['edit' => $comment, 'post' => $post, 'postId' => $comment->post->id])
                        </li>
                        <li>
                            @livewire('comment.remove', ['removableId' => $comment->id])
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100">Report</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
        @if (session()->has($errorVarName))
            <x-alert.success>{{ session($errorVarName) }}</x-alert.success>
        @endif
        @livewire('comment.update', ['comment' => $comment])
        @livewire('comment.reply', ['comment' => $comment, 'post' => $post])
    </article>
    @livewire('comment.show-reply', ['comment' => $comment, 'post' => $post])
    @endif
    @endforeach
  </div>
</section>