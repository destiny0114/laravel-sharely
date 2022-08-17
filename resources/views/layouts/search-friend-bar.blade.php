<div class="bg-white rounded-lg py-4 px-6 mb-6 shadow-md">
    <h1 class="text-xl font-bold select-none">Search Friend</h1>
    <div class="my-2">
        <div class="w-full border-t border-gray-200"></div>
    </div>
    <form method="GET" action="{{ route('explore') }}">
        <div class="flex justify-between items-center relative text-gray-700 focus-within:text-gray-500">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2"
                     viewBox="0 0 24 24" class="w-4 h-4">
                    <path
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <input type="search" name="search"
                   class="w-full pl-10 pr-4 bg-blue-100/25 text-sm border-0 rounded-md focus:border focus:outline-none focus:border-blue-400 focus:ring-1 focus:ring-blue-100 focus:text-black"
                   placeholder="Search Friend..." value="{{ request()->input('search') }}" autocomplete="off">

            <x-button class="ml-4">
                {{ __('Search') }}
            </x-button>
        </div>
    </form>

    @unless(empty($users))
        <div class="bg-blue-50 rounded-lg text-blue-300 p-1 mt-4 w-full text-center font-bold ">
            {{ $users->total() }} friends found
        </div>
    @endunless
</div>
