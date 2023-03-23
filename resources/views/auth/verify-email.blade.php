@extends('layouts.blank', ['title' => __('Verify Email')])
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
        <div class="w-full md:w-1/2 xl:w-1/3 -mt-32">
            <a href="{{ route('dashboard') }}">
                <x-application-logo-letter />
            </a>
            <div class="mb-4 text-sm text-gray-600 mt-8">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 text-social-pinterest">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Resend Verification Email') }}
                        </x-primary-button>
                    </div>
                </form>
                <form method="GET" action="{{ route('profile.edit') }}">
                    @csrf
                    <button type="submit"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Change Mail') }}
                    </button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
