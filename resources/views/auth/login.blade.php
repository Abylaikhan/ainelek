<x-guest-layout>
    <div class="registration-main">
        <div class="form">
            <a href="{{ route('home') }}" class="form-title-logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
            <div class="form-title">
                <a href="{{ route('home') }}" class="form-title-arrow form-title-arrow-mobile">
                    <img src="{{ asset('assets/images/arrowLeft.svg') }}" alt="">
                </a>
                <h1 class="form-title-text">Вход</h1>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <form method="POST" action="{{ route('login') }}" class="form-main">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                  required autofocus autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Remember Me -->
                <div class="form-group">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600">Запомнить меня</span>
                    </label>
                </div>


                @if (Route::has('password.request'))
                    <div class="authorization-group">
                        <a href="{{ route('password.request') }}" class="authorization-links">Забыли пароль?</a>
                        <a href="{{ route('register') }}" class="authorization-links">Зарегистрироваться</a>
                    </div>
                @endif

                <x-primary-button class="ms-3">
                    Войти
                </x-primary-button>
            </form>

        </div>
    </div>
</x-guest-layout>

