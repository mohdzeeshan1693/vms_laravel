@extends('layouts.guest')
@section('title', 'Login')

@section('content')
<div class="card">
    <div class="text-center mb-2">
        <a class="header-brand" href=""><i class="fe fe-command brand-logo"></i></a>
    </div>
    <div class="card-body">
        <div class="card-title">Login to your account</div>

        <x-validation-errors class="mb-4" />
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" placeholder="Enter email" required autofocus >
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Password
                <a href="{{ route('password.request') }}" class="float-right small">{{ __('Forgot your password?') }}</a></label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox" for="remember_me">
                <input type="checkbox" class="custom-control-input" id="remember_me" name="remember" />
                <span class="custom-control-label">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </div>
        </form>
    </div>
</div>
@stop



{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
 --}}