@props([
    'images' => []
    ])

@if(count($images) > 0)
<div x-data="{}" class="px-2">
    <div class="flex justify-start mx-2">
        @foreach($images as $image)
        <div class="w-1/3 px-2 mt-5">
            <div>
                <?php
                $image = str_replace('public/', '', $image->name);
                ?>
                <a @click="$dispatch('img-modal', { imgModalSrc:
                    '{{ asset('storage/' . $image) }}' })"
                    class="cursor-pointer">
                    <img class="object-fit w-full"
                    src="{{ asset('storage/' . $image) }}">
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

@once
    <div x-data="{ imgModal : false, imgModalSrc : '' }">
        <div
            @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc;"
            x-cloak
            x-show="imgModal"

            x-on:click.away="imgModalSrc = ''"
            class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex
            justify-center items-center bg-black bg-opacity-75">
            <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl
            max-h-full overflow-auto">
                <div class="z-50">
                    <button @click="imgModal = ''" class="float-right pt-2
                    pr-2 outline-none focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-white fill-current">
                    <path fillRule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clipRule="evenodd" />
                    </svg>
                    </button>
                </div>
                <div class="p-2">
                    <img
                        class="object-contain h-1/2-screen"
                        :alt="imgModalSrc"
                        :src="imgModalSrc">
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