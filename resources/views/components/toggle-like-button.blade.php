@props(['id', 'has_liked'])

<form action="{{ route('like', $id) }}" method="post">
    @csrf
    <button type="submit"
            class="font-bold text-gray-500 w-full p-2 hover:bg-gray-100 rounded-lg hover:ease-in-out transition  duration-200">
        <i class="inline-block w-5 h-5 align-middle">
            @if($has_liked)
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path d="M0 0H24V24H0z" fill="none"/>
                        <path
                            d="M2.808 1.393l18.384 18.385-1.414 1.414-3.747-3.747L12 21.485 3.52 12.993c-2.04-2.284-2.028-5.753.034-8.023L1.393 2.808l1.415-1.415zm2.172 10.23L12 18.654l2.617-2.623-9.645-9.645c-1.294 1.497-1.3 3.735.008 5.237zm15.263-6.866c2.262 2.268 2.34 5.88.236 8.236l-1.635 1.636-1.414-1.414 1.59-1.592c1.374-1.576 1.299-3.958-.193-5.453-1.5-1.502-3.92-1.563-5.49-.153l-1.335 1.198-1.336-1.197c-.35-.314-.741-.555-1.155-.723l-2.25-2.25c1.668-.206 3.407.289 4.74 1.484 2.349-2.109 5.979-2.039 8.242.228z"/>
                    </g>
                </svg>
            @else
                <svg height="20"
                     viewBox="0 0 512 512" width="20"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g
                        id="_x31_66_x2C__Heart_x2C__Love_x2C__Like_x2C__Twitter">
                        <g>
                            <path
                                d="M365.4,59.628c60.56,0,109.6,49.03,109.6,109.47c0,109.47-109.6,171.8-219.06,281.271    C146.47,340.898,37,278.568,37,169.099c0-60.44,49.04-109.47,109.47-109.47c54.73,0,82.1,27.37,109.47,82.1    C283.3,86.999,310.67,59.628,365.4,59.628z"
                                style="fill:#FF7979;"/>
                        </g>
                    </g>
                    <g id="Layer_1"/>
                </svg>
            @endif
        </i>

        <span
            class="inline-block align-middle">{{ $has_liked ? 'Dislike' : 'Like' }}</span>
    </button>
</form>
