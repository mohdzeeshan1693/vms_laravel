<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- CSS For All Pages -->
        @stack('before-styles')
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('assets/css/sweetalert/sweetalert.min.css') }}">

        <!-- CSS Dynamic -->
        @if (trim($__env->yieldContent('page-styles')))    
        @yield('page-styles')
        @endif 

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/theme1.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    </head>
   
    @if (App::getLocale() == 'en')
    <body class="font-montserrat">
    @else
    <body class="font-montserrat rtl">
    @endif
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
            </div>
        </div>
           
        <!-- content -->
        @yield('content')

        <!-- dynamic popups -->
        @yield('popup')

        <!-- Scripts For All Pages-->
        @stack('before-scripts')
        <script src="{{ asset('assets/bundles/lib.vendor.bundle.js') }}"></script> 
        <script src="{{ asset('assets/js/sweetalert/sweetalert-dev.min.js') }}"></script>
        
        <!-- Scripts Dynamic-->
        @if (trim($__env->yieldContent('page-script')))
        @yield('page-script')
        @endif
    </body>
</html>
