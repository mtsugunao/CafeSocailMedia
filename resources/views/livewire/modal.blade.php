<div>
    @if (session()->has('success'))
        <x-alert.success>{{ session('success') }}</x-alert.success>
    @endif
    <x-element.openbutton>
        Open
    </x-element.openbutton>
    @if($showModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>               
 
                <div class="inline-block align-bottom bg-lime-100 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $cafe->name }}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                            <div>
                                <p>Post form</p>
                                    @if (session()->has('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                    @endif 
                                    <form wire:submit.prevent="save({{ $cafe->id }})" enctype="multipart/form-data">
                                        @csrf
                                        <label for="post-content">Content</label>
                                        <span>up to 140 words</span>
                                        <textarea wire:model.defer="content" id="post-content" type="text"></textarea>
                                        @error('post')
                                        <x-alert.error :closeError="$closeError">{{ $message }}</x-alert.error>
                                        @enderror
                                        <div class="mb-3">
                                            <label class="form-label" for="inputFile">Select Files:</label>
                                            <input   
                                                wire:model.defer="images"
                                                type="file"  
                                                id="inputFile"
                                                multiple 
                                                >
                                            @error('images.*')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                            <x-element.submitbutton>
                                                Post
                                            </x-element.submitbutton>
                                    </form>
                            </div> 
                            </p>
                        </div>
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
    @foreach($posts as $post)
        <p>{{ $post->created_at }}</p>
        <p>{{ $post->cafe ? $post->cafe->name : "Cafe should have been deleted" }}</p>
        <p>{{ $post->content }}</p>
        @foreach($post->images as $image)
            <?php
                $image = str_replace('public/', '', $image->name);
            ?>
            <img src="{{ asset('storage/'.$image) }}" width="54" height="54" alt="">
        @endforeach
    @endforeach
</div>