<button
    type="submit"
    class="inline-flex justify-center py-2 px-4 border border-transparent
    shadow-sm text-sm font-medium rounded-md text-white bg-blue-500
    hover:bg-blue-600 focus:outline-none focus:ring-2 focus:fing-offset-2
    focus:ring-blue-500"
    wire:click="openError"
>
    {{ $slot }}
</button>