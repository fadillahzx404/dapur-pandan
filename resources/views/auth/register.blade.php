<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="py-5">
            <p class="font-bold text-xl">Your journey on here !</p>
            <p class="text-sm text-gray-500">Created account to and choose the best products.</p>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full input focus:outline-offset-0 focus:border-none input-accent" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full input focus:outline-offset-0 focus:border-none input-accent" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- No Telp -->
        <!-- <div class="mt-4">
            <x-input-label for="no_telp" :value="__('Nomor Telepon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full input focus:outline-offset-0 focus:border-none input-accent" type="text" name="no_telp" :value="old('no_telp')" required autofocus autocomplete="no_telp" />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div> -->

        <!-- Alamat -->
        <!-- <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" class="textarea textarea-bordered mt-1 w-full  focus:outline-offset-0 focus:textarea-accent " type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" > </textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div> -->



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full input focus:outline-offset-0 focus:border-none input-accent"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full input focus:outline-offset-0 focus:border-none input-accent"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-8">
            <a class="underline text-xs text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?, Login Now!') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>