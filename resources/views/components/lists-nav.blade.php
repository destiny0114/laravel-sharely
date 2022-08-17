@props(["username"])

 <div class="flex p-1 border-b border-b-gray-200">
     <x-lists-link :href="route('followers', $username)" :active="request()->routeIs('followers')">
         {{ __('Followers') }}
     </x-lists-link>
     <div class="w-0.5 mx-1 border-l border-l-gray-300-600"></div>
     <x-lists-link :href="route('followings', $username)" :active="request()->routeIs('followings')">
         {{ __('Followings') }}
     </x-lists-link>
 </div>
