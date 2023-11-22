<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-50-green">
    {{ $slot }}
</body>
</html>