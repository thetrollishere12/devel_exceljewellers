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
    
    <div class="service-container m-auto p-2" style="max-width: 1000px;">
      <h1 class="service-title">@yield('title')</h1>
      @yield('img')
      <h2 class="service-sub-title">@yield('sub-title')</h2>
    @yield('main')
    </div>

  </main>
  
  <x-footer></x-footer>
  <x-footer-tag></x-footer-tag>
</body>
</html>

<style type="text/css">

  .service-container h1{
    margin: 20px 0px 5px 0px;
    padding: 10px 0px;
  }

  .service-container h2{
    padding: 10px 0px;
  }


  .service-container h1,.service-container h2,.service-container h3,.service-container h4{
    color: #d60d8c;
  }

</style>