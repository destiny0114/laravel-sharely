<div class="grid grid-cols-1 gap-3" id="timeline">
    @forelse($tweets as $tweet)
        @include('layouts.tweet')
    @empty
        <p class="bg-white rounded-lg py-4 px-6 shadow-md">
            No Tweets Yet.
        </p>
    @endforelse
    {{ $tweets->links() }}
</div>

