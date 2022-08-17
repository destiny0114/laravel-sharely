<x-app-layout>
    @include('layouts.search-friend-bar', compact('users'))

    @include('layouts.search-friend-result', compact('users'))
</x-app-layout>
