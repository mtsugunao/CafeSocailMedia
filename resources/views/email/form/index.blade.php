<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  @vite(['resources/css/app.css'])
  @livewireStyles
  <style>
    body {
      display: flex;
      flex-flow: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }
  </style>
</head>

<body>
  <main class="bg-white dark:bg-gray-900">
    <x-navigation />
    <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Contact Us</h2>
      <p class="mb-4 lg:mb-8 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Got a technical issue? Want to send feedback about a MugNet feature? Let us know.</p>
      @if(session('feedback.success'))
      <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
      @endif
      <form action="{{ route('form') }}" class="space-y-8" method="POST">
        @csrf
        <div>
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Full Name</label>
          <input type="text" id="name" name="name" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" value="{{ old('name') }}" placeholder="provide us your name" required>
          @error('name')
          <x-alert.error>{{ $message}}</x-alert.error>
          @enderror
        </div>
        <div>
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
          <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" value="{{ old('email') }}" placeholder="example@mugnet.com" required>
          @error('email')
          <x-alert.error>{{ $message}}</x-alert.error>
          @enderror
        </div>
        <div class="sm:col-span-2">
          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Message</label>
          <textarea id="message" rows="6" type="text" name="message" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a message...">{{ old('message') }}</textarea>
          @error('message')
          <x-alert.error>{{ $message}}</x-alert.error>
          @enderror
        </div>
        <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-lime-700 sm:w-fit hover:bg-lime-800 focus:ring-4 focus:outline-none focus:ring-lime-300 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800">Send message</button>
      </form>
    </div>
  </main>
  <x-footer />
  @livewireScripts
</body>

</html>