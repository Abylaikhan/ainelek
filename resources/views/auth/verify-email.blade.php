<x-guest-layout>
    <div class="registration-main">
        <div class="form">
            <a href="{{ route('home') }}" class="form-title-logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
            <div class="form-title">
                <a href="{{ route('home') }}" class="form-title-arrow form-title-arrow-mobile">
                    <img src="{{ asset('assets/images/arrowLeft.svg') }}" alt="">
                </a>
                <h1 class="form-title-text">Подтверждение почты</h1>
            </div>
            <p>
                Спасибо за регистрацию! Прежде чем начать, не могли бы вы подтвердить свой адрес электронной почты,
                нажав на ссылку, которую мы только что отправили вам по электронной почте? Если вы не получили письмо,
                мы с радостью отправим вам другое.
            </p>
            @if (session('status') == 'verification-link-sent')
                <i>
                    Новая ссылка для подтверждения была отправлена на адрес электронной почты, который вы указали при
                    регистрации.
                </i>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            Выслать письмо
                        </x-primary-button>
                    </div>
                </form>
                <br/>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="form-btn">
                        Выйти
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
