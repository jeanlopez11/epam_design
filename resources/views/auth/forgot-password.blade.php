@extends('layouts.blank', ['title' => __('Forgot Password')])

@section('body')
    <!-- Top Bar -->
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
            <a href="{{ route('register') }}" class="btn btn_primary uppercase ltr:ml-5 rtl:mr-5">{{ __('Register') }}</a>
        </nav>
    </section>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    {{-- Form Forgot Password --}}
    <div class="container flex items-center justify-center mt-16 py-10">
        <div class="w-full md:w-1/2 xl:w-1/3 -mt-16">
            <a href="{{ route('dashboard') }}">
                <x-application-logo-letter />
            </a>
            <div class="mb-4 text-sm text-gray-600 mt-8">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
            
                    <!-- Cedula -->
                    <div class="mt-3">
                        <label class="label block mb-2" for="cedula">{{__('Cedula')}}</label>
                        <x-text-input onkeypress="return Validations.valideKeyLetter(event)" id="cedula" name="cedula" type="text" class="form-control" :value="old('cedula')" required autofocus autocomplete="cedula"/>
                        <x-input-error id="cedula" class="block mt-2 invalid-feedback" :messages="$errors->get('cedula')" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-3">
                        <label class="label block mb-2" for="email">{{__('Email')}}</label>
                        <x-text-input onkeypress="return Validations.validateOnlyLetter(event)" id="email" name="email" type="email" class="form-control" :value="old('email')" required autofocus autocomplete="email" />
                        <x-input-error id="email" class="block mt-2 invalid-feedback" :messages="$errors->get('email')" />
                    </div>
                    <br>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
