@can('follow', $user)
<form action="/profiles/{{ $user->username }}/follow" method="POST">
    @csrf
    <button type="submit" class='py-2 px-4 rounded-lg text-sm font-bold shadow bg-blue-500 text-white hover:bg-blue-700 focus:ring ring-blue-300 transition
    ease-in-out duration-150'>{{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow Me' }}</button>
</form>
@endcan
