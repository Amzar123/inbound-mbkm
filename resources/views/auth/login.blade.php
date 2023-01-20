<x-auth-layout>
    <x-slot name="title">
        @lang('Login')
    </x-slot>

    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <h3><b>Masuk</b></h3>
            </div>

            <br>

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Mauskan email anda disini" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="flex">
                    <div>
                        <x-label for="password" :value="__('Password')" />
                    </div>

                    <div class="ml-auto">
                        @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        @endif
                    </div>
                </div>

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Mauskan password anda disini"/>
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-center mt-5">
                <x-button class="d-grid gap-2">
                    {{ __('Log in') }}
                </x-button>
            </div>

            @if (Route::has('password.request'))
            <p class="text-left text-gray-600 mt-4">
                Do not have an account? <a href="{{ route('register') }}" class="underline hover:text-gray-900">Register</a>.
            </p>
            @endif
        </form>

    </x-auth-card>
</x-auth-layout>