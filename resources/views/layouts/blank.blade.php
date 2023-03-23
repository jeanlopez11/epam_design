@include('partials._header', ['title' => $title ?? ''])

<body>

    @include('partials._customizer')
    @livewireStyles

    @yield('body')

    <!-- Scripts -->
    <script src="{{ asset('build/js/vendor.js') }}"></script>
    
    @yield('scripts')
    
    <script src="{{ asset('build/js/script.js') }}"></script>
    @vite(['resources/js/validations.js'])
    @livewireScripts

</body>

</html>
