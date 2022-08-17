<x-app-layout>
    <div class="mb-6 bg-white shadow-md rounded-lg relative overflow-hidden">
        <div class="h-72 max-h-[20rem] relative">
            <img class='object-cover w-full h-full' src="{{ $user->cover }}"
                 alt="cover">
            @can('edit_profile', $user)
                <div
                    class="absolute bottom-0 right-0 z-10 m-2 p-1 bg-white rounded-full shadow-md hover:bg-gray-200 transition ease-in-out duration-150">
                    <form method="POST" action="{{ route('upload_cover', $user) }}" enctype="multipart/form-data">
                        @csrf
                        <input id="file-input" name="cover" type="file" class="hidden" onchange="this.form.submit()"/>
                        <label for="file-input" class="cursor-pointer">
                            <svg
                                style="width: 2rem; height: 2rem;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M347.6 699c1.6 0 3.2-0.2 4.8-0.4L486.9 675c1.6-0.3 3.1-1 4.2-2.2l339.1-339.1c3.1-3.1 3.1-8.2 0-11.3l-133-133c-1.5-1.5-3.5-2.3-5.7-2.3s-4.2 0.8-5.7 2.3l-339 339c-1.2 1.2-1.9 2.6-2.2 4.2L321 667.2c-1.5 8.9 1.2 17.5 7.5 23.8 5.3 5.2 11.9 8 19.1 8z m53.9-139.5l290.2-290.1 58.6 58.6-290.2 290.1-71.1 12.6 12.5-71.2zM739 827H284c-19.9 0-36-16.1-36-36s16.1-36 36-36h455c19.9 0 36 16.1 36 36s-16.1 36-36 36z"/>
                            </svg>
                        </label>
                    </form>
                </div>
            @endcan
        </div>

        <div class="flex justify-between items-center px-4 py-2">
            <div>
                <div class="w-28 h-28 mr-4 absolute bottom-0 transform -translate-x-1/2 -translate-y-5 left-1/2">
                    <img class='rounded-full w-28 h-28 border-4 border-white bg-white' src="{{ $user->avatar }}"
                         alt="avatar">
                </div>

                <div class="max-w-xs">
                    <h2 class='font-bold text-2xl'>{{ $user->name }}</h2>
                    <span class='font-bold text-sm text-black/40'>Joined {{ $user->created_at->diffForHumans() }}</span>
                </div>
            </div>

            <div class="flex">
                @can('edit_profile', $user)
                    <a href="{{ route('edit_profile', $user) }}" class='py-2 px-4 mr-2 last:mr-auto rounded-lg text-sm font-bold shadow bg-slate-200 hover:bg-slate-300 focus:ring ring-slate-300 transition
    ease-in-out duration-150'>Edit Profile</a>
                @endcan

                <x-follow-button :user="$user"/>
            </div>
        </div>
    </div>

    <div class="mb-6 py-4 px-6 bg-white shadow-md rounded-lg">
        <h2 class='font-bold text-2xl'>Intro</h2>
        <hr class='my-3'/>
        <p class='text-sm font-normal whitespace-pre-wrap'>{{ $user->bio ?? "No description." }}</p>
    </div>

    @include('layouts.timeline', [
        'tweets' => $tweets
    ])
</x-app-layout>
