<x-app-layout>
    <div class="bg-white rounded-lg py-4 px-6 shadow-md">
        <h1 class="text-xl font-bold select-none">Notifications</h1>
        <div class="mt-2 mb-4">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        @unless(is_null($notifications) || empty($notifications->total()))
            @foreach($notifications as $notification)
                <div class='flex {{ $loop->last ? 'mb-3' : '' }}'>
                    <div class='mr-3 shrink-0'>
                         <a href="{{ route('profile', $notification->data['username']) }}">
                             <img class='rounded-full w-12 h-12' src="{{ $notification->data['avatar'] }}" alt="avatar">
                         </a>
                    </div>
                    <div class='flex flex-col justify-center'>
                        <div class="flex items-baseline">
                            <h5 class='font-bold mr-2'>
                                <a href="{{ route('profile', $notification->data['username']) }}">{{ $notification->data['name'] }}</a>
                            </h5>
                            <small class='font-bold text-black/30'>{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="text-sm text-gray-600">{{ $notification->data['body'] }}</p>
                    </div>
                </div>
                @unless($loop->last)
                    <div class="py-4">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                @endunless
            @endforeach

            {{ $notifications->appends(request()->all())->onEachSide(10)->links() }}
        @else
            <p>
                Nothings to Notify Yet.
            </p>
        @endunless
    </div>
</x-app-layout>
