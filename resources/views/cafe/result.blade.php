<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<body>
    <section class="w-full bg-white dark:bg-wickeddark">
        <x-navigation />
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
            <div class="flex w-full mx-auto">
                <div class="relative md:w-4/5 w-full mx-auto items-center m-5">

                    <div class="flex items-center lg:justify-between w-full lg:flex-row flex-col mx-auto px-8 lg:space-x-4 lg:space-y-0 space-y-4 mb-10">
                        <div class="relative flex-grow w-full">
                            <x-search.keyword />
                        </div>
                        <div class="relative flex-grow lg:w-1/3 w-full">
                            <x-search.province :caProvince="$caProvince" :ca="$ca" :us="$us" :usStates="$usStates"></x-search.province>
                        </div>
                    </div>

                    {{ $searchResults->links('vendor.pagination.resultPaginate') }}
                    @if($searchResults->isNotEmpty())
                    @foreach ($searchResults as $result)
                    <div class="container mx-auto flex px-3 flex-row items-start">
                        <div class="flex justify-start p-3">
                            @if ($result->image === null)
                            <img class="object-cover object-center rounded h-24 w-24 lg:h-36 lg:w-36" alt="profile" src="{{ asset('default.png') }}">
                            @else
                            <img class="object-cover object-center rounded h-24 w-24 lg:h-36 lg:w-36" alt="profile" src="{{ image_url_cafes($result->image) }}">
                            @endif
                        </div>
                        <div class="w-full flex flex-col text-left items-start justify-start py-3">
                            <a href="{{ route('cafe.detail.show', ['cafeId' => $result->id]) }}" class="title-font sm:text-2xl text-4xl mb-2 font-medium text-gray-700 hover:text-gray-400">{{ $result->name }}</a>
                            <a href="{{ route('cafe.detail.show', ['cafeId' => $result->id]) }}" class="sm:text-lg text-xl font-medium text-gray-600 hover:text-gray-400">{{ $result->city }}&nbsp;<span>{{ $result->province }}&nbsp;</span><span>{{ $result->country }}</span></a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="p-5 flex items-center justify-center ">
                        <p class="flex text-lg md:text-xl font-semibold text-gray-700 lg:justify-start justify-center">No search results found. <br class="lg:hidden block justify-canter">Please try searching with different keywords.</p>
                    </div>
                    @endif
                </div>
            </div>
            {{ $searchResults->appends($_GET)->links('vendor.pagination.tailwindPagination') }}
        </div>
        <x-footer/>
    </section>
    @livewireScripts
</body>

</html>