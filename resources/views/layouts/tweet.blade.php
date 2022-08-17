<div
    class='grid grid-cols-1 divide-y bg-white rounded-lg pt-4 px-6 shadow-md cursor-pointer hover:bg-gray-50 transition duration-150 ease-in-out'
    onclick="location.href='{{ route('tweet', $tweet->id) }}';">
    <x-tweet-card :tweet="$tweet" />
    <div class="grid grid-cols-2 divide-x">
        <x-toggle-like-button :id="$tweet->id" :has_liked="$tweet->hasLikedBy(auth()->user())"/>
        <x-comment-button :link="route('tweet', $tweet->id)" :comments_count="$tweet->comments_count" />
    </div>
</div>
