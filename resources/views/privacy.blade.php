<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="w-full bg-white dark:bg-wickeddark">
        <x-navigation />
        <div class=" w-4/5 px-5 py-24 mx-auto lg:px-32">
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-10">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h1 class="font-bold text-2xl">Privacy Policy</h1>
                    </div>
                </div>
                <p>The MugNet operator (hereinafter referred to as the 'operator') shall establish the privacy policy as follows in order to comply with the Personal Information Protection Act and other relevant laws and to handle the personal information of users handled in the operation of MugNet (hereinafter referred to as the 'Service') with the utmost care.</p>
            </div>
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-5 border-b border-gray-200">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h2 class="font-semibold text-xl">1. About Privacy Policy</h2>
                    </div>
                </div>
                <p>1.1. User privacy is respected. This Privacy Policy contains information about the collection, use, and sharing of personal information.</p>
            </div>
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-5 border-b border-gray-200">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h2 class="font-semibold text-xl">2. Information the operator Collect</h2>
                    </div>
                </div>
                <p class="mb-5">2.1. The information that the operator obtains in this Service is as follows. Please note that there may be information that is not collected depending on the nature of the Service usage and provision:</p>
                <ul style="list-style: disc; padding-left: 40px;">
                    <li>User names, email addresses, profile information</li>
                    <li>Content posted by users</li>
                    <li>Information collected through cookies and similar tracking technologies</li>
                    <li>Data related to Site usage</li>
                </ul>
            </div>
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-5 border-b border-gray-200">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h2 class="font-semibold text-xl">3. Use of Information</h2>
                    </div>
                </div>
                <p class="mb-5">3.1. Collected information may be used for the following purposes:</p>
                <ul style="list-style: disc; padding-left: 40px;">
                    <li>Providing, maintaining, and improving services</li>
                    <li>Contacting and supporting users</li>
                    <li>Providing customized content and advertising</li>
                    <li>Complying with legal requirements</li>
                </ul>
            </div>
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-5 border-b border-gray-200">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h2 class="font-semibold text-xl">4. Sharing of Information</h2>
                    </div>
                </div>
                <p class="mb-5">4.1. Collected information may be shared with third parties under the following conditions:</p>
                <ul style="list-style: disc; padding-left: 40px;">
                    <li>User consent is obtained</li>
                    <li>Legal requirements necessitate sharing</li>
                    <li>Sharing is required to cooperate with external service providers to fulfill provided services</li>
                </ul>
            </div>
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-5 border-b border-gray-200">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h2 class="font-semibold text-xl">5. User Rights</h2>
                    </div>
                </div>
                <p class="mb-5">5.1. You have the right to:</p>
                <ul style="list-style: disc; padding-left: 40px;">
                    <li>Access your personal information</li>
                    <li>Correct inaccuracies in your personal information</li>
                    <li>Request the deletion of your personal information</li>
                    <li>Object to the processing of your personal information</li>
                </ul>
            </div>
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-5 border-b border-gray-200">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h2 class="font-semibold text-xl">6. Contact Us</h2>
                    </div>
                </div>
                <p>6.1. For questions or inquiries related to privacy, please<a class="text-sm text-gray-500 hover:text-gray-700 underline" href="{{ route('form') }}">&nbsp;Contact us</a></p>
            </div>
            <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
                <div class="mb-5 border-b border-gray-200">
                    <div class="flex flex-wrap items-baseline -mt-2">
                        <h2 class="font-semibold text-xl">7. Security</h2>
                    </div>
                </div>
                <p>7.1. The operator take reasonable measures to protect your information from unauthorized access, disclosure, alteration, and destruction.</p>
            </div>
        </div>
        <x-footer/>
    </section>
</body>

</html>