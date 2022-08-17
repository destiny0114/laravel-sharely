<x-app-layout>
    <div class='bg-white rounded-lg py-4 px-6 shadow-md'>
        <x-tweet-card :tweet="$tweet" />
    </div>

    <div class="bg-blue-50 rounded-lg mt-3 py-4 px-6 shadow-md">
        <h5 class="font-bold text-3xl text-slate-700">Comments</h5>

        <div class="grid grid-cols-1 gap-4 my-4">
            @forelse($tweet->comments as $comment)
                <x-comment-card :comment="$comment" />
            @empty
                <h5 class="text-2xl text-center font-bold opacity-20">No Comments Yet</h5>
                    <lottie-player class="max-w-md justify-self-center" src="https://assets6.lottiefiles.com/packages/lf20_0vl906qj.json" speed="1"  loop autoplay></lottie-player>
            @endforelse
        </div>

        {{ $tweet->comments->links() }}

        <form method="POST" action="{{ route('comment', $tweet->id) }}">
            @csrf
            <div class="flex justify-between items-center relative text-gray-700 focus-within:text-gray-500 {{ $tweet->comments->hasPages() ? 'mt-3' : '' }}">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <img class='rounded-full ring-2 ring-offset-2 ring-blue-500 w-6 h-6' src="{{ auth()->user()->avatar }}" alt="avatar">
                </div>

                <input type="text" name="comment"
                       class="w-full h-12 pl-14 pr-4 text-sm bg-white rounded-full shadow-md border-none focus:ring-0 focus:text-black"
                       placeholder="Add comment..." autocomplete="off" />

                <input type="submit" style="left: -9999px;" class="absolute w-1 h-1" tabindex="-1" />
            </div>
        </form>

        @error("comment")
        <p class='text-black/40 text-sm leading-none mt-3 mx-3'>{{ $message }}</p>
        @enderror
    </div>

    @section("scripts")
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @endsection
</x-app-layout>
