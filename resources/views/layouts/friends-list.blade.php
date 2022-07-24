<div class="bg-white rounded-lg py-4 px-6 shadow-md">
    <h2 class='font-bold text-lg mb-4'>Followings</h2>

    <ul>
        @forelse (auth()->user()->list_followings() as $user)
            <li class='{{$user->last ? '' : 'mb-3'}}'>
                <a href="{{ route('profile', $user) }}" class="font-bold flex items-center text-sm">
                    <img class='rounded-full mr-2 w-10 h-10' src="{{ $user->avatar }}" alt="avatar">
                    {{ $user->name }}
                </a>
            </li>
        @empty
            <li class="mb-2">
                Make Friends!
            </li>
        @endforelse
    </ul>
</div>
