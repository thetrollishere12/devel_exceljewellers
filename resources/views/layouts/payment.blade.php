<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta name="robots" content="noindex, nofollow">
    
    @yield('include')
    <x-header-tag>
        <x-slot name="title">@yield('page-title')</x-slot>
    </x-header-tag>
   
</head>
<body style="padding: 0px !important;">
    <x-payment-processing></x-payment-processing>
    <x-search-modal></x-search-modal>
    @yield('main')
    <x-footer-tag></x-footer-tag>
</body>
</html>