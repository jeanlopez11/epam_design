@extends('layouts.blank', ['title' => 'Forgot Password?'])

@section('body')

    <!-- Top Bar -->
    <section class="top-bar">

        <!-- Brand -->
        <span class="brand">Yeti</span>

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

            <!-- Login -->
            <a href="{{ url('pages/auth/login') }}" class="btn btn_primary uppercase ltr:ml-5 rtl:mr-5">Login</a>
        </nav>
    </section>

    <div class="container flex items-center justify-center mt-20 py-10">
        <div class="w-full md:w-1/2 xl:w-1/3">
            <div class="mx-5 md:mx-10">
                <h2 class="uppercase">Forgot Password?</h2>
                <h4 class="uppercase">We'll Email You Soon</h4>
            </div>
            <form class="card mt-5 p-5 md:p-10">
                <div class="mb-5">
                    <label class="label block mb-2" for="email">Email</label>
                    <input id="email" class="form-control" placeholder="example@example.com">
                </div>
                <div class="flex">
                    <button class="btn btn_primary ltr:ml-auto rtl:mr-auto uppercase">Send Reset
                        Link</button>
                </div>
            </form>
        </div>
    </div>

@endsection
