<x-guest-layout>
    <div class="registration-main">
        <div class="form">
            <a href="{{ route('home') }}" class="form-title-logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
            <div class="form-title">
                <a href="{{ route('home') }}" class="form-title-arrow form-title-arrow-mobile">
                    <img src="{{ asset('assets/images/arrowLeft.svg') }}" alt="">
                </a>
                <h1 class="form-title-text">Сброос пароля</h1>
            </div>

            <form method="POST" action="{{ route('password.store') }}" class="form-main">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        Сбросить пароль
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>

