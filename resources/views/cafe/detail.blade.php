<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (session('feedback.success'))
        <p style="color: green">{{ session('feedback.success') }}</p>
    @endif
    @foreach($cafes as $cafe)
    <p>{{ $cafe->name }} {{ $cafe->country }} {{ $cafe->province }} {{ $cafe->city }} {{$cafe->street_address }} {{ $cafe->postalcode }}</p>
    <p>{{ $cafe->parking }}</p>
    <p>{{ $cafe->description }}</p>
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