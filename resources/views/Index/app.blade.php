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
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
            @include('Index/partials/sidebar')
                <div class="layout-page">
                @include('Index/partials/navbar')
                    <div class="content-wrapper">
                        @yield('content')
                        @include('Index/partials/footer')
                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        @include('Index/partials/script')

    </body>
</html>