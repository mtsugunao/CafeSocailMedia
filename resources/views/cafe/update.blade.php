<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cafe update</title>
    <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hover-option:hover {
            background-color: red;
        }

        body {
            display: flex;
            flex-flow: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .hide-spin::-webkit-inner-spin-button,
        .hide-spin::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <main class="bg-gray-100">
        <x-navigation />
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2 lg:py-12 lg:px-0 px-8">
                    @if (session('feedback.success'))
                    <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
                    @endif
                    <p class="max-w-xl text-lg">
                        Assist me in constructing a cafe database. If you're uncertain about the input fields, leave them blank. After registration, any MugNet member can edit the information.
                    </p>

                    <div class="mt-8">
                        <p>Ensure that there are no duplicate entries of the cafe during the registration process.</p>
                        <p>Please verify that the cafe information you wish to register does not already exist.</p>
                    </div>

                </div>

                <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                    <form action="{{ route('cafe.update.put', ['cafeId' => $cafe->id]) }}" id="update" method="post" enctype="multipart/form-data" class="space-y-4">
                        @method('PUT')
                        @csrf
                        <div>
                            <label class="sr-only" for="cafeName">Cafe Name</label>
                            <input class="w-full rounded-lg border-gray-200 focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 p-3 text-sm" placeholder="Cafe Name" type="text" name="cafeName" id="cafeName" value="{{ old('cafeName', $cafe->name) }}" />
                            @error('cafeName')
                            <x-alert.error>{{ $message}}</x-alert.error>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2" x-data="provinceList()" x-cloak>
                            <div>
                                <label for="country" class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 block w-full p-2.5" @change="changeProvince">
                                    <option hidden data-val="{{ $cafe->country == 'Canada' ? '1' : '2' }}">{{ $cafe->country }}</option>
                                    <option value="Canada" data-val="1" :selected="'Canada' == '{{ old('country') }}'" class="hover-option">Canada</option>
                                    <option value="United States" data-val="2" :selected="'United States' == '{{ old('country') }}'">United States</option>
                                </select>
                                @error('country')
                                <x-alert.error>{{ $message}}</x-alert.error>
                                @enderror
                            </div>

                            <div>
                                <label for="province" class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="province" name="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 block w-full p-2.5">
                                    <template x-for="(data, index) in datas" :key="index">
                                        <option :value="data.name" x-text="data.name" :selected="data.name == '{{ old('province') }}'"></option>
                                    </template>
                                    <option hidden>{{ $cafe->province }}</option>
                                </select>
                                @error('province')
                                <x-alert.error>{{ $message}}</x-alert.error>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                            <div>
                                <label class="sr-only" for="city">City</label>
                                <input class="w-full rounded-lg border-gray-200 focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 p-3 text-sm" placeholder="City" type="text" id="city" name="city" autocomplete="address-level2" value="{{ old('city', $cafe->city) }}" />
                                @error('city')
                                <x-alert.error>{{ $message}}</x-alert.error>
                                @enderror
                            </div>

                            <div>
                                <label class="sr-only" for="streetAddress">Street Address</label>
                                <input class="w-full rounded-lg border-gray-200 focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 p-3 text-sm" placeholder="Street Address" type="text" id="streetAddress" name="streetAddress" autocomplete="address-level3" value="{{ old('streetAddress', $cafe->street_address) }}" />
                                @error('streetAddress')
                                <x-alert.error>{{ $message}}</x-alert.error>
                                @enderror
                            </div>
                            <div>
                                <label class="sr-only" for="postalCode">Postal Code</label>
                                <input class="w-full rounded-lg border-gray-200 focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 p-3 text-sm" placeholder="Postal" type="text" id="postalCode" name="postalCode" autocomplete="postal-code" value="{{ old('postalCode', $cafe->postalcode) }}" />
                                @error('postalCode')
                                <x-alert.error>{{ $message}}</x-alert.error>
                                @enderror
                            </div>
                        </div>

                        <div class="sm:flex flex-row md:justify-between justify-start items-center">
                            <div class="flex sm:justify-center justify-between border-gray-200 rounded p-3 mr-5 text-gray-500 items-center">
                                <p class="pr-3 ext-sm">Wifi:</p>
                                <!--First radio-->
                                <div>
                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="radio" name="wifi" id="wifiRadio1" value="Yes" {{ $cafe->wifi == null || $cafe->wifi == 'Yes' ? 'checked' : '' }} />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="wifiRadio1">Yes</label>
                                    </div>
                                    <!--Second radio-->
                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="radio" name="wifi" id="wifiRadio2" value="No" {{ $cafe->wifi == 'No' ? 'checked' : '' }} />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="wifiRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex sm:justify-center justify-between border-gray-200 rounded p-3 mr-5 text-gray-500 items-center">
                                <p class="pr-3 text-sm">Outlet: </p>
                                <!--First radio-->
                                <div>
                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="radio" name="outlet" id="outletRadio1" value="Yes" {{ $cafe->outlet == 'Yes' || $cafe->outlet == null ? 'checked' : '' }}/>
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="outletRadio1">Yes</label>
                                    </div>
                                    <!--Second radio-->
                                    <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:border-primary dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]" type="radio" name="outlet" id="outletRadio2" value="No" {{ $cafe->outlet == 'No' ? 'checked' : '' }}/>
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="outletRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="sr-only" for="parking">Parking Access</label>
                            <input class="w-full rounded-lg border-gray-200 focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 p-3 text-sm" placeholder="Parking Access" type="text" id="parking" name="parking" value="{{ old('parking', $cafe->parking) }}" />
                            @error('parking')
                            <x-alert.error>{{ $message}}</x-alert.error>
                            @enderror
                        </div>

                        <div>
                            <label class="sr-only" for="description">Description</label>
                            <textarea class="w-full rounded-lg border-gray-200 focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 p-3 text-sm" placeholder="Description" rows="8" id="description" name="description">{{ old('description', $cafe->description) }}</textarea>
                            @error('description')
                            <x-alert.error>{{ $message}}</x-alert.error>
                            @enderror
                        </div>

                        <div>
                            <x-cafe.form.images></x-cafe.form.images>
                        </div>

                        <div id="menu-fields">
                            <!-- menu field added here -->
                            @if($cafe->menus)
                            @foreach($cafe->menus as $index => $menu)
                            <div class="menu-field items-center grid grid-cols-1 gap-4 text-center sm:grid-cols-3 py-3">
                                <div>
                                    <input class="rounded-lg w-full focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2" name="menu_name[{{ $index }}]" placeholder="Menu name" value="{{ old('menu_name.' . $index, $menu->name) }}">
                                </div>
                                <div>
                                    <input class="rounded-lg w-full focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 hide-spin" step="0.01" type="number" name="menu_price[{{ $index }}]" placeholder="Price" value="{{ old('menu_price.' . $index, $menu->price) }}">
                                </div>
                                <div>
                                    <button type="button" class="w-full remove-menu bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
                                </div>
                                <div>
                                    <input type="hidden" name="menu_ids[{{ $index }}]" value="{{ old('menu_ids.$index', $menu->id) }}">
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                        @error('menu_name.*')
                        <x-alert.error>{{ $message}}</x-alert.error>
                        @enderror
                        @error('menu_price.*')
                        <x-alert.error>{{ $message}}</x-alert.error>
                        @enderror
                        <button type="button" id="add-menu" class="px-5 py-4 w-full text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-lime-600 lg:px-10 rounded-xl hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">Add Menu and Price</button>

                    </form>

                    <div class="mt-4">
                        <button type="submit" form="update" class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const arrayData = [];
        let id = 1;
        const caProvince = [
            'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador', 'Nova Scotia', 'Ontario', 'Prince Edward Island', 'Quebec',
            'Saskatchewan', 'Northwest Territories', 'Nunavut', 'Yukon'
        ];
        const usStates = [
            'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois',
            'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana',
            'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania',
            'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        ];
        for (i = 0; i < caProvince.length; i++) {
            const data = {
                id: id++,
                name: caProvince[i],
                country_category_id: "1"
            };
            arrayData.push(data);
        }

        for (i = 0; i < usStates.length; i++) {
            const data = {
                id: id++,
                name: usStates[i],
                country_category_id: "2"
            };
            arrayData.push(data);
        }

        function provinceList() {
            var e = document.getElementById("country");;
            var value = e.options[e.selectedIndex].getAttribute("data-val");
            return {
                id: "",
                name: "",
                datas: value == "1" ? arrayData.slice(0, 13) : arrayData.slice(14),
                changeProvince() {
                    e = document.getElementById("country");;
                    value = e.options[e.selectedIndex].getAttribute("data-val");
                    this.datas = arrayData.filter((i) => {
                        return i.country_category_id == value;
                    })
                }
            };
        }

        document.addEventListener('DOMContentLoaded', function() {
            const addMenuButton = document.getElementById('add-menu');
            const menuFieldsContainer = document.getElementById('menu-fields');

            addMenuButton.addEventListener('click', function() {
                const newMenuField = document.createElement('div');
                newMenuField.className = 'menu-field items-center grid grid-cols-1 gap-4 text-center sm:grid-cols-3 py-3';
                newMenuField.innerHTML = `
                <div>
                    <input class="rounded-lg w-full focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2" name="menu_name[]" placeholder="Menu name" value="{{ old('menu_name[]') }}">
                </div>
                <div>
                    <input class="rounded-lg w-full focus:ring-0 focus:outline-none focus:border-lime-400 focus:border-2 hide-spin" type="number" step="0.01" name="menu_price[]" placeholder="Price" value="{{ old('menu_price[]') }}">
                </div>
                <div>
                    <button type="button" class="w-full remove-menu bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">Delete</button>
                </div>
            `;
                menuFieldsContainer.appendChild(newMenuField);
                // delete button
                const removeButtons = menuFieldsContainer.querySelectorAll('.remove-menu');
                removeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        button.closest('.menu-field').remove();
                    });
                });

            });

        });

        document.addEventListener('DOMContentLoaded', function() {
            const removeButtons = document.querySelectorAll('.remove-menu');

            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const menuField = button.closest('.menu-field');
                    if (menuField) {
                        menuField.remove();
                    }
                });
            });
        });
    </script>

</body>

</html>