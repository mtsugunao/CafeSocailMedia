<div>  
<div class="flex items-center mt-4 space-x-4">
        <button type="button" wire:click="openModal"
                    class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                </svg>
                    Reply
        </button>
</div>
<!-- Modal logic -->
@if($showModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>               
                <div class="inline-block align-bottom bg-lime-100 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif 
                        <form wire:submit.prevent="save({{ $comment->id }})">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <label for="reply" class="sr-only">Your Reply</label>
                            <textarea name="reply" id="reply" wire:model.defer="reply" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800" placeholder="To {{ $comment->user->name }}"></textarea>
                            @error('reply')
                            <x-alert.error :closeError="$closeError">{{ $message }}</x-alert.error>
                            @enderror
                        </div>
                            <button type="submit" 
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-lime-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Reply
                            </button>
                        </form>
                        
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <x-element.closebutton>
                            Close
                        </x-element.closebutton>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
</div>