<x-app-layout>
    <div class="bg-white rounded-lg py-2 px-6 shadow-md">
        <x-lists-nav :username="$user->username" />

        <div class="mt-4">
            @unless(is_null($followings) || empty($followings->total()))
                @foreach($followings as $following)
                    <x-user-card :user="$following"/>

                    @unless($loop->last)
                        <div class="py-4">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                    @endunless
                @endforeach

                {{ $followings->appends(request()->all())->links() }}
            @else
                <p>
                    Try Follow a Friend.
                </p>
            @endunless
        </div>
    </div>
</x-app-layout>
