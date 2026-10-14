<x-guest-layout>
    <div class="registration-main">
        <div class="form">
            <a href="{{ route('home') }}" class="form-title-logo"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
            <div class="form-title">
                <a href="{{ route('home') }}" class="form-title-arrow form-title-arrow-mobile">
                    <img src="{{ asset('assets/images/arrowLeft.svg') }}" alt="">
                </a>
                <h1 class="form-title-text">Регистрация</h1>
            </div>

            <form method="POST" action="{{ route('register') }}" id="form-registration" class="form-main">
                @csrf

                <div class="form-group">
                    <label class="form-type" for="form-type">Вы заходите как:</label>

                    <select name="role_id" id="role_id" onchange="redirectToPage(this)" class="form-type-content">
                        @foreach ($roles as $key => $value)
                            <option
                                value="{{ $key }}"
                                @if(old('role_id') == $key || isset($roleId) && $roleId == $key) selected="selected" @endif
                            >
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="" type="email" name="email" :value="old('email')"
                                  required autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')"/>
                </div>

                <!-- Name -->
                <div class="form-group">
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="" type="text" name="name" :value="old('name')"
                                  required
                                  autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')"/>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <x-input-label for="phone" :value="__('Phone')"/>
                    <x-text-input id="phone" class="" type="text" name="phone" :value="old('phone')"
                                  required
                                  autofocus autocomplete="phone"/>
                    <x-input-error :messages="$errors->get('phone')"/>
                </div>

                @if(isset($roleId) && $roleId != 2)
                    <!-- Company name -->
                    <div class="form-group">
                        <x-input-label for="company_name" :value="__('Company name')"/>
                        <x-text-input id="company_name" class="" type="text" name="company_name"
                                      :value="old('company_name')"
                                      required
                                      autofocus autocomplete="company_name"/>
                        <x-input-error :messages="$errors->get('company_name')"/>
                    </div>

                    @if($roleId == 4)

                        <!-- Company bin -->
                        <div class="form-group">
                            <x-input-label for="bin" :value="__('BIN')"/>
                            <x-text-input id="bin" class="" type="text" name="bin"
                                          :value="old('bin')"
                                          required
                                          autofocus autocomplete="bin"/>
                            <x-input-error :messages="$errors->get('bin')"/>
                        </div>

                        <!-- bank -->
                        <div class="form-group">
                            <x-input-label for="bank" :value="__('Bank')"/>
                            <x-text-input id="bank" class="" type="text" name="bank" :value="old('bank')"
                                          required
                                          autofocus autocomplete="bank"/>
                            <x-input-error :messages="$errors->get('bank')"/>
                        </div>

                        <!-- kbe -->
                        <div class="form-group">
                            <x-input-label for="kbe" :value="__('KBE')"/>
                            <x-text-input id="kbe" class="" type="text" name="kbe" :value="old('kbe')"
                                          required
                                          autofocus autocomplete="kbe"/>
                            <x-input-error :messages="$errors->get('kbe')"/>
                        </div>

                        <!-- bik -->
                        <div class="form-group">
                            <x-input-label for="bik" :value="__('BIK')"/>
                            <x-text-input id="bik" class="" type="text" name="bik" :value="old('bik')"
                                          required
                                          autofocus autocomplete="bik"/>
                            <x-input-error :messages="$errors->get('bik')"/>
                        </div>

                        <!-- account_number -->
                        <div class="form-group">
                            <x-input-label for="account_number" :value="__('Account number')"/>
                            <x-text-input id="account_number" class="" type="text" name="account_number"
                                          :value="old('account_number')"
                                          required
                                          autofocus autocomplete="account_number"/>
                            <x-input-error :messages="$errors->get('account_number')"/>
                        </div>
                    @endif
                    <!-- address -->
                    <div class="form-group">
                        <x-input-label for="address" :value="__('Address')"/>
                        <x-text-input id="address" class="" type="text" name="address" :value="old('address')"
                                      required
                                      autofocus autocomplete="address"/>
                        <x-input-error :messages="$errors->get('address')"/>
                    </div>
                @endif

                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class=""
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password"/>

                    <x-input-error :messages="$errors->get('password')"/>
                </div>

                <!-- Confirm Password -->
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                <x-text-input id="password_confirmation" class=""
                              type="password"
                              name="password_confirmation" required autocomplete="new-password"/>

                <x-input-error :messages="$errors->get('password_confirmation')"/>

                <x-primary-button class="form-btn">
                    {{ __('Register') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
