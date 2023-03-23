@extends('layouts.blank', ['title' =>  __('Login')])

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

    {{-- Form login --}}
    <div class="container flex items-center justify-center mt-16 py-10">
        <div class="w-full md:w-1/2 xl:w-1/3">
            <a href="{{ route('dashboard') }}">
                <x-application-logo-letter />
            </a>

            <form class="card mt-5 p-5 md:p-10" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-5 -mt-2">
                    <label class="label block mb-2" for="email">{{ __('Email') }}</label>
                    <input id="email" class="form-control" placeholder="example@example.com" type="email"
                        name="email" :value="old('email')" required autofocus autocomplete="username">
                    <x-input-error id="email" :messages="$errors->get('email')" class="block mt-2 invalid-feedback" />


                </div>


                <div class="mb-5 -mt-2">
                    <label class="label block mb-2" for="password">{{ __('Password') }}</label>
                    <label class="form-control-addon-within">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" class="form-control border-none" value="" />
                        <span class="flex items-center ltr:pr-4 rtl:pl-4">
                            <button type="button" class="text-gray-300 dark:text-gray-700 la la-eye text-xl leading-none"
                                data-toggle="password-visibility">
                            </button>
                        </span>
                        <x-input-error id="password" :messages="$errors->get('password')" class="block mt-2 invalid-feedback" />
                    </label>
                </div>
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <div class="flex items-center mt-5">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm uppercase">{{ __('Forgot your password?') }}</a>
                        <button class="btn btn_primary ltr:ml-auto rtl:mr-auto uppercase mx-1">{{ __('Log in') }}</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
@endsection

