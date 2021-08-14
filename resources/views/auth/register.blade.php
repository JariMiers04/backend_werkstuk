<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        @cannot('manageAllData')
            <h2 class="text-left mb-2 font-bold">You do not have acces to this page.</h2>
            <a class="underline" href="{{route("dashboard")}}"> GO BACK TO HOME</a>
        @endcannot
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @can("manageAllData")

        <form method="POST" action="{{ route('addUser') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

                <!-- is User admin -->
                <div class="mt-4">
                    <label for="userAdmin">Are you an Admin?</label>
                        <x-input type="checkbox" name="userAdmin" id="userAdmin"></x-input>
                </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{route("dashboard")}}"> GO BACK TO HOME</a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        @endcan
    </x-auth-card>
</x-guest-layout>
