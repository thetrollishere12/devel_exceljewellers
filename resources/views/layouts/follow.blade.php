<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="robots" content="index, follow">

    @yield('include')
    <x-header-tag>
      <x-slot name="title">@yield('page-title')</x-slot>
      <x-slot name="description">@yield('page-description')</x-slot>
    </x-header-tag>
</head>
<body>
    <x-search-modal></x-search-modal>
  <header>
    <x-nav></x-nav>
  </header>
  <main>
    @yield('main')
  </main>
  
  <x-footer></x-footer>
  <x-footer-tag></x-footer-tag>
</body>
</html>