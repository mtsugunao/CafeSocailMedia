<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<section class="w-full bg-white dark:bg-wickeddark">
<x-navigation/>
<div class=" w-4/5 px-5 py-24 mx-auto lg:px-32">
    <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
        <div class="mb-5 border-b border-gray-200">
            <div class="flex flex-wrap items-baseline -mt-2">
                <h2 class="font-semibold">About Us</h2>
            </div>
        </div>
        <p class="mb-5">Welcome to MugNet - Your Social Cafe Hub!</p>
        <p>At MugNet, we're more than just a website; we're a vibrant online community where coffee lovers and cafe enthusiasts unite. Our mission is to create a space where you can share your coffee experiences, connect with friends, and help build a comprehensive database of cafes from around the world.</p>
    </div>
    <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
        <div class="mb-5 border-b border-gray-200">
            <div class="flex flex-wrap items-baseline -mt-2">
                <h2 class="font-semibold">Our Social Coffee Experience</h2>
            </div>
        </div>
        <p>Are you passionate about coffee? So are we! MugNet offers a unique social media function that allows you to post about your coffee adventures, discover what your friends are sipping on, and even find new cafe gems to explore. Whether it's a beautifully crafted latte, a cozy corner cafe, or a hidden gem you've stumbled upon, share it with our coffee-loving community. Connect with friends, like-minded individuals, and fellow coffee enthusiasts to fuel your caffeine conversations.</p>
    </div>
    <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
        <div class="mb-5 border-b border-gray-200">
            <div class="flex flex-wrap items-baseline -mt-2">
                <h2 class="font-semibold">Discover & Share Cafe Gems</h2>
            </div>
        </div>
        <p>Tired of the same old coffee routine? Our search bar is your gateway to a world of coffee discovery. Looking for that perfect espresso in a new city, a cozy cafe for your next study session, or a hidden gem for your next date night? Simply enter your search criteria, and watch as our database comes to life, delivering personalized cafe recommendations based on user reviews and ratings. But here's the best part: our database is a collaborative effort. You can contribute to it by registering cafe data, including cafe names, locations, menus, and more. Help fellow coffee lovers find their next favorite spot, and let's build the most extensive coffee database together.</p>
    </div>
    <div class="flex flex-col w-full mx-auto mb-5 prose text-left prose-md">
        <div class="mb-5 border-b border-gray-200">
            <div class="flex flex-wrap items-baseline -mt-2">
                <h2 class="font-semibold">Join the MugNet Community</h2>
            </div>
        </div>
        <p class="mb-5">Ready to embark on a journey of coffee exploration and connection? Sign up for MugNet today and become a part of our passionate coffee community. Whether you're sharing your latest coffee masterpiece, connecting with friends, or contributing to our cafe database, we're here to make your coffee adventures even more enjoyable.</p>
        <p>Thank you for choosing MugNet as your go-to destination for all things coffee. Together, let's brew up a world of coffee experiences!</p>
    </div>
</div>
<x-footer/>
</section>
</body>
</html>