@props(['user'])

@can('follow', $user)
    <form action="/profiles/{{ $user->username }}/follow" method="POST">
        @csrf
        <div class="flex justify-between">
            <div class="w-full flex items-center">
                <div class="w-20 h-20">
                    <a href="{{ route('profile', $user->username) }}">
                        <img class='rounded-full w-full h-full' src="{{ $user->avatar }}" alt="avatar">
                    </a>
                </div>

                <div class="ml-4">
                    <h3 class="font-bold text-gray-700 text-2xl">{{ $user->name }}</h3>
                    <small class="font-bold text-sm text-gray-400">{{ '@'.$user->username }}</small>
                </div>
            </div>

            <button type="submit"
                    class="{{ auth()->user()->isFollowing($user) ? 'bg-white text-sm text-black border border-gray-500' : 'bg-black text-white' }} text-sm text-center font-bold rounded-full self-center w-24 px-2 py-2">{{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}</button>
        </div>
    </form>
@endcan

