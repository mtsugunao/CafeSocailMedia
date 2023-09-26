<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Post Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    <x-navigation/>
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl lg:py-24">
        <div class="flex w-full mx-auto">
            <div class="relative inline-flex items-center mx-auto align-middle">
                <div class="pb-12">
                    
                        <h1 class="text-center max-w-4xl text-2xl mb-5 font-bold leading-none tracking-tighter text-neutral-600 md:text-5xl lg:text-6xl lg:max-w-7xl">
                                Construct and Collaborate<br class="hidden md:block">
                                on Your Beloved Cafes!
                        </h1>

                        <div class="flex items-center lg:justify-between w-full lg:w-3/5 lg:flex-row flex-col mx-auto px-8 lg:space-x-4 lg:space-y-0 space-y-4 lg:px-0">
                            <div class="relative flex-grow w-4/5 lg:w-full">
                                <x-search.keyword/>
                            </div>
                            <div class="relative flex-grow lg:w-1/3 w-4/5">
                                <x-search.province :caProvince="$caProvince" :ca="$ca" :us="$us" :usStates="$usStates"></x-search.province>
                            </div>
                        </div>

                        <div class="py-10">
                          <p class="w-full font-serif text-center"><span class="md:text-3xl text-2xl font-bold sm:pr-10 sm:inline block text-center sm:mb-0 mb-5">New Posts</span>Why not try posting one yourself?</p>
                        </div>
              
                        @if(session('feedback.success'))
                        <p style="color: green">{{ session('feedback.success') }}</p>
                        @endif
                        <x-post.list :posts="$posts"></x-post.list>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function () {
  $(".more-link").each(function (v_n) {
    $(this).after('<div class="more-link-after"></div>');
    f_lessText(v_n);
  });
});

function f_moreText(v_n) {
  var e_text = $(".more-link").eq(v_n);
  var v_closeHeight = e_text.height();
  var v_poenHeight = e_text.css("height", "auto").height();
  e_text.height(v_closeHeight).animate({ height: v_poenHeight }, 150);
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
    e_more.css({ overflow: "hidden", "margin-bottom": "0" });
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
</script>
</body>
</html>