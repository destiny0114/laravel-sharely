<div class="bg-white rounded-lg shadow-md px-6 py-4 mb-4 grid grid-cols-1">
    @unless(is_null($users) || empty($users->total()))
        @foreach($users as $user)
            <x-user-card :user="$user"/>

            @unless($loop->last)
                <div class="py-4">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
            @endunless
        @endforeach

        {{ $users->appends(request()->all())->links() }}
    @else
        <p>
            No Friends Found Yet.
        </p>
    @endunless
</div>
