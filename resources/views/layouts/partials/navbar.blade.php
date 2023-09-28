<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.html"><img src="{{ asset('assets') }}/images/logo/art.png" alt="alternative"></a> 
       
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ url('/') }}">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#features">FEATURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#details">DETAILS</a>
                </li>

                <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="{{ url('/') }}#start" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">LAYANAN</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/') }}#features"><span class="item-text">MAKALAH</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ url('/') }}#features"><span class="item-text">PLAGIASI</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="{{ url('/') }}#features"><span class="item-text">WEBSITE</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#pricing">PRICING</a>
                </li>
            </ul>
            <span class="nav-item">
                <a class="btn-outline-sm" href="{{ url('/login') }}">LOG IN</a>
            </span>
        </div>
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->