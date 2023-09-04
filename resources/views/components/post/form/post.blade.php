<div>
    <p>Post form</p>
        <a href="{{ route('post.show') }}">navigate to posts</a>
        <p>If you do not see a cafe that you wanted to add down below the select box, please add your cafe first!</p>
        <a href="{{ route('cafe.new') }}">Navigate to add a new cafe</a>
        @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
        @endif 
            @if ($images)
                Photo Preview:
                <div class="row">
                    @foreach ($images as $images)
                    <div class="col-3 card me-1 mb-1">
                        <img src="{{ $images->temporaryUrl() }}">
                    </div>
                    @endforeach
                </div>
            @endif
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            @csrf
            <label for="post-content">Content</label>
            <span>up to 140 words</span>
            <textarea wire:model="post" id="post-content" type="text"></textarea>
            @error('post')
            <x-alert.error :closeError="$closeError">{{ $message }}</x-alert.error>
            @enderror
            <div class="mb-3">
                <label class="form-label" for="inputFile">Select Files:</label>
                <input 
                    wire:model="images"
                    type="file" 
                    name="images[]" 
                    id="inputFile"
                    multiple 
                    class="form-control @error('files') is-invalid @enderror"
                    accept="image/*">
                <div wire:loading wire:target="images">Uploading...</div>
                @error('images.*')
                    <span class="text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <select name="cafe_id" id="cafe_id">
            @foreach($cafes as $cafe)
                <option value="{{ $cafe->id }}" wire:model="cafe_id">{{ $cafe->name }}</option>
            @endforeach
            </select>
                <x-element.submitbutton>
                    Post
                </x-element.submitbutton>
        </form>
</div> 