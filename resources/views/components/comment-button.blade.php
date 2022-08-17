@props(['link', 'comments_count' => null])

<a href="{{ $link }}">
    <div class="font-bold text-gray-500 flex justify-center items-center w-full p-2 hover:bg-gray-100 rounded-lg hover:ease-in-out transition duration-200">
        <i class="w-5 h-5 mr-2">
            <svg height="20" version="1.1" viewBox="0 0 48 48" width="20" xml:space="preserve"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g
                    id="Expanded">
                    <g>
                        <g>
                            <path
                                d="M6,45.414V36H3c-1.654,0-3-1.346-3-3V7c0-1.654,1.346-3,3-3h42c1.654,0,3,1.346,3,3v26c0,1.654-1.346,3-3,3H15.414     L6,45.414z M3,6C2.448,6,2,6.448,2,7v26c0,0.552,0.448,1,1,1h5v6.586L14.586,34H45c0.552,0,1-0.448,1-1V7c0-0.552-0.448-1-1-1H3z     "/>
                        </g>
                        <g>
                            <circle cx="16" cy="20" r="2"/>
                        </g>
                        <g>
                            <circle cx="32" cy="20" r="2"/>
                        </g>
                        <g>
                            <circle cx="24" cy="20" r="2"/>
                        </g>
                    </g>
                </g></svg>
        </i>
        <div class="flex items-center">
            <span>Comment</span>
            @unless($comments_count < 1)
                <span class="ml-2 flex items-center justify-center w-6 h-6 bg-red-400 font-bold text-white rounded-full">{{ $comments_count }}</span>
            @endunless
        </div>
    </div>
</a>
