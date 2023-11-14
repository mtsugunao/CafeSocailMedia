@props([
'images' => []
])

@if(count($images) > 0)
<div x-data="{}">
    <div class="grid grid-cols-2 xl:grid-cols-4 gap-1 lg:gap-2 justify-start">
        @foreach($images as $image)
        <div class="w-full h-auto mt-3">
            <a @click="$dispatch('img-modal', { imgModalSrc: '{{ image_url($image->name) }}' })" class="cursor-pointer">
                <img class="object-fit w-full" src="{{ image_url($image->name) }}">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif

@once
<div x-data="{ imgModal : false, imgModalSrc : '' }">
    <div @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc;" x-cloak x-show="imgModal" x-on:click.away="imgModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
        <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
            <div class="z-50">
                <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="p-2">
                <img
                    class="object-contain h-1/2-screen" :alt="imgModalSrc" :src="imgModalSrc">               
            </div>
        </div>
    </div>
</div>
@push('css')
<style>
    [x-cloak] { display: none !important; }
</style>
@endpush
@endonce