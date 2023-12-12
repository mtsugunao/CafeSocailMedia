<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cafe->name }}</title>
    <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
    @vite(['resources/css/app.css'])
    @livewireStyles
    <style>
        .post-option>summary {
            list-style: none;
            cursor: pointer;
        }

        .post-option[open]>summary::before {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 10;
            display: block;
            content: " ";
            background: transparent;
        }

        body {
            display: flex;
            flex-flow: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
    </style>
    @stack('css')
</head>

<body>
    <main class="w-full bg-white dark:bg-wickeddark">
        <x-navigation />
        <div class="relative items-center lg:w-4/5 w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
            <div class="flex w-full mx-auto">
                <div class="relative pb-12 lg:w-4/5 w-full items-center mx-auto align-middle">
                    <div class="flex-col md:flex md:flex-row mb-7 items-center">
                        <div class="flex flex-col justify-center w-full items-start p-3">
                            <div class="flex flex-row justify-between w-full items-center">
                                <h1 class="w-full text-4xl font-bold py-6">{{ $cafe->name }}</h1>
                            </div>
                            <p class="text-gray-600 font-semibold text-lg">{{ $cafe->street_address }},&nbsp;<span>{{ $cafe->city}},&nbsp;</span><span>{{ $cafe->province }},&nbsp;</span><span>{{ $cafe->country }},&nbsp;</span><span>{{ $cafe->postalcode }}</span></p>
                            <div class="text-gray-600 font-semibold text-lg inline-flex pt-3 items-center justify-between w-full">
                                <div class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6 sm:w-8 sm:h-8 sm:mr-10 mr-5" version="1.1" id="Layer_1" viewBox="0 0 424.264 424.264" xml:space="preserve">
                                        <g>
                                            <path style="fill:#2488FF;" d="M212.132,32.132C131.999,32.132,56.663,63.337,0,120l28.284,28.284   c49.107-49.107,114.399-76.152,183.848-76.152s134.74,27.045,183.848,76.152L424.264,120   C367.601,63.337,292.265,32.132,212.132,32.132z" />
                                            <path style="fill:#2488FF;" d="M56.568,176.568l28.284,28.284c33.998-33.998,79.2-52.721,127.279-52.721   s93.282,18.723,127.279,52.721l28.284-28.284c-41.553-41.553-96.799-64.437-155.563-64.437S98.121,135.016,56.568,176.568z" />
                                            <path style="fill:#2488FF;" d="M113.137,233.137l28.284,28.284c38.99-38.989,102.432-38.989,141.422,0l28.284-28.284   C256.541,178.551,167.723,178.551,113.137,233.137z" />
                                            <path style="fill:#2488FF;" d="M152.132,332.132c0,33.084,26.916,60,60,60v-120C179.048,272.132,152.132,299.048,152.132,332.132z" />
                                            <path style="fill:#005ECE;" d="M212.132,272.132v120c33.084,0,60-26.916,60-60S245.216,272.132,212.132,272.132z" />
                                        </g>
                                    </svg>
                                    <span>Wifi</span>
                                </div>
                                @if($cafe->wifi == 'No')
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" class="sm:mr-20 mr-5 w-5 h-5" style="opacity: 1;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #4B4B4B;
                                        }
                                    </style>
                                    <g>
                                        <polygon class="st0" points="512,52.535 459.467,0.002 256.002,203.462 52.538,0.002 0,52.535 203.47,256.005 0,459.465    52.533,511.998 256.002,308.527 459.467,511.998 512,459.475 308.536,256.005  " style="fill: rgb(223, 86, 86);" />
                                    </g>
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#1925cc" version="1.1" id="Capa_1" class="w-5 h-5 sm:mr-20 mr-5" viewBox="0 0 595.02 595.02" xml:space="preserve" stroke="#1925cc" stroke-width="0.005950209999999999">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M507.529,87.493c-27.264-27.264-59.022-48.672-94.396-63.635C376.489,8.358,337.588,0.5,297.511,0.5 c-40.078,0-78.979,7.858-115.624,23.358c-35.373,14.961-67.132,36.371-94.395,63.635c-27.264,27.263-48.673,59.022-63.635,94.395 C8.358,218.532,0.5,257.434,0.5,297.511c0,40.077,7.858,78.979,23.358,115.623c14.961,35.373,36.371,67.132,63.635,94.396 c27.263,27.263,59.022,48.672,94.395,63.634c36.645,15.5,75.546,23.358,115.624,23.358c40.077,0,78.979-7.858,115.623-23.358 c35.373-14.961,67.133-36.371,94.396-63.634c27.263-27.264,48.673-59.022,63.634-94.396 c15.499-36.645,23.358-75.546,23.358-115.623c0-40.077-7.858-78.979-23.358-115.624 C556.202,146.515,534.792,114.756,507.529,87.493z M297.511,551.682c-140.375,0-254.171-113.797-254.171-254.171 c0-140.375,113.796-254.171,254.171-254.171c140.374,0,254.171,113.796,254.171,254.171 C551.682,437.885,437.885,551.682,297.511,551.682z" />
                                                    <path d="M297.511,595.021c-40.146,0-79.112-7.872-115.818-23.397c-35.433-14.988-67.245-36.434-94.553-63.741 c-27.31-27.31-48.755-59.122-63.742-94.555C7.872,376.623,0,337.656,0,297.511c0-40.145,7.872-79.112,23.397-115.818 c14.987-35.432,36.433-67.245,63.742-94.553c27.308-27.309,59.12-48.755,94.553-63.742C218.399,7.872,257.366,0,297.511,0 c40.146,0,79.112,7.872,115.817,23.397c35.435,14.988,67.247,36.434,94.555,63.742c27.31,27.31,48.755,59.123,63.741,94.553 c15.525,36.706,23.397,75.673,23.397,115.818c0,40.144-7.872,79.11-23.397,115.817c-14.985,35.432-36.432,67.244-63.741,94.555 c-27.31,27.31-59.122,48.755-94.555,63.741C376.623,587.149,337.656,595.021,297.511,595.021z M297.511,1 C257.5,1,218.665,8.845,182.082,24.318c-35.314,14.937-67.02,36.311-94.236,63.528c-27.218,27.217-48.591,58.923-63.528,94.236 C8.845,218.665,1,257.5,1,297.511s7.845,78.847,23.318,115.429c14.936,35.312,36.31,67.019,63.528,94.236 c27.217,27.216,58.922,48.59,94.236,63.526c36.582,15.474,75.417,23.319,115.429,23.319c40.011,0,78.847-7.846,115.429-23.319 c35.312-14.936,67.019-36.309,94.236-63.526c27.219-27.22,48.592-58.925,63.526-94.236 c15.474-36.584,23.319-75.42,23.319-115.429c0-40.011-7.846-78.847-23.319-115.429c-14.935-35.312-36.309-67.017-63.526-94.236 c-27.217-27.216-58.922-48.59-94.236-63.528C376.357,8.845,337.521,1,297.511,1z M297.511,552.182 c-68.025,0-131.979-26.49-180.08-74.592C69.33,429.489,42.84,365.535,42.84,297.511c0-68.025,26.49-131.979,74.591-180.08 S229.486,42.84,297.511,42.84c68.024,0,131.979,26.49,180.079,74.591c48.102,48.101,74.592,112.055,74.592,180.08 c0,68.024-26.49,131.979-74.592,180.079C429.489,525.691,365.535,552.182,297.511,552.182z M297.511,43.84 c-67.758,0-131.46,26.386-179.373,74.298S43.84,229.753,43.84,297.511s26.386,131.46,74.298,179.372 c47.913,47.912,111.615,74.299,179.373,74.299s131.46-26.387,179.372-74.299s74.299-111.614,74.299-179.372 s-26.387-131.46-74.299-179.373C428.971,70.226,365.269,43.84,297.511,43.84z" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                @endif
                            </div>
                            <div class="text-gray-600 font-semibold text-lg inline-flex pt-3 items-center justify-between w-full">
                                <div class="inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x31_0" x="0px" y="0px" viewBox="0 0 512 512" class="w-6 h-6 sm:w-8 sm:h-8 sm:mr-10 mr-5" style="opacity: 1;" xml:space="preserve">
                                        <style type="text/css">
                                            .st0 {
                                                fill: #374149;
                                            }
                                        </style>
                                        <g>
                                            <path class="st0" d="M506.513,234.613l-44.793,1.434l-11.774,0.359l-3.996,0.07l25.504-74.305   c3.222-9.394-9.726-15.554-14.985-7.125l-71.656,114.946c-2.313,3.707,0.594,8.461,4.942,8.102l39.226-3.254l12.414-1.007   l5.527-0.379l-31.836,75.84c-3.859,9.188,8.714,16.188,14.496,8.07l81.422-114.363   C513.552,239.426,510.904,234.477,506.513,234.613z" style="fill: rgb(210, 185, 58);" />
                                            <path class="st0" d="M110.387,191.383h-8.238c-9.707,0-18.809,4.699-24.43,12.614L58.25,231.418   c-1.688,1.992-3.114,4.129-4.328,6.344H0v36.203v0.109v0.161h53.922c1.214,2.222,2.64,4.355,4.332,6.347l19.465,27.418   c3.863,5.438,9.386,9.309,15.606,11.23c0.066,0.023,0.14,0.043,0.21,0.066c2.766,0.832,5.653,1.316,8.614,1.316h8.234h18.238   h27.082c6.418,0,11.637-5.214,11.637-11.637v-16.613v-24.29V243.91v-24.293v-16.594c0-6.438-5.218-11.637-11.637-11.633h-27.082   v-0.008H110.387z" style="fill: rgb(210, 185, 58);" />
                                            <path class="st0" d="M222.235,225.7c0-6.696-5.454-12.145-12.145-12.145H180.29v24.289h29.801   C216.782,237.844,222.235,232.41,222.235,225.7z" style="fill: rgb(210, 185, 58);" />
                                            <path class="st0" d="M180.29,298.445h29.801c6.691,0,12.145-5.438,12.145-12.144c0-6.695-5.454-12.149-12.145-12.149h-29.614   h-0.125h-0.062V298.445z" style="fill: rgb(210, 185, 58);" />
                                            <path class="st0" d="M304.575,237.789v7.77c0,0.965-0.786,1.75-1.754,1.75h-24.746c-0.965,0-1.75,0.782-1.75,1.75v13.882   c0,0.965,0.786,1.746,1.75,1.746h24.746c0.969,0,1.754,0.785,1.754,1.754v7.766c0,1.446,1.652,2.27,2.805,1.395l24.039-18.211   c0.922-0.699,0.922-2.086,0-2.786l-24.039-18.21C306.227,235.524,304.575,236.344,304.575,237.789z" style="fill: rgb(210, 185, 58);" />
                                        </g>
                                    </svg>
                                    <span>Outlet</span>
                                </div>
                                @if($cafe->outlet == 'No')
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="_x32_" x="0px" y="0px" viewBox="0 0 512 512" class="sm:mr-20 mr-5 w-5 h-5" style="opacity: 1;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #4B4B4B;
                                        }
                                    </style>
                                    <g>
                                        <polygon class="st0" points="512,52.535 459.467,0.002 256.002,203.462 52.538,0.002 0,52.535 203.47,256.005 0,459.465    52.533,511.998 256.002,308.527 459.467,511.998 512,459.475 308.536,256.005  " style="fill: rgb(223, 86, 86);" />
                                    </g>
                                </svg>
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#1925cc" version="1.1" id="Capa_1" class="w-5 h-5 sm:mr-20 mr-5" viewBox="0 0 595.02 595.02" xml:space="preserve" stroke="#1925cc" stroke-width="0.005950209999999999">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M507.529,87.493c-27.264-27.264-59.022-48.672-94.396-63.635C376.489,8.358,337.588,0.5,297.511,0.5 c-40.078,0-78.979,7.858-115.624,23.358c-35.373,14.961-67.132,36.371-94.395,63.635c-27.264,27.263-48.673,59.022-63.635,94.395 C8.358,218.532,0.5,257.434,0.5,297.511c0,40.077,7.858,78.979,23.358,115.623c14.961,35.373,36.371,67.132,63.635,94.396 c27.263,27.263,59.022,48.672,94.395,63.634c36.645,15.5,75.546,23.358,115.624,23.358c40.077,0,78.979-7.858,115.623-23.358 c35.373-14.961,67.133-36.371,94.396-63.634c27.263-27.264,48.673-59.022,63.634-94.396 c15.499-36.645,23.358-75.546,23.358-115.623c0-40.077-7.858-78.979-23.358-115.624 C556.202,146.515,534.792,114.756,507.529,87.493z M297.511,551.682c-140.375,0-254.171-113.797-254.171-254.171 c0-140.375,113.796-254.171,254.171-254.171c140.374,0,254.171,113.796,254.171,254.171 C551.682,437.885,437.885,551.682,297.511,551.682z" />
                                                    <path d="M297.511,595.021c-40.146,0-79.112-7.872-115.818-23.397c-35.433-14.988-67.245-36.434-94.553-63.741 c-27.31-27.31-48.755-59.122-63.742-94.555C7.872,376.623,0,337.656,0,297.511c0-40.145,7.872-79.112,23.397-115.818 c14.987-35.432,36.433-67.245,63.742-94.553c27.308-27.309,59.12-48.755,94.553-63.742C218.399,7.872,257.366,0,297.511,0 c40.146,0,79.112,7.872,115.817,23.397c35.435,14.988,67.247,36.434,94.555,63.742c27.31,27.31,48.755,59.123,63.741,94.553 c15.525,36.706,23.397,75.673,23.397,115.818c0,40.144-7.872,79.11-23.397,115.817c-14.985,35.432-36.432,67.244-63.741,94.555 c-27.31,27.31-59.122,48.755-94.555,63.741C376.623,587.149,337.656,595.021,297.511,595.021z M297.511,1 C257.5,1,218.665,8.845,182.082,24.318c-35.314,14.937-67.02,36.311-94.236,63.528c-27.218,27.217-48.591,58.923-63.528,94.236 C8.845,218.665,1,257.5,1,297.511s7.845,78.847,23.318,115.429c14.936,35.312,36.31,67.019,63.528,94.236 c27.217,27.216,58.922,48.59,94.236,63.526c36.582,15.474,75.417,23.319,115.429,23.319c40.011,0,78.847-7.846,115.429-23.319 c35.312-14.936,67.019-36.309,94.236-63.526c27.219-27.22,48.592-58.925,63.526-94.236 c15.474-36.584,23.319-75.42,23.319-115.429c0-40.011-7.846-78.847-23.319-115.429c-14.935-35.312-36.309-67.017-63.526-94.236 c-27.217-27.216-58.922-48.59-94.236-63.528C376.357,8.845,337.521,1,297.511,1z M297.511,552.182 c-68.025,0-131.979-26.49-180.08-74.592C69.33,429.489,42.84,365.535,42.84,297.511c0-68.025,26.49-131.979,74.591-180.08 S229.486,42.84,297.511,42.84c68.024,0,131.979,26.49,180.079,74.591c48.102,48.101,74.592,112.055,74.592,180.08 c0,68.024-26.49,131.979-74.592,180.079C429.489,525.691,365.535,552.182,297.511,552.182z M297.511,43.84 c-67.758,0-131.46,26.386-179.373,74.298S43.84,229.753,43.84,297.511s26.386,131.46,74.298,179.372 c47.913,47.912,111.615,74.299,179.373,74.299s131.46-26.387,179.372-74.299s74.299-111.614,74.299-179.372 s-26.387-131.46-74.299-179.373C428.971,70.226,365.269,43.84,297.511,43.84z" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                @endif
                            </div>
                        </div>
                        <div class="flex-col w-full">
                            <div class="flex-row px-3">
                                <div class="sm:p-2 flex justify-start px-3 py-2 md:justify-end">
                                    <a href="{{ route('cafeseeker', ['userId' => $cafe->user->id]) }}" class="font-semibold text-sm text-gray-500 hover:underline"><span>{{ $cafe->updated_at > $cafe->created_at ? "Updated by" : "Registered by"}}&nbsp;</span>{{ $cafe->user->name }}</a>
                                </div>
                                <div class="rounded-lg sm:px-2 flex justify-start px-3 md:justify-end">
                                    <a href="{{ route('cafe.update.show', ['cafeId' => $cafe->id]) }}" class="text-sm text-gray-600 hover:underline">Update</a>
                                </div>
                            </div>
                            <x-post.cafe :cafe="$cafe"></x-post.cafe>
                        </div>
                    </div>
                    @if(isset($cafe->description))
                    <div class="flex w-full px-3 mb-7 items-center">
                        <p class="text-gray-600 font-semibold text-lg"><strong>Description:&nbsp;</strong><span>{{ $cafe->description }}</span></p>
                    </div>
                    @endif
                    @if(isset($cafe->parking))
                    <div class="flex w-full px-3 mb-7 items-center">
                        <p class="text-gray-600 font-semibold text-lg"><strong>Parking information:&nbsp;</strong><span>{{ $cafe->parking }}</span></p>
                    </div>
                    @endif
                    <div>
                        @if(isset($cafe->menus))
                        <div class="relative items-center w-full p-3 mx-auto max-w-7xl">
                            <div class="grid w-full grid-cols-1 gap-6 mx-auto sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($cafe->menus as $menu)
                                <div class="inline-flex justify-between w-full">
                                    <h1 class="mb-3 text-xl font-semibold leading-none tracking-tighter text-neutral-600">{{ $menu->name }}</h1>
                                    <span>{{ $cafe->country === 'Canada' ? $menu->price . ' CAD' : $menu->price . ' USD' }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @error('images.*')
                        <x-alert.error>{{ $message}}</x-alert.error>
                        @enderror
                        @error('post')
                        <x-alert.error>{{ $message}}</x-alert.error>
                        @enderror

                        @if(session('feedback.success'))
                        <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
                        @endif
                        <x-post.list :posts="$posts"></x-post.list>
                    </div>
                </div>
            </div>
            {{ $posts->links('vendor.pagination.tailwindPagination') }}
            <div class="relative w-full lg:w-4/5 flex flex-col justify-center mx-auto mt-10">
                <p class="text-sm lg:text-lg font-semibold text-start mb-2">Make sure the map is pinned to an accurate position. If not, please modify the address.</p>
                <div id="map" address-data="{{ $address }}" class="w-full h-full pb-[50%] relative">
                </div>
            </div>
        </div>
    </main>
    <x-footer />
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const countDown = document.querySelector('#count-down');
        const length = document.querySelector('.length');
        const maxLength = 255;
        countDown.addEventListener('input', () => {
            length.textContent = maxLength - countDown.value.length;
            if (maxLength - countDown.value.length < 0) {
                length.style.color = 'red';
            } else {
                length.style.color = '#444';
            }
        }, false);

        function initMap() {
            var target = document.getElementById('map');
            var address = document.getElementById('map').getAttribute('address-data');
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                address: address
            }, function(results, status) {
                if (status === 'OK' && results[0]) {


                    var map = new google.maps.Map(target, {
                        center: results[0].geometry.location,
                        zoom: 18
                    });

                    var marker = new google.maps.Marker({
                        position: results[0].geometry.location,
                        map: map,
                        animation: google.maps.Animation.DROP
                    });

                    var infowindow = new google.maps.InfoWindow({
                        content: `<div>
                                <div class="sm:m-2">
                                <p class="py-1 font-semibold text-l">{{ $cafe->name }}</p>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $address }}" target="_blanck"><span class="hover:underline decoration-sky-500">More details</span></a>
                                </div>
                            </div>`
                    });
                    infowindow.open(map, marker);

                } else {
                    //住所が存在しない場合の処理
                    alert('Geocode was not successful for the following reason: ' + status);
                    target.style.display = 'none'; // マップを非表示にする例
                }
            });
        }
    </script>
    <script src='https://maps.google.com/maps/api/js?key={{ config("services.google-map.apikey") }}=initMap' async defer></script>
</body>

</html>