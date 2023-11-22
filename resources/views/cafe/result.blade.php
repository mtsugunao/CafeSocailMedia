<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
    @vite(['resources/css/app.css'])
    @livewireStyles
    <style>
        body {
            display: flex;
            flex-flow: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
</head>

<body>
    <main class="w-full bg-white dark:bg-wickeddark">
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
                    <div class="container mx-auto px-3 flex flex-row items-center space-x-5 md:space-x-5 justify-start">
                        @if ($result->image === null)
                        <div class="flex-shrink-0 items-center">
                        <img class="object-cover object-center rounded h-24 w-24 lg:h-36 lg:w-36 flex justify-start mr-5" alt="profile" src="{{ asset('default.png') }}">
                        </div>
                        @else
                        <div class="flex-shrink-0 items-center">
                        <img class="object-cover object-center rounded h-24 w-24 lg:h-36 lg:w-36 flex justify-start mr-5" alt="profile" src="{{ image_url_cafes($result->image) }}">
                        </div>
                        @endif
                        <div class="flex flex-col text-left items-start justify-start py-3">
                            <a href="{{ route('cafe.detail.show', ['cafeId' => $result->id]) }}" class="title-font md:text-4xl text-2xl mb-2 font-medium text-gray-700 hover:text-gray-400">{{ $result->name }}</a>
                            <a href="{{ route('cafe.detail.show', ['cafeId' => $result->id]) }}" class="md:text-2xl text-lg font-medium text-gray-600 hover:text-gray-400">{{ $result->city }}&nbsp;<span>{{ $result->province }}&nbsp;</span><span>{{ $result->country }}</span></a>
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
    </main>
    <x-footer />
    @livewireScripts
</body>

</html>