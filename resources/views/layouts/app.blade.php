<!DOCTYPE html>
<html lang="en">

    @include('layouts/partials/head')

    <body data-spy="scroll" data-target=".fixed-top">
        <!-- Preloader -->
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- end of preloader -->

        @include('layouts/partials/navbar')

        @include('layouts/partials/header')

        @yield('content')

        @include('layouts/partials/footer')

        @include('layouts/partials/script')

    </body>
</html>