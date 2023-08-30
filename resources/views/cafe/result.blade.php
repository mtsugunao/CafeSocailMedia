<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
@if (count($searchResults) > 0)
    <h2>Result</h2>
    <ul>
        @foreach ($searchResults as $result)
            <li>
            <a href="{{ route('cafe.detail.show', ['cafeId' => $result->id]) }}">{{ $result->name }}</a>
            </li>
        @endforeach
    </ul>
@else
    <p>sorry couldn't find any cafe by the keyword</p>
    <a href="{{ route('cafe.search') }}">Please search here</a>
@endif
</body>
</html>