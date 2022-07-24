<div class='grid grid-cols-1 divide-y bg-white rounded-lg pt-4 px-6 shadow-md'>
    <div>
        <div class='flex mb-3'>
            <div class='mr-3 shrink-0'>
                <a href="{{ route('profile', $tweet->user->username) }}">
                    <img class='rounded-full w-12 h-12' src="{{ $tweet->user->avatar }}" alt="avatar">
                </a>
            </div>
            <div class='flex flex-col justify-center'>
                <h5 class='font-bold text-lg'>
                    <a href="{{ route('profile', $tweet->user->username) }}">{{ $tweet->user->name }}</a>
                </h5>
                <small class='font-bold text-xs text-black/30'>{{ $tweet->created_at->diffForHumans() }}</small>
            </div>
        </div>
        <p class="mb-2">{{ $tweet->body }}</p>
        <div class="mb-4">
            <img class='object-contain select-none rounded-lg' src="https://source.unsplash.com/random/?aesthetic">
        </div>
        <x-likes-status :have_likes="$tweet->likes_count()">
            {{ $tweet->likes_format(auth()->user()) }}
        </x-likes-status>
    </div>

    <div class="grid grid-cols-2 divide-x p-1">
        <x-toggle-like-button :id="$tweet->id" :has_liked="$tweet->hasLikedBy(auth()->user())"/>
        <x-comment-button/>
    </div>
</div>
