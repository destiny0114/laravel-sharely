<x-guest-layout>
    <main class="container mx-auto overflow-hidden h-screen">
        <div class="lg:flex lg:justify-center h-full">
            <div class="lg:w-40 p-4">
                @include ('layouts.sidebar')
            </div>

            <div class="lg:flex-1 bg-slate-50 overflow-y-auto">
                <div class="w-full flex justify-between lg:px-4 py-4">
                    <div class="flex-1 lg:mx-14 lg:mb-10">
                        {{ $slot }}
                    </div>

                    @auth
                        <div class="lg:w-1/4">
                            @include ('layouts.friends-list')
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </main>
</x-guest-layout>
