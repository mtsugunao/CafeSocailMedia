<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Mugnet, an interactive web platform, brings together cafe enthusiasts through a unique blend of technology and creativity. Connect across social media platforms and actively contribute as we build our own database, creating a community-driven space for cafe lovers worldwide.">
  <meta name="keywords" content="cafe, sns, coffee, social media, database">
  <title>MugNet</title>
  <link rel="icon" href="{{ asset('images/favicon-32.ico') }}">
  <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}" sizes="180x180">
  <link rel="icon" type="image/png" href="{{ asset('images/MugNet.png') }}" sizes="192x192">
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

    body {
      display: flex;
      flex-flow: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }
  </style>
  @stack('css')
</head>
<body>
  <main class="w-full bg-white dark:bg-wickeddark">
    <x-navigation />
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
      <div class="flex w-full mx-auto">
        <div class="relative inline-flex justify-between items-center mx-auto align-middle">
          <div class="pb-12">

            <h1 class="text-center max-w-4xl text-2xl mb-5 font-bold leading-none tracking-tighter text-neutral-600 md:text-5xl lg:text-6xl lg:max-w-7xl">
              Construct and Collaborate<br class="hidden md:block">
              on Your Beloved Cafes!
            </h1>

            <div class="flex lg:flex-row flex-col lg:items-center lg:justify-between w-full lg:w-4/5 mx-auto px-8 lg:space-x-4 lg:space-y-0 space-y-4 lg:px-0">
              <div class="relative w-full">
                <x-search.keyword />
              </div>
              <div class="relative lg:w-1/3 w-full">
                <x-search.province :caProvince="$caProvince" :ca="$ca" :us="$us" :usStates="$usStates"></x-search.province>
              </div>
            </div>

            <div class="py-10">
              <p class="w-full font-serif text-center"><span class="md:text-3xl text-2xl font-bold sm:pr-10 sm:inline block text-center sm:mb-0 mb-5">New Posts</span>Why not try posting one yourself?</p>
            </div>

            @if(session('feedback.success'))
            <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
            @endif
            <div class="px-3 md:flex md:flex-row flex-col md:justify-between">
              <div class="bg-white lg:m-10 mx-auto md:w-1/3 w-full justify-center">
                <p>
                  To make a post, please select a café where you visited by searching in eigther search bar or area and share your experiences here for everyone to enjoy! If you don't see any café you wish to post,
                  please register first.
                </p>
              </div>
              <x-post.list :posts="$posts"></x-post.list>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full flex justify-center ">
        <a href="{{ route('post.posts') }}" class="px-6 py-3 text-gray-100 no-underline bg-lime-500 rounded hover:bg-lime-600 hover:underline hover:text-gray-200">More Posts</a>
      </div>
    </div>
  </main>
  <x-footer />
  @livewireScripts
  <script>
    const countDown = document.querySelector('#count-down');
    const length = document.querySelector('.length');
    const maxLength = 255;
    countDown.addEventListener('input', () => {
      length.textContent = maxLength - countDown.value.length;
      if (maxLength - countDown.value.length < 0) {
        length.style.color = 'red';
      } else {
        length.style.color = '#444';
      }
    }, false);
  </script>
</body>

</html>