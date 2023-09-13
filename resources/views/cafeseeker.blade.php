<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>{{ $user->name }}</h1>
    @if(Auth::user()->id !== $user->id)
    @livewire('follow', ['user' => $user])
    @endif
    @foreach($posts as $post)
    <p>{{ $post->user->name }} {{ $post->created_at }}</p>
    <p>{{ $post->cafe->name }}</p>
    <p>{{ $post->content }}</p>
    @endforeach
    
</body>
</html>