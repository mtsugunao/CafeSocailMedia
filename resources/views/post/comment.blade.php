<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
    <style>
        .options {
      background-color: #ffffff;
        }
        .options:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body>
    <x-navigation />
    <x-post.comment :post='$post' :comments='$comments'>
    </x-post.comment>
    @livewireScripts
</body>

</html>