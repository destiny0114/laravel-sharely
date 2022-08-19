<div class='flex bg-white rounded-lg py-4 px-6 mb-8 shadow-md'>
    <div class='shrink-0 mr-8'>
        <a href="{{ route('profile', auth()->user()->username) }}">
            <img class='rounded-full w-12 h-12' src="{{ auth()->user()->avatar }}" alt="avatar">
        </a>
    </div>

    <div class='flex-1 relative'>
        <form method='POST' action="{{ route("create_tweet") }}" enctype="multipart/form-data">
            @csrf
            <textarea name="body" placeholder="What's happening?"
                class='p-2 w-full border-none resize-none bg-gray-50 ring-1 ring-slate-900/10 shadow-sm rounded-md'
                rows="3"></textarea>
            <hr class="my-4" />

            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <input id="file-input" name="media" type="file" class="hidden" />
                    <label for="file-input"
                           class="cursor-pointer p-2 hover:bg-blue-100 hover:shadow-md rounded-full transition ease-in-out duration-150">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                             viewBox="0 0 240 240">
                            <g id="surface125722079">
                                <path
                                    style=" stroke:none;fill-rule:nonzero;fill:rgb(23.137255%,50.980395%,96.470588%);fill-opacity:1;"
                                    d="M 32 40 C 23.160156 40 16 47.160156 16 56 L 16 184 C 16 192.839844 23.160156 200 32 200 L 208 200 C 216.839844 200 224 192.839844 224 184 L 224 56 C 224 47.160156 216.839844 40 208 40 Z M 184 64 C 192.839844 64 200 71.160156 200 80 C 200 88.839844 192.839844 96 184 96 C 175.160156 96 168 88.839844 168 80 C 168 71.160156 175.160156 64 184 64 Z M 72 96.015625 C 76.953125 96.015625 81.90625 97.90625 85.6875 101.6875 L 129.25 145.25 C 132.625 148.625 138.078125 148.59375 141.453125 145.21875 C 144.835938 141.84375 144.835938 136.351562 141.453125 132.96875 L 132.234375 123.765625 L 138.3125 117.6875 C 145.871094 110.128906 158.128906 110.128906 165.6875 117.6875 L 200 152 L 200 176 L 40 176 L 40 120 L 58.3125 101.6875 C 62.09375 97.90625 67.046875 96.015625 72 96.015625 Z M 72 96.015625 "/>
                            </g>
                        </svg>
                    </label>
                    <small id="file-chosen" class="ml-3 mt-1 max-w-sm font-bold text-sm truncate opacity-30 hidden">No file selected</small>
                    <div class="flex items-center">
                        @error("body", "media")
                        <p class='text-black/40 text-sm leading-none mx-3'>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class='bg-blue-400 rounded-full shadow px-4 py-1 text-white font-bold hover:bg-white hover:text-blue-400 hover:ring hover:ring-blue-200 focus:ring ring-blue-300 transition
    ease-in-out duration-150'>Tweet</button>
            </div>
        </form>
    </div>
</div>
