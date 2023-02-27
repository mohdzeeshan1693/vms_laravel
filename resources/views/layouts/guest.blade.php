<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon"> --}} <!-- Favicon-->
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        
        @yield('meta')

        @stack('before-styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        @stack('after-styles')

        @if (trim($__env->yieldContent('page-styles')))    
            @yield('page-styles')
        @endif 

        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme1.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    </head>
    <body class="theme-cyan font-montserrat">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
            </div>
        </div>
        <div class="auth"{{--  style="background-image: url('{{ asset('/assets/images/saudi-national-day.jpg') }}'); background-repeat: round;" --}}> <!-- bacground image for national day -->
            <div class="auth_left">
                @yield('content')
            </div>    
            @include('layouts.login_right') <!-- comment for only national day -->
        </div>

        <!-- livewire script -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Scripts -->
        @stack('before-scripts')
        <script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/core.js') }}"></script>
        @stack('after-scripts')

        @if (trim($__env->yieldContent('page-script')))
            @yield('page-script')
        @endif

        {{-- <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div> --}}
    </body>
</html>
