<div class="flex items-center">
  @auth
  <button wire:click="like" class="w-12 mt-1 group flex items-center px-3 py-2 text-base leading-6 font-medium rounded-full {{ $post->isLikedBy($user) ? 'text-green-400 hover:text-green-500' : 'text-gray-400 hover:text-gray-500' }} focus:outline-none focus:ring-0">
  @else 
  <button type="button" class="w-12 mt-1 group flex items-center px-3 py-2 text-base leading-6 font-medium rounded-full text-gray-400">
  @endauth
    <svg class="text-center h-7 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
      <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
    </svg>
  </button>
  
  <span class="font-medium text-gray-900">{{ $count }}</span>
  <span class="sr-only">likes</span>
</div>