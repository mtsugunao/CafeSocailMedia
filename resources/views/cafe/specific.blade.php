<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $cafe->name }}</title>
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
    @stack('js')
</head>

<body>
    <section class="w-full bg-white dark:bg-wickeddark">
        <x-navigation />
        <div class="relative items-center lg:w-4/5 w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
            <div class="flex w-full mx-auto">
                <div class="relative pb-12 lg:w-4/5 w-full items-center mx-auto align-middle">
                    <div class="flex-col md:flex md:flex-row mb-7 items-center">
                        <div class="flex flex-col justify-center w-full items-start p-3">
                            <div class="flex flex-row justify-between w-full items-center">
                                <h1 class="w-full text-4xl font-bold py-6">{{ $cafe->name }}</h1>
                            </div>
                            <p class="text-gray-600 font-semibold text-lg">{{ $cafe->street_address }},&nbsp;<span>{{ $cafe->city}},&nbsp;</span><span>{{ $cafe->province }},&nbsp;</span><span>{{ $cafe->country }},&nbsp;</span><span>{{ $cafe->postalcode }}</span></p>
                        </div>
                        <div class="flex-col w-full">
                            <div class="flex-row px-3">
                                <div class="sm:p-2 flex justify-start px-3 py-2 md:justify-end">
                                    <a href="{{ route('cafeseeker', ['userId' => $cafe->user->id]) }}" class="font-semibold text-sm text-gray-500 hover:underline"><span>Registered by&nbsp;</span>{{ $cafe->user->name }}</a>
                                </div>
                                <div class="rounded-lg sm:px-2 flex justify-start px-3 md:justify-end">
                                    <a href="{{ route('cafe.update.show', ['cafeId' => $cafe->id]) }}" class="text-sm text-gray-500 hover:underline">Update</a>
                                </div>
                            </div>
                            <x-post.cafe :cafe="$cafe"></x-element.edit>
                        </div>
                    </div>

                    <div>
                        @if(isset($cafe->menus))
                        <div class="relative items-center w-full p-3 mx-auto max-w-7xl">
                            <div class="grid w-full grid-cols-1 gap-6 mx-auto sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($cafe->menus as $menu)
                                    <div class="inline-flex justify-between w-full">
                                        <h1 class="mb-3 text-xl font-semibold leading-none tracking-tighter text-neutral-600">{{ $menu->name }}</h1>
                                        <span>{{ $cafe->country === 'Canada' ? $menu->price . ' CAD' : $menu->price . ' USD' }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if(session('feedback.success'))
                        <p style="color: green" class="text-lg p-2 justify-start">{{ session('feedback.success') }}</p>
                        @endif
                        <x-post.list :posts="$posts"></x-post.list>
                    </div>
                </div>
            </div>
            {{ $posts->links('vendor.pagination.tailwindPagination') }}
        </div>
    </section>
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $(".more-link").each(function(v_n) {
                $(this).after('<div class="more-link-after"></div>');
                f_lessText(v_n);
            });
        });

        function f_moreText(v_n) {
            var e_text = $(".more-link").eq(v_n);
            var v_closeHeight = e_text.height();
            var v_poenHeight = e_text.css("height", "auto").height();
            e_text.height(v_closeHeight).animate({
                height: v_poenHeight
            }, 150);
            $(".more-link-after:eq(" + v_n + ")").html(
                '<a href="javascript:void(0)" onclick="f_lessText(' + v_n + ')">Close</a>'
            );
        }

        function f_lessText(v_n) {
            var e_more = $(".more-link:eq(" + v_n + ")");
            var e_moreAfter = $(".more-link-after:eq(" + v_n + ")");

            var v_max = 3;
            if (e_more.data("max")) {
                v_max = e_more.data("max");
            }
            var e_text = e_more;
            var v_textHeight = parseFloat(e_more.css("height"));
            var v_fontHeight = parseFloat(e_more.css("line-height"));
            if (!v_fontHeight) {
                v_fontHeight = parseFloat(e_more.css("font-size")) * 1.5;
            }
            var v_moreMaxHeight = v_fontHeight * v_max;
            if (v_moreMaxHeight < v_textHeight) {
                e_more.css({
                    overflow: "hidden",
                    "margin-bottom": "0"
                });
                e_more.height(v_moreMaxHeight);
                e_moreAfter.css({
                    "font-size": e_text.css("font-size"),
                    "line-height": e_text.css("line-height")
                });
                e_moreAfter.html(
                    '<div><a href="javascript:void(0)" onclick="f_moreText(' +
                    v_n +
                    ')">･･･Read more</a></div>'
                );
            }
        }

        const countDown = document.querySelector('#count-down');
        const length = document.querySelector('.length');
        const maxLength = 140;
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