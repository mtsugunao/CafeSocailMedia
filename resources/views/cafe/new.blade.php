<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cafe register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
    .hover-option:hover {
        background-color: red;
    }
</style>
</head>

<body>
    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->
    <section class="bg-gray-100">
        <x-navigation/>
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2 lg:py-12">
                    @if (session('feedback.success'))
                    <p style="color: green;">{{ session('feedback.success') }}</p>
                    @endif
                    <p class="max-w-xl text-lg">
                        Assist me in constructing a cafe database. If you're uncertain about the input fields, leave them blank. After registration, any Cafe-In member can edit the information.
                    </p>

                    <div class="mt-8">
                        <p>Ensure that there are no duplicate entries of the cafe during the registration process.</p>
                        <p>Please verify that the cafe information you wish to register does not already exist.</p>
                    </div>

                </div>

                <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                    <form action="{{ route('cafe.create') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="sr-only" for="cafeName">Cafe Name</label>
                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Cafe Name" type="text" name="cafeName" id="cafeName"/>
                            @error('cafeName')
                            <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="country" class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="country" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option hidden value="">Select a country</option>
                                    <option value="Canada" class="hover-option">Canada</option>
                                    <option value="United States">United States</option>
                                </select>
                                @error('country')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="province" class="sr-only block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                                <select id="province" name="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option hidden value="">Select a country first</option>
                                </select>
                                @error('province')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                            <div>
                                <label class="sr-only" for="city">City</label>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="City" type="text" id="city" name="city" autocomplete="address-level2"/>
                                @error('city')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="sr-only" for="streetAddress">Street Address</label>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Street Address" type="text" id="streetAddress" name="streetAddress" autocomplete="address-level3"/>
                                @error('streetAddress')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="sr-only" for="postalCode">Postal Code</label>
                                <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Postal" type="text" id="postalCode" name="postalCode" autocomplete="postal-code"/>
                                @error('postalCode')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="sr-only" for="parking">Parking Access</label>
                            <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Parking Access" type="text" id="parking" name="parking" />
                            @error('parking')
                            <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="sr-only" for="description">Description</label>
                            <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Description" rows="8" id="description" name="description"></textarea>
                            @error('description')
                            <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <x-cafe.form.images></x-cafe.form.images>
                        </div>

                        <div id="menu-fields">
                            <!-- menu field added here -->
                        </div>
                        @error('menu_name.*')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror
                        @error('menu_price.*')
                        <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                        @enderror

                        <button type="button" id="add-menu" class="px-5 py-4 w-full text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-lime-600 lg:px-10 rounded-xl hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">Add Menu and Price</button>

                        <div class="mt-4">
                            <button type="submit" class="inline-block w-full rounded-lg bg-black px-5 py-3 font-medium text-white sm:w-auto">
                                Send Enquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var selectedCountry = $(this).val();
                var provinceSelect = $('#province');
                provinceSelect.empty();

                if (selectedCountry === 'Canada') {
                    const caProvince = [
                        'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador', 'Nova Scotia', 'Ontario', 'Prince Edward Island', 'Quebec',
                        'Saskatchewan', 'Northwest Territories', 'Nunavut', 'Yukon'
                    ];

                    caProvince.forEach(function(province) {
                        provinceSelect.append('<option value="' + province + '" class="canada-option">' + province + '</option>');
                    });

                } else if (selectedCountry === 'United States') {
                    const usStates = [
                        'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois',
                        'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana',
                        'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania',
                        'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
                    ];

                    usStates.forEach(function(state) {
                        provinceSelect.append('<option value="' + state + '" class="us-option">' + state + '</option>');
                    });

                }
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const addMenuButton = document.getElementById('add-menu');
            const menuFieldsContainer = document.getElementById('menu-fields');
            addMenuButton.addEventListener('click', function() {
                const newMenuField = document.createElement('div');
                newMenuField.className = 'menu-field flex items-center grid grid-cols-1 gap-4 text-center sm:grid-cols-3 py-3';
                newMenuField.innerHTML = `
                <div>
                    <input class="rounded-lg w-full" name="menu_name[]" placeholder="Menu name" value= "{{ old('menu_name[]') }}">
                </div>
                <div>
                    <input class="rounded-lg w-full" type="text" name="menu_price[]" placeholder="Price" value="{{ old('menu_price[]') }}">
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
    </script>

</body>

</html>