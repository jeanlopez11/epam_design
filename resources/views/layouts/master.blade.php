@include('partials._header', ['title' => $title ?? ''])
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
{{-- https://icons8.com/line-awesome AQUI SE ENCUENTRAN LOS ICONOS--}}
{{-- https://heroicons.com/ ICONOS UTILIZADOS POR TAILWIND ||   USADO YETI \node_modules\line-awesome\dist\line-awesome https://github.com/icons8/line-awesome--}} 
@livewireStyles

<body>

    @include('partials._navigation')

    <!-- Workspace -->
    <main class="workspace @hasSection('sidebar')workspace_with-sidebar @endif {{ $workspaceClasses ?? '' }}">
        {{-- {{ $slot }} --}}
        {{-- workspace es el slot, el espacio de trabajo donde estará toda la logica --}}
        @yield('workspace')

        @if (!isset($footer) or $footer)
            @include('partials._footer')
        @endif

    </main>

    @hasSection('sidebar')
        <!-- Sidebar -->
        <aside class="sidebar">

            <!-- Toggler - Mobile -->
            <button class="sidebar-toggler la la-ellipsis-v" data-toggle="sidebar"></button>

            @yield('sidebar')

        </aside>
    @endif
    <!-- Scripts -->
    <script src="{{ asset('build/js/vendor.js') }}"></script>
    @vite(['resources/js/validations.js'])

    @yield('scripts')
    <script src="{{ asset('build/js/script.js') }}"></script>
    
    @livewireScripts
</body>

</html>
