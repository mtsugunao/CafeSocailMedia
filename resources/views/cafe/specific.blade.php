<x-layout title="Post">
    <p>{{ $cafe->name }}</p>
    <p>{{ $cafe->country }}</p>
    <p>{{ $cafe->province }}</p>
    <p>{{ $cafe->city }}</p>
    <h1>Post your experience!</h1>
    @auth
    @livewire('modal', ['cafe' => $cafe, 'posts' => $posts])
    @endauth
</x-layout>