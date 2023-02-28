@extends('layouts.guest')
@section('title', 'Register')

@section('content')
<div class="card">
    <div class="text-center mb-5">
        <a class="header-brand" href=""><i class="fe fe-command brand-logo"></i></a>
    </div>
    <div class="card-body">
        <div class="card-title">Create new account</div>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" name="name" :value="old('name')" autocomplete="name" placeholder="Enter name" required autofocus >
            </div>
            <div class="form-group">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" required>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="form-group">
                <label class="custom-control custom-checkbox" for="terms">
                <input type="checkbox" class="custom-control-input" name="terms" id="terms" />
                <span class="custom-control-label">Agree the 
                    <a href="{{ route('terms.show') }}">terms</a>and
                    <a href="{{ route('policy.show') }}">policy</a>
                </span>
                </label>
            </div>
            @endif

            <div class="form-footer">
                <button type="submit" class="btn btn-primary btn-block">Create new account</button>
            </div>
        </form>
    </div>
    <div class="text-center text-muted">
        {{ __('Already registered?') }} <a href="{{ route('login') }}">Sign in</a>
    </div>
</div>
@stop