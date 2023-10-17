@props([
    'images' => []
    ])

@if(count($images) > 0)
<div x-data="{}">
    <div class="flex-col justify-start">
        @foreach($images as $image)
        <div class="sm:w-1/3 w-full mt-3">
            <div>
                <?php
                $image = str_replace('public/', '', $image->name);
                ?>
                <img class="object-fit w-full"
                src="{{ asset('storage/' . $image) }}">
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif