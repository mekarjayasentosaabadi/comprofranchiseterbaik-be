<!DOCTYPE html>
<html lang="en">
  <head>
        @include('layoutfrontend.header')
        @yield('custom-css')
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    {{-- header image --}}
      @stack('header-image')
    {{-- /header image --}}

    {{-- navbar --}}
        @include('layoutfrontend.navbar')
    {{-- /navbar --}}

    {{-- content --}}
        @yield('content')
    {{-- /content --}}
   
    {{-- footer --}}
    @include('layoutfrontend.footer')
    {{-- /footer --}}
  </body>
</html>
