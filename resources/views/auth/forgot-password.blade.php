<x-guest-layout>
    <div class="registration-main">
        <div class="form">
            <a href="{{ route('home') }}" class="form-title-logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
            <div class="form-title">
                <a href="{{ route('home') }}" class="form-title-arrow form-title-arrow-mobile">
                    <img src="{{ asset('assets/images/arrowLeft.svg') }}" alt="">
                </a>
                <h1 class="form-title-text">Восстановление пароля</h1>
            </div>
            <p>
                Забыли пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы вышлем вам ссылку для сброса пароля, которая позволит вам выбрать новый.
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="form-main">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                       Отправить
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</x-guest-layout>

