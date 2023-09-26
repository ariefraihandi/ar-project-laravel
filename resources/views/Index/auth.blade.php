<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets') }}/portal/assets"
  data-template="vertical-menu-template-free"
>

    @include('Index/partials/head')

    <body>
   
        @yield('content')
                      
        @include('Index/partials/script')

    </body>
</html>