<!-- Top Bar -->
<header class="top-bar">

    <!-- Menu Toggler -->
    <button class="menu-toggler la la-bars " data-toggle="menu">
    </button>
    <button class="menu-toggler -ml-2" data-toggle="menu">
        {{-- <button class="menu-toggler la la-bars" data-toggle="menu"> --}}
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800">
            <i class="fa-solid fa-bars"></i>
        </x-application-logo>
    </button>

    <!-- Brand -->
    <span class="brand">
        <a href="{{ route('detalle_contratos.usuarios.edit') }}">
            <x-application-letter class="h-9 w-auto fill-current text-gray-800 hidden sm:block" />
        </a>
    </span>

    <!-- Search -->
    <form class="hidden md:block ltr:ml-10 rtl:mr-10">
        <label class="form-control-addon-within rounded-full">
            <input class="form-control border-none" placeholder="Search">
            <button class="text-gray-300 dark:text-gray-700 text-xl leading-none la la-search ltr:mr-4 rtl:ml-4">
            </button>
        </label>
    </form>

    <!-- Right -->
    <div class="flex items-center ltr:ml-auto rtl:mr-auto">

        <!-- Dark Mode -->
        <label class="switch switch_outlined" data-toggle="tooltip" data-tippy-content="Toggle Dark Mode">
            <input id="darkModeToggler" type="checkbox">
            <span></span>
        </label>

        <!-- Fullscreen -->
        <button id="fullScreenToggler"
            class="hidden lg:inline-block ltr:ml-3 rtl:mr-3 px-2 text-2xl leading-none la la-expand-arrows-alt"
            data-toggle="tooltip" data-tippy-content="Fullscreen"></button>

        <!-- Apps -->
        <div class="dropdown self-stretch">
            <button
                class="flex items-center h-full ltr:ml-4 rtl:mr-4 lg:ltr:ml-1 lg:rtl:mr-1 px-2 text-2xl leading-none la la-box"
                data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom">
            </button>
            <div class="custom-dropdown-menu p-5 text-center">
                <div class="flex justify-around">
                    <a href="#no-link" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-cog text-5xl leading-none"></span>
                        <span>Settings</span>
                    </a>
                    <a href="#no-link" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-users text-5xl leading-none"></span>
                        <span>Users</span>
                    </a>
                </div>
                <div class="flex justify-around">
                    <a href="#no-link" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-book text-5xl leading-none"></span>
                        <span>Docs</span>
                    </a>
                    <a href="#no-link" class="p-5 text-normal hover:text-primary">
                        <span class="block la la-dollar text-5xl leading-none"></span>
                        <span>Shop</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div class="dropdown self-stretch">
            <button class="relative flex items-center h-full ltr:ml-1 rtl:mr-1 px-2 text-2xl leading-none la la-bell"
                data-toggle="custom-dropdown-menu" data-tippy-arrow="true" data-tippy-placement="bottom-end">
                <span
                    class="absolute top-0 right-0 rounded-full border border-primary -mt-1 -mr-1 px-2 leading-tight text-xs font-body text-primary">3</span>
            </button>
            <div class="custom-dropdown-menu">
                <div class="flex items-center px-5 py-2">
                    <h5 class="mb-0 uppercase">{{ __('Notifications') }}</h5>
                    <button
                        class="btn btn_outlined btn_warning uppercase ltr:ml-auto rtl:mr-auto">{{ __('Clear All') }}</button>
                </div>
                <hr>
                <div class="p-5 hover:bg-primary hover:bg-opacity-5">
                    <a href="#no-link">
                        <h6 class="uppercase">Heading One</h6>
                    </a>
                    <p>Lorem ipsum dolor, sit amet consectetur.</p>
                    <small>Today</small>
                </div>
                <hr>
            </div>
        </div>

        <!-- User Menu -->
        <div class="dropdown">
            <button class="flex items-center ltr:ml-4 rtl:mr-4" data-toggle="custom-dropdown-menu"
                data-tippy-arrow="true" data-tippy-placement="bottom-end">
                <span class="avatar">@auth
                        {{ auth()->user()->name[0]. auth()->user()->last_name[0] }}
                    @endauth
                </span>
            </button>
            <div class="custom-dropdown-menu w-64">
                <div class="p-5">
                    <h5 class="uppercase">@auth
                            {{ auth()->user()->name }}
                        @endauth
                    </h5>
                    <p>{{ __('User') }}</p>
                </div>
                <hr>
                <div class="p-5">
                    <a href={{ route('profile.edit') }} class="flex items-center text-normal hover:text-primary">
                        <span class="la la-user-circle text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                        {{ __('Profile Information') }}
                    </a>
                    <a href="#no-link" class="flex items-center text-normal hover:text-primary mt-5">
                        <span class="la la-key text-2xl leading-none ltr:mr-2 rtl:ml-2"></span>
                        {{ __('Change Password') }}
                    </a>
                </div>
                <hr>
                <div class="p-5 bg-gray-100">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link class="la la-power-off text-2xl leading-none ltr:mr-2 rtl:ml-2"
                            :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>

                    </form>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- Menu Bar -->
