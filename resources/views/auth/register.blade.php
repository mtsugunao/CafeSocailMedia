<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- profile image -->
        <div class="mt-4">
            <x-picture-input />
            <x-input-error class="mt-2" :messages="$errors->get('picture')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center flex-col mt-4" x-data="{ showModal: false, isChecked: false }" @keydown.escape="showModal = false" x-cloak>
            <!-- Terms of Conditions -->
            <div class="flex items-center justify-center mt-4">
                <label for="checkbox" class="pr-3">I have read and agree to the&nbsp;<a @click="showModal = true" class="underline hover:text-gray-700 text-gray-500">Terms of Service</a></label>
                <input type="checkbox" id="checkbox" x-model="isChecked">
            </div>

            <div class="fixed inset-0 z-30 flex items-center justify-center bg-black bg-opacity-50" x-show="showModal">
                <div class="max-w-5xl py-3 mx-auto text-left bg-white rounded shadow-lg relative w-full h-full md:w-1/2 md:h-auto" @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <!-- Title / Close-->
                    <header class="flex items-center justify-center relative">
                        <h1 class="text-center m-10 md:mb-4 sm:text-4xl text-3xl font-semibold text-black max-w-none">MugNet Terms of Service Summary</h1>
                        <button type="button" @click="showModal = false" class="z-50 cursor-pointer pr-2 pb-2 absolute top-0 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </header>

                    <div class="relative overflow-y-auto max-h-[80vh]">
                        <div class="p-5">
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">1. Applicability</h2>
                                    </div>
                                </div>
                                <p>This Terms of Service (hereinafter referred to as the "Terms") govern the use of services provided by the MugNet operator (hereinafter referred to as the "operator"). Users are considered to have agreed to all of these Terms when using the Service, whether it involves posting or viewing content, purchasing goods, or any other method of using the Service</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">2. Registration</h2>
                                    </div>
                                </div>
                                <p>To post content on this Service, you must first agree to these Terms and register your information with this Service in advance</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">3. Ownership of Rights</h2>
                                    </div>
                                </div>
                                <p>Copyright and other intellectual property rights of posted content belong to the users or third parties to whom users have granted licenses, and the operator does not acquire any rights. However, users grant the operator a non-exclusive right, without geographical restrictions, to reproduce, publicly transmit (including making it available to the public), and adapt the posted content at no cost, for the purpose of operating this Service, advertising, and creating derivative works</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">4. Prohibited Acts</h2>
                                    </div>
                                </div>
                                <p>Users must not engage in any of the following acts or acts that the operator deems as such when using the Service. These acts include violations of laws, fraud, offensive expressions, and more</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">5. Suspension of the Service</h2>
                                    </div>
                                </div>
                                <p>The operator may, without prior notice to users, suspend or interrupt the provision of all or part of the Service under specific circumstances</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">6. Deletion of Registration, etc.</h2>
                                    </div>
                                </div>
                                <p>The operator may, without prior notice or warning, delete or hide the member's posted content, temporarily suspend all use of the Service for the member, including the purchase of products, or delete the member's registration if the member falls under specific circumstances or if the operator reasonably determines that the member falls under such circumstances</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">7. Deletion of Account</h2>
                                    </div>
                                </div>
                                <p>Users may withdraw from the Service and delete their registration as members by completing the procedures specified by the operator</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">8. Confidentiality</h2>
                                    </div>
                                </div>
                                <p>Users shall treat as confidential any non-public information disclosed by the operator to the users in connection with the Service, unless the operator has provided prior written consent, except as otherwise provided</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">9. Changes to this Agreement:</h2>
                                    </div>
                                </div>
                                <p>The operator may change this Agreement if deemed necessary. The revised terms and conditions will take effect from the effective date provided by the operator, and users are deemed to have agreed to the revised Agreement by continuing to use the Service after the changes</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">10. Contact/Notification:</h2>
                                    </div>
                                </div>
                                <p>Inquiries or notifications from users to the operator regarding the Service, as well as notifications or communications from the operator to users, shall be conducted in the manner specified by the operator. The operator will never contact users directly to request their credit card number or personal information</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">11. Exemption, etc.: </h2>
                                    </div>
                                </div>
                                <p>The operator makes no explicit or implied warranties regarding the suitability of the Service for specific purposes, its expected features, and other matters. The operator does not assume any obligation to correct defects related to these matters</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">11. Exemption, etc.: </h2>
                                    </div>
                                </div>
                                <p>The operator makes no explicit or implied warranties regarding the suitability of the Service for specific purposes, its expected features, and other matters. The operator does not assume any obligation to correct defects related to these matters</p>
                            </div>
                            <div class="flex flex-col w-full mx-auto mb-5 text-left">
                                <div class="mb-5 border-b border-gray-200">
                                    <div class="flex flex-wrap items-baseline -mt-2">
                                        <h2 class="font-semibold text-xl">12. More Details</h2>
                                    </div>
                                </div>
                                <p>You can read more details about&nbsp;<a href="{{ route('termsOfService') }}" class="underline hover:text-gray-700 text-gray-500">Terms of Service&nbsp;</a>or&nbsp;<a href="{{ route('privacy') }}" class="underline text-gray-500 hover:text-gray-700">Privacy Policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4" x-bind:disabled="!isChecked">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </div>

    </form>
</x-guest-layout>