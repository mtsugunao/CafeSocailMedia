<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $user->name . "'s page" }}</title>
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
  </style>
   @stack('css')
</head>
<body>
  <section class="w-full bg-white dark:bg-wickeddark">
    <x-navigation />
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
      <div class="flex w-full mx-auto">
        <div class="relative md:w-4/5 w-full inline-flex items-center mx-auto justify-center align-middle">
            <div class="pb-8 w-full mx-10">

                <div class="sm:mb-0 mb-3 flex flex-row items-center justify-start space-x-10">
                    <img class="lg:h-24 lg:w-24 h-16 w-16 rounded-full" src="{{ isset($user->profile_image) ? image_url_profiles($user->profile_image) : asset('images/user_icon.png') }}" alt="" />
                    <p class="text-xl font-bold">{{ $user->name }}</p>
                    @auth
                    @if(Auth::user()->id !== $user->id)
                    <div class="flex justify-end w-full md:pr-10">
                    @livewire('follow', ['user' => $user])
                    </div>
                    @endif
                    @endauth
                </div>

            @if(session('feedback.success'))
            <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
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