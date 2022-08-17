@props(['tweet'])

<div>
    <div class='flex'>
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
    <p class="my-3">{{ $tweet->body }}</p>
    @unless(is_null($tweet->media))
        <div class="mb-4">
            <img class='object-contain select-none rounded-lg mx-auto' src="{{ $tweet->media }}">
        </div>
    @endunless
    <x-likes-status :have_likes="$tweet->likes_count()">
        {{ $tweet->likes_format(auth()->user()) }}
    </x-likes-status>
</div>
