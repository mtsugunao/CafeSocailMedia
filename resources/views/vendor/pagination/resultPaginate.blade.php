@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-end mx-10">
        <div class="flex-1 flex items-center justify-end">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    {!! __('Search Results') !!}
                    <span class="font-medium text-red-600">{{ $paginator->total() }}</span>
                    {!! __('Cafes') !!}
                </p>
            </div>
        </div>
    </nav>
@endif
