@extends('layouts.nofollow')
@section('page-title')
    Login
@endsection()
@section('include')
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('main')

<div style="max-width: 600px;" class="m-auto min-h-screen flex flex-col pt-6">

    <div class="border rounded p-4">

        <div class="header text-2xl py-6 text-center">{{ __('Login') }}</div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <x-google-login-button>
                @if(isset($redirect))
                <x-slot name="link">{{ $redirect }}</x-slot>
                @endif
            </x-google-login-button>

            <br>
            <hr>
            <div class="text-center text-sm py-5 text-gray-600">Don't have an account?</div>
            <div class="text-center pb-2">
                <a href="{{ url('register?') }}@if(isset($redirect))link={{ $redirect }}@endif">
                    <button type="button" class="border rounded-full px-10 py-1 main-bg-c text-white text-sm main-b-c duration-100 focus:outline-none">Sign Up</button>
                </a>
            </div>

            @if(isset($redirect))
            <input type="hidden" name="link" value="{{ $redirect }}">
            @endif

        </form>

    </div>

</div>

@endsection