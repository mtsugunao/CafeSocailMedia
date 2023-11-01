<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Posts</title>
  @vite(['resources/css/app.css'])
  @livewireStyles
  <style>
    .post-option>summary {
      list-style: none;
      cursor: pointer;
    }

    .post-option[open]>summary::before {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      z-index: 10;
      display: block;
      content: " ";
      background: transparent;
    }

    .options {
      background-color: #e5e7eb;
    }
  </style>
   @stack('css')
</head>
<body>
  <section class="w-full bg-white dark:bg-wickeddark">
    <x-navigation/>
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
      <div class="flex w-full mx-auto">
        <div class="relative md:w-4/5 w-full inline-flex items-center mx-auto justify-center align-middle">
          <div class="pb-12 w-full mx-10">

            <div class="py-10">
              <p class="max-w-4xl lg:max-w-6xl font-serif text-center"><span class="md:text-3xl text-2xl font-bold sm:pr-10 sm:inline block text-center sm:mb-0 mb-5">New Posts</span>Why not try posting one yourself?</p>
            </div>

            @if(session('feedback.success'))
            <p style="color: green">{{ session('feedback.success') }}</p>
            @endif
            <x-post.list :posts="$posts"></x-post.list>
          </div>
        </div>
      </div>
        {{ $posts->links('vendor.pagination.tailwindPagination') }}
    </div>
    <x-footer/>
  </section>
  @livewireScripts
</body>

</html>