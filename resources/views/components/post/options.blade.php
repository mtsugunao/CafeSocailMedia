@if($myPost)
<div class="relative" x-data="{ 
                    isOpen: false}">
    <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" id="dropdownMenuIconHorizontalButton" class="inline-flex options items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg" type="button">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
        </svg>
        <span class="sr-only" aria-hidden="true">Comment settings</span>
    </button>
    <!-- Dropdown menu -->
    <div x-show="isOpen" @click.away="isOpen = false" x-cloak class="relative md:absolute w-16 md:w-24 z-10 mt-2 rounded-lg divide-y divide-gray-100 shadow-lg">
        <ul class="py-2 text-sm text-gray-700 bg-white rounded-lg" aria-labelledby="dropdownMenuIconHorizontalButton">
            <li>
                <x-element.edit :post="$post" />
            </li>
            <li>
                <div class="relative">
                    <form action="{{ route('post.delete', ['postId' => $postId]) }}" method="post" onclick="return confirm('Are you sure to delete?');">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="w-full items-center justify-between pt-2 px-2 hover:bg-gray-100 flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 hidden md:flex">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <span>Delete</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
@endif