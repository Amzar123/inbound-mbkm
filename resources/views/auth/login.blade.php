<x-auth-layout>
    <x-slot name="title">
        @lang('Login')
    </x-slot>

    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @include('flash::message')

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

            <div class="flex items-center justify-center mt-5">
                <x-button class="d-grid gap-2">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <p class="text-left text-gray-600 mt-4">
                Belum punya akun? <a href="{{ route('register') }}" class="underline hover:text-gray-900">Daftar</a>
            </p>
        </form>

    </x-auth-card>
</x-auth-layout>

<!-- If using flash()->important() or flash()->overlay(), you'll need to pull in the JS for Twitter Bootstrap. -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();
</script>