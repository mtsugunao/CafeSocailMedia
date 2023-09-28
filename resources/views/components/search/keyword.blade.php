<form action="{{ route('cafe.search.keyword') }}" method="GET">
  <div class="relative flex justify-center">
        <input
          type="search"
          name="keyword"
          class="block w-full min-w-0 px-3 py-[0.25rem] text-base font-normal focus:border-2 rounded-l border border-gray-300 bg-transparent bg-clip-padding text-neutral-700 transition duration-200 ease-in-out focus:text-neutral-700 dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 hover:bg-gray-200"
          placeholder="Cafe Name, City, Keyword..."
          aria-label="Search"
          aria-describedby="button-addon3"
          required/>
        <button
          class="rounded-r border-2 border-primary px-6 py-2 text-xs font-medium uppercase text-primary transition duration-150 ease-in-out hover:bg-gray-300 hover:border-gray-300 border-neutral-300 focus:outline-none focus:ring-0"
          type="submit"
          id="button-addon3"
          data-te-ripple-init>
          Search
        </button>
  </div>
</form>