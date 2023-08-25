<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Form</title>
</head>
<body>
    <h1>Post your experience!</h1>
        <div>
            <p>Post form</p>
            <a href="{{ route('post.show') }}">navigate to posts</a>
            @if(session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            <p>If you do not see a cafe that you wanted to add down below the select box, please add your cafe first!</p>
            <a href="{{ route('cafe.new') }}">Navigate to add a new cafe</a>
            <form action="{{ route('post.create') }}" method="post">
                @csrf
                <label for="post-content">Content</label>
                <span>up to 140 words</span>
                <textarea name="post" id="post-content" type="text"></textarea>
                @error('post')
                <p style="color: red">{{ $message }}</p>
                @enderror
                <select name="cafe_id" id="cafe_id">
                @foreach($cafes as $cafe)
                    <option value="{{ $cafe->id }}">{{ $cafe->name }}</option>
                @endforeach
                </select>
                <button type="submit">Post</button>
            </form>
        </div>
</body>
</html>