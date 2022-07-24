<x-app-layout>
    <x-auth-validation-errors class="mb-4" :errors="$errors"/>

    <form method="POST" action="{{ route("update_profile", $user->username) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex justify-center">
            <x-edit-avatar :avatar="$user->avatar" />
        </div>

        <div>
            <x-label for="username" :value="__('Username')"/>

            <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username"
                     :disabled="true" />
        </div>
        <!-- Name -->
        <div class="mt-3">
            <x-label for="name" :value="__('Name')"/>

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required
                     autofocus/>
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-label for="email" :value="__('Email')"/>

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email"
                     required/>
        </div>

        <!-- Bio -->
        <div class="mt-3">
            <x-label for="bio" :value="__('Bio')"/>
            <x-textarea id="bio" name="bio" placeholder="Describe yourself ...?"
                        class="block mt-1 w-full resize-none overflow-hidden"
                        rows="3"
                        :value="$user->bio" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-label for="password" :value="__('Password')"/>

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                     autocomplete="new-password"/>
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-label for="password_confirmation" :value="__('Confirm Password')"/>

            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                     name="password_confirmation" required/>
        </div>

        <div class="flex items-center justify-between py-4">
            <a href="{{ route("profile", $user )}}" class='py-2 px-4 mr-2 last:mr-auto rounded-lg text-sm font-bold shadow bg-slate-200 hover:bg-slate-300 focus:ring ring-slate-300 transition
    ease-in-out duration-150'>Cancel</a>
            <x-button>
                {{ __('Edit Profile') }}
            </x-button>
        </div>
    </form>

    @section('scripts')
        <script>
            const bioElement = document.getElementById('bio');

            bioElement.oninput = function () {
                    bioElement.style.height = "5px";
                    bioElement.style.height = (bioElement.scrollHeight) + "px";
            }
        </script>
    @endsection
</x-app-layout>
