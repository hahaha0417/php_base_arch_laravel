<!-- resources/views/components/layout.blade.php -->

<html>
    <head>
        <title>hahaha</title>
        <x-backend.layout.base.meta />
        <x-backend.layout.base.css />
        <x-backend.layout.base.js />
        {{-- <x-layout.meta>
            <!-- slot -->
            xxx
        </x-layout.meta> --}}


    </head>
    <body>
        {{-- https://laracasts.com/discuss/channels/laravel/blade-hassection-what-is-it-really --}}
        {{-- https://learnku.com/docs/laravel/9.x/blade/12216#db744c --}}
        {{-- <x-backend.layout.block.header />
        @hasSection('view_begin')
            @section('view_begin')

            @show
        @endif
        @hasSection('view_design')
            @section('view_design')

            @show
        @endif
        @hasSection('content')
            @yield('content')
        @endif
        <x-backend.layout.block.footer />
        @hasSection('view_end')
            @section('view_end')

            @show
        @endif --}}
        <x-backend.layout.block.header />
        @section('view_begin')

        @show
        @section('view_design')

        @show
        @hasSection('content')
            @yield('content')
        @endif
        <x-backend.layout.block.footer />
        @section('view_end')

        @show
    </body>
</html>
