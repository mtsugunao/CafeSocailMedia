<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'Contact Us')</title>
	<link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
	<link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
  	<link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
</head>
<body>

<header>{{-- // header --}}</header>

<main>@yield('content')</main>

<footer>{{-- // footer  --}}</footer>

</body>
</html>