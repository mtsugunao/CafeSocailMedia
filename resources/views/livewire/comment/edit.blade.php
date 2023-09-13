<div>
    <a wire:click.prevent="openModal({{ $edit->id }})"
        class="block py-2 px-4 hover:bg-gray-100">
        Edit
    </a>
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
                        <form wire:submit.prevent="save({{ $edit->id }})">
                        <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea name="comment" id="comment" wire:model.defer="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none" placeholder="Edit">{{ $comment }}</textarea>
                            @error('comment')
                            <x-alert.error :closeError="$closeError">{{ $message }}</x-alert.error>
                            @enderror
                        </div>
                            <button type="submit" 
                                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-lime-700 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                                Edit
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
    @endif
</div>