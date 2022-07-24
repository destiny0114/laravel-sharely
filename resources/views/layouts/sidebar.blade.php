<x-application-logo class="w-16 h-16 mb-8 mx-auto" />

<ul>
    <li class="mb-4 block">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
        </x-nav-link>
    </li>
    <li class="mb-4 block">
        <x-nav-link :href="route('explore')" :active="request()->routeIs('explore')">
            {{ __('Explore') }}
        </x-nav-link>
    </li>
    <li class="mb-4 block">
        <x-nav-link :href="route('notifications')" :active="request()->routeIs('notifications')">
            {{ __('Notifications') }}
        </x-nav-link>
    </li>
    <li class="mb-4 block">
        <x-nav-link :href="route('followers', auth()->user()->username)" :active="request()->segment(2) == 'lists'">
            {{ __('Lists') }}
        </x-nav-link>
    </li>
    <li class="mb-4 block">
        <x-nav-link :href="route('profile', auth()->user())"
                    :active="request()->routeIs('profile', 'edit_profile')">
            {{ __('Profile') }}
        </x-nav-link>
    </li>
    <li class="mb-4 block">
        <x-nav-link :href="'/more'" :active="request()->routeIs('more')">
            {{ __('More') }}
        </x-nav-link>
    </li>
    <li class="mb-4 block">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-nav-link>
        </form>
    </li>
</ul>