<aside class="menu-bar menu-sticky">
    <div class="menu-items">
        <div class="menu-header hidden">
            <a href="{{ url('/') }}" class="flex items-center mx-8 mt-8">
                <span class="avatar w-16 h-16">JD</span>
                <div class="ltr:ml-4 rtl:mr-4 ltr:text-left rtl:text-right">
                    <h5>@auth
                            {{ auth()->user()->name }}
                        @endauth
                    </h5>
                    <p class="mt-2">Editor</p>
                </div>
            </a>
            <hr class="mx-8 my-4">
        </div>
        <a href="{{ route('detalle_contratos.usuarios.edit') }}" class="link" data-toggle="tooltip-menu"
            data-tippy-content="Dashboard">
            <span class="icon la la-laptop"></span>
            <span class="title"> {{ __('Dashboard') }}</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=pages]" data-toggle="tooltip-menu"
            data-tippy-content="Pages">
            <span class="icon la la-file-alt"></span>
            <span class="title"> {{ __('Pages') }}</span>
        </a>
        <a href="#no-link" class="link" data-target="[data-menu=ui]" data-toggle="tooltip-menu"
            data-tippy-content="UI">
            <span class="icon la la-cube"></span>
            <span class="title"> {{ __('UI') }}</span>
        </a>
        {{-- <a href="#no-link" class="link" data-target="[data-menu=applications]" data-toggle="tooltip-menu"
            data-tippy-content="Applications">
            <span class="icon la la-store"></span>
            <span class="title"> {{ __('Applications') }}</span>
        </a> --}}
        {{-- <a href="#no-link" class="link" data-target="[data-menu=menu]" data-toggle="tooltip-menu"
            data-tippy-content="Menu">
            <span class="icon la la-sitemap"></span>
            <span class="title"> {{ __('Menu') }}</span>
        </a> --}}
        {{-- <a href="{{ url('/blank') }}" class="link" data-toggle="tooltip-menu" data-tippy-content="Blank Page">
            <span class="icon la la-file"></span>
            <span class="title"> {{ __('Blank Page') }}</span>
        </a> --}}
        <a href="https://yeti.yetithemes.net/docs/laravel" target="_blank" class="link" data-toggle="tooltip-menu"
            data-tippy-content="Docs">
            <span class="icon la la-book-open"></span>
            <span class="title"> {{ __('Docs') }}</span>
        </a>
    </div>

    <!-- Dashboard -->
    <!--
    <div class="menu-detail" data-menu="dashboard">
        <div class="menu-detail-wrapper">
            <a href="index.html">
                <span class="la la-cube"></span>
                Default
            </a>
            <a href="index.html">
                <span class="la la-file-alt"></span>
                Content
            </a>
            <a href="index.html">
                <span class="la la-shopping-bag"></span>
                Ecommerce
            </a>
        </div>
    </div>
    -->

    <!-- UI -->
    <div class="menu-detail" data-menu="ui">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Form</h6>
            <a href="{{ url('/ui/form/components') }}">
                <span class="la la-cubes"></span>
                Components
            </a>
            <a href="{{ url('/ui/form/input-groups') }}">
                <span class="la la-stop"></span>
                Input Groups
            </a>
            <a href="{{ url('/ui/form/layout') }}">
                <span class="la la-th-large"></span>
                Layout
            </a>
            <a href="{{ url('/ui/form/validations') }}">
                <span class="la la-check-circle"></span>
                Validations
            </a>
            <a href="{{ url('/ui/form/wizards') }}">
                <span class="la la-hand-pointer"></span>
                Wizards
            </a>
            <hr>
            <h6 class="uppercase">Components</h6>
            <a href="{{ url('/ui/components/alerts') }}">
                <span class="la la-bell"></span>
                Alerts
            </a>
            <a href="{{ url('/ui/components/avatars') }}">
                <span class="la la-user-circle"></span>
                Avatars
            </a>
            <a href="{{ url('/ui/components/badges') }}">
                <span class="la la-certificate"></span>
                Badges
            </a>
            <a href="{{ url('/ui/components/buttons') }}">
                <span class="la la-play"></span>
                Buttons
            </a>
            <a href="{{ url('/ui/components/cards') }}">
                <span class="la la-layer-group"></span>
                Cards
            </a>
            <a href="{{ url('/ui/components/collapse') }}">
                <span class="la la-arrow-circle-right"></span>
                Collapse
            </a>
            <a href="{{ url('/ui/components/colors') }}">
                <span class="la la-palette"></span>
                Colors
            </a>
            <a href="{{ url('/ui/components/dropdowns') }}">
                <span class="la la-arrow-circle-down"></span>
                Dropdowns
            </a>
            <a href="{{ url('/ui/components/modal') }}">
                <span class="la la-times-circle"></span>
                Modal
            </a>
            <a href="{{ url('/ui/components/popovers-tooltips') }}">
                <span class="la la-thumbtack"></span>
                Popovers & Tooltips
            </a>
            <a href="{{ url('/ui/components/tabs') }}">
                <span class="la la-columns"></span>
                Tabs
            </a>
            <a href="{{ url('/ui/components/tables') }}">
                <span class="la la-table"></span>
                Tables
            </a>
            <a href="{{ url('/ui/components/toasts') }}">
                <span class="la la-bell"></span>
                Toasts
            </a>
            <hr>
            <h6 class="uppercase">Extras</h6>
            <a href="{{ url('/ui/extras/carousel') }}">
                <span class="la la-images"></span>
                Carousel
            </a>
            <a href="{{ url('/ui/extras/charts') }}">
                <span class="la la-chart-area"></span>
                Charts
            </a>
            <a href="{{ url('/ui/extras/editors') }}">
                <span class="la la-keyboard"></span>
                Editors
            </a>
            <a href="{{ url('/ui/extras/sortable') }}">
                <span class="la la-sort"></span>
                Sortable
            </a>
        </div>
    </div>

    <!-- Pages -->
    <div class="menu-detail" data-menu="pages">
        <div class="menu-detail-wrapper">
            <h6 class="uppercase">Authentication</h6>
            <a href="{{ url('pages/auth/login') }}">
                <span class="la la-user"></span>
                Login
            </a>
            <a href="{{ url('pages/auth/forgot-password') }}">
                <span class="la la-user-lock"></span>
                Forgot Password
            </a>
            <a href="{{ url('pages/auth/register') }}">
                <span class="la la-user-plus"></span>
                Register
            </a>
            <hr>
            <h6 class="uppercase">Blog</h6>
            <a href="{{ url('pages/blog/list') }}">
                <span class="la la-list"></span>
                List
            </a>
            <a href="{{ url('pages/blog/list-card-rows') }}">
                <span class="la la-list"></span>
                List - Card Rows
            </a>
            <a href="{{ url('pages/blog/list-card-columns') }}">
                <span class="la la-list"></span>
                List - Card Columns
            </a>
            <a href="{{ url('pages/blog/add') }}">
                <span class="la la-layer-group"></span>
                Add Post
            </a>
            <hr>
            <h6 class="uppercase">Errors</h6>
            <a href="{{ url('pages/errors/403') }}" target="_blank">
                <span class="la la-exclamation-circle"></span>
                403 Error
            </a>
            <a href="{{ url('pages/errors/404') }}" target="_blank">
                <span class="la la-exclamation-circle"></span>
                404 Error
            </a>
            <a href="{{ url('pages/errors/500') }}" target="_blank">
                <span class="la la-exclamation-circle"></span>
                500 Error
            </a>
            <a href="{{ url('pages/errors/under-maintenance') }}" target="_blank">
                <span class="la la-exclamation-circle"></span>
                Under Maintenance
            </a>
            <hr>
            <a href="{{ url('pages/pricing') }}">
                <span class="la la-dollar"></span>
                Pricing
            </a>
            <a href="{{ url('pages/faqs-layout-1') }}">
                <span class="la la-question-circle"></span>
                FAQs - Layout 1
            </a>
            <a href="{{ url('pages/faqs-layout-2') }}">
                <span class="la la-question-circle"></span>
                FAQs - Layout 2
            </a>
            <a href="{{ url('pages/invoice') }}">
                <span class="la la-file-invoice-dollar"></span>
                Invoice
            </a>
        </div>
    </div>

    <!-- Applications -->
    <div class="menu-detail" data-menu="applications">
        <div class="menu-detail-wrapper">
            <a href="{{ url('applications/media-library') }}">
                <span class="la la-image"></span>
                Media Library
            </a>
            <a href="{{ url('applications/point-of-sale') }}">
                <span class="la la-shopping-bag"></span>
                Point Of Sale
            </a>
            <a href="{{ url('applications/to-do') }}">
                <span class="la la-check-circle"></span>
                To Do
            </a>
            <a href="{{ url('applications/chat') }}">
                <span class="la la-comment"></span>
                Chat
            </a>
        </div>
    </div>

    <!-- Menu -->
    <div class="menu-detail" data-menu="menu">
        <div class="menu-detail-wrapper">
            <a href="#no-link">
                <span class="la la-cube"></span>
                Default
            </a>
            <a href="#no-link">
                <span class="la la-file-alt"></span>
                Content
            </a>
            <a href="#no-link">
                <span class="la la-shopping-bag"></span>
                Ecommerce
            </a>
            <hr>
            <a href="#no-link">
                <span class="la la-layer-group"></span>
                Main Level
            </a>
            <a href="#no-link">
                <span class="la la-arrow-circle-right"></span>
                Grand Parent
            </a>
            <button class="collapse-header active" data-toggle="collapse" data-target="#menuGrandParentOpen">
                <span class="collapse-indicator la la-arrow-circle-down"></span>
                Grand Parent Open
            </button>
            <div id="menuGrandParentOpen" class="collapse open">
                <a href="#no-link">
                    <span class="la la-layer-group"></span>
                    Sub Level
                </a>
                <a href="#no-link">
                    <span class="la la-arrow-circle-right"></span>
                    Parent
                </a>
                <button class="collapse-header active" data-toggle="collapse" data-target="#menuParentOpen">
                    <span class="collapse-indicator la la-arrow-circle-down"></span>
                    Parent Open
                </button>
                <div id="menuParentOpen" class="collapse open">
                    <a href="#no-link">
                        <span class="la la-layer-group"></span>
                        Sub Level
                    </a>
                </div>
            </div>
            <hr>
            <h6 class="uppercase">Menu Types</h6>
            <a href="#no-link" data-toggle="menu-type" data-value="default">
                <span class="la la-hand-point-right"></span>
                Default
            </a>
            <a href="#no-link" data-toggle="menu-type" data-value="hidden">
                <span class="la la-hand-point-left"></span>
                Hidden
            </a>
            <a href="#no-link" data-toggle="menu-type" data-value="icon-only">
                <span class="la la-th-large"></span>
                Icons Only
            </a>
            <a href="#no-link" data-toggle="menu-type" data-value="wide">
                <span class="la la-arrows-alt-h"></span>
                Wide
            </a>
        </div>
    </div>
</aside>

@include('partials._customizer')
