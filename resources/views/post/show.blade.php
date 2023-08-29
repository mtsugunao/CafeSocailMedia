<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post Form</title>
</head>
<body>
    <h1>Cafe SNS</h1>
    @if(session('feedback.success'))
    <p style="color: green">{{ session('feedback.success') }}</p>
    @endif
    @auth
    <a href="{{ route('post.new') }}">Do Post</a>
    @endauth
    <div>
    @foreach($posts as $post)
        @foreach($post->images as $image)
            <img src="{{ asset('storage/'. $image->name) }}" width="54" height="54" alt="">
        @endforeach
        <p>Name: {{ $post->cafe->name }}</p>
        <p>Content: {{ $post->content }}</p>
        @if(\Illuminate\Support\Facades\Auth::id() === $post->user_id)
        <a href="{{ route('post.update.show', ['postId' => $post->id]) }}">Modify</a>
        <form action="{{ route('post.delete', ['postId' => $post->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
        </form>
        @else
        You're not allowed to Modify
        @endif
    @endforeach
    </div>
</body>
</html>