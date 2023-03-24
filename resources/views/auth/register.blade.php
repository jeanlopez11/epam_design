@extends('layouts.blank', ['title' => __('Register')])

@section('body')
    <section class="top-bar">

        <!-- Brand -->
        <span class="brand">EPAM</span>

        <nav class="flex items-center ltr:ml-auto rtl:mr-auto">

            <!-- Dark Mode -->
            <label class="switch switch_outlined" data-toggle="tooltip" data-tippy-content="Toggle Dark Mode">
                <input id="darkModeToggler" type="checkbox">
                <span></span>
            </label>

            <!-- Fullscreen -->
            <button id="fullScreenToggler"
                class="hidden lg:inline-block ltr:ml-5 rtl:mr-5 text-2xl leading-none la la-expand-arrows-alt"
                data-toggle="tooltip" data-tippy-content="Fullscreen"></button>

            <!-- Register -->
            <a href="{{ route('login') }}" class="btn btn_primary uppercase ltr:ml-5 rtl:mr-5">{{ __('Login') }}</a>
        </nav>
    </section>

    <div class="container flex items-center justify-center mt-16 py-10">
        <div class="w-full md:w-1/2 xl:w-1/3">
            {{-- <a href="{{ route('dashboard') }}">
                <x-application-logo-letter />
            </a> --}}

            <form class="card mt-2 p-5 md:p-10" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="-mt-4">
                    <label class="label block mb-2" for="cedula">{{ __('Cedula') }}</label>
                    <x-text-input onkeypress="return valideKeyLetter(event)" id="cedula" name="cedula"
                        type="text" class="form-control" :value="old('cedula')" required autofocus autocomplete="cedula" />
                    <x-input-error id="cedula" class="block mt-2 invalid-feedback" :messages="$errors->get('cedula')" />
                </div>

                <div class="mt-2">
                    <label class="label block mb-2" for="name">{{ __('First Name') }}</label>
                    <x-text-input onkeypress="return validateOnlyLetter(event)" id="name" name="name"
                        type="text" class="form-control" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error id="name" class="block mt-2 invalid-feedback" :messages="$errors->get('name')" />
                </div>

                <div class="mt-2">
                    <label class="label block mb-2" for="last_name">{{ __('Last Name') }}</label>
                    <x-text-input onkeypress="return validateOnlyLetter(event)" id="last_name" name="last_name"
                        type="text" class="form-control" :value="old('last_name')" required autofocus autocomplete="last_name" />
                    <x-input-error id="last_name" class="block mt-2 invalid-feedback" :messages="$errors->get('last_name')" />
                </div>
                <div class="mt-2">
                    <label class="label block mb-2" for="email">{{ __('Email') }}</label>
                    <x-text-input id="email" name="email"
                        type="email" class="form-control" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error id="email" class="block mt-2 invalid-feedback" :messages="$errors->get('email')" />
                </div>
                <div class="mt-2">
                    <label class="label block mb-2" for="phone_number">{{ __('Phone Number') }}</label>
                    <x-text-input onkeypress="return valideKeyLetter(event)" id="phone_number"
                        name="phone_number" type="text" class="form-control" :value="old('phone_number')" required autofocus
                        autocomplete="phone_number" />
                    <x-input-error id="phone_number" class="block mt-2 invalid-feedback" :messages="$errors->get('phone_number')" />
                </div>

                <div class="mt-2">
                    <label class="label block mb-2" for="password">{{ __('Password') }}</label>
                    <label class="form-control-addon-within">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="new-password" class="form-control border-none" value="" />
                        <span class="flex items-center ltr:pr-4 rtl:pl-4">
                            <button type="button" class="text-gray-300 dark:text-gray-700 la la-eye text-xl leading-none"
                                data-toggle="password-visibility">
                            </button>
                        </span>
                    </label>
                    <x-input-error id="password" :messages="$errors->get('password')" class="block mt-2 invalid-feedback" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-2">
                    <label class="label block mb-2" for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <label class="form-control-addon-within">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            class="form-control border-none" value="" />
                        <span class="flex items-center ltr:pr-4 rtl:pl-4">
                            <button type="button" class="text-gray-300 dark:text-gray-700 la la-eye text-xl leading-none"
                                data-toggle="password-visibility">
                            </button>
                        </span>
                    </label>
                    <x-input-error id="password_confirmation" :messages="$errors->get('password_confirmation')" class="block mt-2 invalid-feedback" />
                </div>

                <div class="flex items-center mt-5">
                    <button class="btn btn_primary ltr:ml-auto rtl:mr-auto uppercase mx-1" 
                        onclick="return Validations.validateEmail('email')">{{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
