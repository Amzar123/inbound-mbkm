<x-auth-layout>
    <x-slot name="title">
        @lang('Register')
    </x-slot>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <h3><b>Daftar</b></h3>
            </div>
            <!-- Nomor induk keluarga -->
            <div class="mt-4">
               <x-label for="nomor_induk_keluarga" :value="__('Nomor Induk Keluarga')" />

                <x-input id="nomor_induk_keluarga" class="block mt-1 w-full" type="text" name="nomor_induk_keluarga" :value="old('nomor_induk_keluarga')" required placeholder="Masukan nama anda disini" />
            </div>

            <!-- Nomor Induk Mahasiswa -->
            <div class="mt-4">
                <x-label for="nim_kampus_asal" :value="__('NIM Kampus asal')" />

                <x-input id="nim_kampus_asal" class="block mt-1 w-full" type="text" name="nim_kampus_asal" :value="old('nim_kampus_asal')" required placeholder="Masukan NIM kampus asal disini" />
            </div>

            <!-- Pergutuan tinggi asal -->
            <div class="mt-4">
                <x-label for="pt_asal" :value="__('Perguruan tinggi asal')" />

                <x-input id="pt_asal" class="block mt-1 w-full" type="text" name="pt_asal" :value="old('pt_asal')" required placeholder="Masukan perguruan tinggi asal disini"/>
            </div>

            <!-- Nama lengkap -->
            <div class="mt-4">
                <x-label for="full_name" :value="__('Nama Lengkap')" />

                <x-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')" required  placeholder="Masukan nama anda disini"/>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Masukan email anda disini"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Masukan password anda disini"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required placeholder="Masukan ulang password anda"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> -->

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>

            <p class="text-left text-gray-600 mt-4">
                Sudah punya akun? <a href="{{ route('login') }}" class="underline hover:text-gray-900">Login</a>.
            </p>
        </form>
    </x-auth-card>
</x-auth-layout>