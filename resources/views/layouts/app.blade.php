<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css'])
    @livewireStyles
    <style>
        .absolute-container {
            position: relative;
            padding-bottom: 114px;
            min-height: 100vh;
        }

        .absolute-footer {
            width: 100%;
            position: absolute;
            left: 0;
            bottom: 0;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white absolute-container">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <x-footer />
    </div>
    @livewireScripts
</body>

</html>