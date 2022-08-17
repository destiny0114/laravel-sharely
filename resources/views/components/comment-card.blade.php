@props(["comment"])

<div class="bg-white rounded-lg p-3 shadow-md">
    <div class='flex'>
        <div class='mr-3 shrink-0'>
            <a href="{{ route('profile', $comment->user->name) }}">
                <img class='rounded-full w-12 h-12' src="{{ $comment->user->avatar }}" alt="avatar">
            </a>
        </div>
        <div class='flex flex-col justify-center'>
            <h5 class='font-bold text-lg'>
                <a href="{{ route('profile', $comment->user->username) }}">{{ $comment->user->name }}</a>
            </h5>
            <small class='font-bold text-xs text-black/30'>{{ $comment->created_at->diffForHumans() }}</small>
        </div>
    </div>
    <p class="mt-2">{{ $comment->body }}</p>
</div>
