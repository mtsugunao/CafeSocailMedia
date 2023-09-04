<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@if (session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
@endif

@foreach($cafes as $cafe)
<a href="{{ route('cafe.detail.show', ['cafeId' => $cafe->id]) }}">{{ $cafe->name }}</a>
    <p> {{ $cafe->country }} {{ $cafe->province }} {{ $cafe->city }}</p>

    @foreach($menus as $menu)
        @if($cafe->id === $menu->cafe_id)
            <p>{{ $menu->name }} {{ $menu->price }}</p>
        @endif
    @endforeach

    @if ($cafe->image === null)
        <img src="{{ asset('default.png') }}" width="54" height="54" alt="">
    @else
        <?php
            $image = str_replace('public/', '', $cafe->image);
        ?>
        <img src="{{ asset('storage/'.$image) }}" width="54" height="54" alt="">
    @endif

    @auth
        <a href="{{ route('cafe.update.show', ['cafeId' => $cafe->id]) }}">Modify</a>
        <form action="{{ route('cafe.delete', ['cafeId' => $cafe->id]) }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit">Delete</button>
        </form>
    @endauth
@endforeach

</body>
</html>