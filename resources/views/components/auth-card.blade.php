<div class="min-h-screen flex bg-gray-100">
    <section class="w-1/3 select-none">
        <img class="object-cover w-full h-full" src="https://source.unsplash.com/random/?aesthetic" alt="picture">
    </section>

    <section class="flex-1 self-center">
            <div class="max-w-lg mx-auto px-6 py-4 bg-white shadow-md rounded-lg">
                {{ $slot }}
            </div>
    </section>
</div>
