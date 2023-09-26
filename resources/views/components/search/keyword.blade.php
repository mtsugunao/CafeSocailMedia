<form action="{{ route('cafe.search.keyword') }}" method="GET">
  <div class="relative flex justify-center">
        <input
          type="search"
          name="keyword"
          class="block w-full min-w-0 px-3 py-[0.25rem] text-base font-normal leading-[1.6] rounded-l border border-solid
           border-neutral-300 bg-transparent bg-clip-padding text-neutral-700 outline-none transition duration-200 ease-in-out focus:border-primary
            focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200
             dark:placeholder:text-neutral-200 dark:focus:border-primary"
          placeholder="Cafe Name, City, Keyword..."
          aria-label="Search"
          aria-describedby="button-addon3" />

        <!-- 検索ボタン -->
        <button
          class="rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0"
          type="submit"
          id="button-addon3"
          data-te-ripple-init>
          Search
        </button>
  </div>
</form>