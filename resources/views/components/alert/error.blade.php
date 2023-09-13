@if($closeError)
<div class="container mx-auto mt-10 space-y-5">
  <div
      class="flex justify-between text-orange-200 shadow-inner rounded p-3 bg-orange-600"
    >
      <p class="self-center"><strong>Warning </strong>{{ $slot }}</p>
      <button type="button" wire:click="closeWindow" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="defaultModal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            <span class="sr-only">Close modal</span>
        </button>
    </div>
</div>
@endif