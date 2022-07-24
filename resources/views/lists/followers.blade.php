<x-app-layout>
    <div class="bg-white rounded-lg py-2 px-6 shadow-md">
        <x-lists-nav :username="$user->username" />

        <div class="mt-4">
            @unless(is_null($followers) || empty($followers->total()))
                @foreach($followers as $follower)
                    <x-user-card :user="$follower"/>

                    @unless($loop->last)
                        <div class="py-4">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                    @endunless
                @endforeach

                {{ $followers->appends(request()->all())->links() }}
            @else
                <p>
                    No Follower Yet.
                </p>
            @endunless
        </div>
    </div>
</x-app-layout>
