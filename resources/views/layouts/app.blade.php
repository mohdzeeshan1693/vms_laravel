<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- CSS For All Pages -->
        @stack('before-styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('assets/css/sweetalert/sweetalert.min.css') }}">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @vite(['resources/js/app.js'])

        <!-- Styles -->
        {{--  @livewireStyles --}}

        <!-- CSS Dynamic -->
        @if (trim($__env->yieldContent('page-styles')))    
        @yield('page-styles')
        @endif

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme1.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div id="main_content">
            @include('layouts.headertop')
            @include('layouts.rightbar')
            @include('layouts.userdiv')    
            @include('layouts.sidebar')

            <div class="page">
                @include('layouts.page_header')
                @yield('content')
                {{-- @include('layouts.footer') --}}
            </div>        
        </div>
        
        {{-- <x-banner /> --}}
        {{-- <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div> --}}

        <!-- dynamic popups -->
        @yield('popup')

        <!-- Scripts For All Pages-->
        @stack('before-scripts')
        <script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script> 
        <script src="{{ asset('assets/js/sweetalert/sweetalert-dev.min.js') }}"></script>

        <!-- Chat -->
        <script src="{{ asset('assets/js/core.js') }}"></script>
        
        <!-- Scripts Dynamic-->
        @if (trim($__env->yieldContent('page-script')))
        @yield('page-script')
        @endif

        <!-- Livewire js -->
       {{--  <script src="{{ mix('js/app.js') }}" defer></script> --}}
        @stack('after-scripts')
        @stack('modals')

       {{--  @stack('modals')
        @livewireScripts --}}
    </body>
</html>
