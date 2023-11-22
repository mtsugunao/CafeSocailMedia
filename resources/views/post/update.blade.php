<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Form</title>
    <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
  <link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
</head>
<body>
    <h1>Modify your post</h1>
        <div>
            <p>Post form</p>
            <a href="{{ route('post.show') }}">navigate to posts</a>
            @if(session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            <form action="{{ route('post.update.put', ['postId' => $post->id]) }}" method="post">
                @method('PUT')
                @csrf
                <label for="post-content">Content</label>
                <span>up to 140 words</span>
                <textarea name="post" id="post-content" type="text">{{ $post->content }}</textarea>
                @error('post')
                <p style="color: red">{{ $message }}</p>
                @enderror
                <select name="cafe_id" id="cafe_id">
                @foreach($cafes as $cafe)
                    @if($post->cafe_id === $cafe->id)
                    <option value="{{ $cafe->id }}" selected>{{ $cafe->name }}</option>
                    @else
                    <option value="{{ $cafe->id }}">{{ $cafe->name }}</option>
                    @endif
                @endforeach
                </select>
                <button type="submit">Modify</button>
            </form>
        </div>
</body>
</html>