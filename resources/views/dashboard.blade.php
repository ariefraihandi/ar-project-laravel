@extends('layouts/app')

@section('content')
    <!-- Customers -->
    <div class="slider-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-container">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/client-1.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/client-2.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/client-3.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/client-4.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/client-5.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/client-6.png" alt="alternative">
                                </div>
                            </div> <!-- end of swiper-wrapper -->
                        </div> <!-- end of swiper container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of image slider -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->



    <!-- Description -->
    <div id="start" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">LAYANAN KAMI</div>
                    <h2 class="h2-heading">Solusi untuk Berbagai Kebutuhan Akademis Anda</h2>                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/description-4.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Pembuatan Makalah</h4>
                            <p>Kami menyediakan layanan pembuatan makalah akademik berkualitas tinggi untuk membantu Anda mencapai keberhasilan dalam studi Anda.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#features">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 1 -->
            
                <!-- Card 2 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/description-5.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Pengecekan Plagiasi</h4>
                            <p>Kami juga menawarkan layanan pengecekan plagiasi yang canggih untuk memastikan keaslian dan integritas karya akademik Anda.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#features">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 2 -->
            
                <!-- Card 3 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/description-6.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Perbaikan Plagiasi</h4>
                            <p>Jika ditemukan plagiasi, kami juga menyediakan layanan perbaikan plagiasi untuk membantu Anda membuat karya yang orisinal.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#features">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 3 -->
            
                <!-- Card 4 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/description-7.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Pembuatan Website</h4>
                            <p>Kami memiliki tim yang berpengalaman dalam pembuatan website yang dapat membantu Anda membangun kehadiran online yang kuat.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#features">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 4 -->
            </div>
            
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->


    <!-- Features -->
    <div id="features" class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">FEATURES</div>
                    <h2 class="h2-heading">Kebutuhan Akademis Anda,<br>Solusi Kami</h2>
                    <p class="p-heading">Kami menyediakan beragam solusi akademis yang dirancang untuk membantu Anda mencapai kesuksesan dalam studi Anda. Dengan tim berpengalaman dan teknologi terkini, kami siap membantu Anda meraih prestasi akademis yang lebih tinggi.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Tabs Links -->
                    <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="false"><i class="fas fa-solid fa-file-word"></i>Pembuatan Makalah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true"><i class="fas fa-solid fa-check-double"></i>Pengecekan Plagiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-solid fa-file-pdf"></i>Perbaikan Plagiasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nav-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false"><i class="fas fa-regular fa-window-restore"></i></i>Pembuatan Website</a>
                        </li>
                    </ul>                    
                    <!-- end of tabs links -->

                    <!-- Tabs Content -->
                    <div class="tab-content" id="argoTabsContent">
                        <!-- Tab - Pembuatan Makalah -->
                        <div class="tab-pane fade" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/description-4.png" alt="pembuatan-makalah">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Pembuatan Makalah</h3>
                                        <p>Kami menyediakan layanan pembuatan makalah akademik berkualitas tinggi untuk membantu Anda mencapai keberhasilan dalam studi Anda. Tim ahli kami akan membantu Anda merancang dan menghasilkan makalah yang sesuai dengan kebutuhan Anda.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Penyusunan makalah yang sesuai dengan standar akademik</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Pengeditan dan proofreading untuk kesalahan tata bahasa</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Penelitian mendalam untuk konten yang akurat</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">LIGHTBOX</a>
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->
                    
                        <!-- Tab - Pengecekan Plagiasi -->
                        <div class="tab-pane fade show active" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/description-5.png" alt="pengecekan-plagiasi">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Pengecekan Plagiasi</h3>
                                        <p>Kami juga menawarkan layanan pengecekan plagiasi yang canggih untuk memastikan keaslian dan integritas karya akademik Anda. Dengan alat kami yang canggih, Anda dapat dengan mudah memeriksa apakah ada unsur plagiasi dalam tulisan Anda.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Pengecekan kesamaan teks dengan sumber-sumber online</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Laporan detil tentang persentase plagiasi</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Rekomendasi perbaikan untuk menghilangkan plagiasi</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-2">LIGHTBOX</a>
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->
                        <!-- end of tab -->
                    
                        <!-- Tab - Perbaikan Plagiasi -->
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/description-6.png" alt="perbaikan-plagiasi">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Perbaikan Plagiasi</h3>
                                        <p>Jika ditemukan plagiasi, kami juga menyediakan layanan perbaikan plagiasi untuk membantu Anda membuat karya yang orisinal. Tim kami akan membantu Anda menghilangkan plagiasi dan meningkatkan kualitas tulisan Anda.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Analisis dan perbaikan kesamaan dengan sumber-sumber plagiat</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Pengeditan untuk meningkatkan keaslian dan kualitas tulisan</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Saran perbaikan untuk menghindari plagiasi di masa depan</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-3">LIGHTBOX</a>
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of tab-pane -->

                        <!-- Tab - Pembuatan Website -->
                        <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="image-container">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/description-7.png" alt="pembuatan-website">
                                    </div> <!-- end of image-container -->
                                </div> <!-- end of col -->
                                <div class="col-lg-6">
                                    <div class="text-container">
                                        <h3>Pembuatan Website</h3>
                                        <p>Kami memiliki tim yang berpengalaman dalam pembuatan website yang dapat membantu Anda membangun kehadiran online yang kuat. Dengan desain kreatif dan fungsionalitas yang canggih, kami akan membantu Anda mencapai tujuan online Anda.</p>
                                        <ul class="list-unstyled li-space-lg">
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Desain website yang menarik dan responsif</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Pengembangan website dengan teknologi terbaru</div>
                                            </li>
                                            <li class="media">
                                                <i class="fas fa-square"></i>
                                                <div class="media-body">Optimasi SEO untuk meningkatkan visibilitas online</div>
                                            </li>
                                        </ul>
                                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-4">LIGHTBOX</a>
                                    </div> <!-- end of text-container -->
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div>
                        <!-- end of tab-pane -->

                        <!-- end of tab -->
                    </div>
                    
                    <!-- end of tabs content -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of tabs -->
    <!-- end of features -->


    <!-- Details Lightboxes -->
    <!-- Details Lightbox 1 -->
	<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>List Building</h3>
                    <hr>
                    <h5>Core service</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->

    <!-- Details Lightbox 2 -->
	<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-5">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ asset('assets') }}/images/description-5.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <h3>Cek Turnitin</h3>
                    <hr>
                    <h5>Anda Memiliki Kesempatan Pengecekan Gratis</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close" href="{{ url('/turnitin#start') }}">Cek Sekarang</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 2 -->

    <!-- Details Lightbox 3 -->
	<div id="details-lightbox-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-8">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <h3>Analytics Tools</h3>
                    <hr>
                    <h5>Core service</h5>
                    <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>
                    <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 3 -->
    <!-- end of details lightboxes -->


    <!-- Details -->
    <div id="details" class="basic-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Now Is The Time To Upgrade Your Marketing Solution</h2>
                        <p>Target the right customers for your business with the help of Tivo's patented segmentation technology and deploy efficient marketing campaigns. Keep your customers happy and loyal.</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Understand customers and meet their requirements</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Targeted client base with Tivo's efficient technology</div>
                            </li>
                        </ul>
                        <a class="btn-solid-reg page-scroll" href="sign-up.html">SIGN UP</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of details -->


    <!-- Video -->
    <div id="video" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Video Preview -->
                    <div class="image-container">
                        <div class="video-wrapper">
                            <a class="popup-youtube" href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-effect="fadeIn">
                                <img class="img-fluid" src="images/video-image.png" alt="alternative">
                                <span class="video-play-button">
                                    <span></span>
                                </span>
                            </a>
                        </div> <!-- end of video-wrapper -->
                    </div> <!-- end of image-container -->
                    <!-- end of video preview -->

                    <div class="p-heading">What better way to show off Tivo marketing automation saas app than presenting you some great situations of each module and tool available to users in a video</div>        
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of video -->


    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">PRICING</div>
                    <h2 class="h2-heading">Pricing Options Table</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">BASIC</div>
                            <div class="price"><span class="currency">$</span><span class="value">Free</span></div>
                            <div class="frequency">14 days trial</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Email Marketing Module</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">User Control Management</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">List Building And Cleaning</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Collected Data Reports</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Planning And Evaluation</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">SIGN UP</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">ADVANCED</div>
                            <div class="price"><span class="currency">$</span><span class="value">29.99</span></div>
                            <div class="frequency">monthly</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Email Marketing Module</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">User Control Management</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">List Building And Cleaning</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Collected Data Reports</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-times"></i><div class="media-body">Planning And Evaluation</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">SIGN UP</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <!--<div class="label">
                            <p class="best-value">Best Value</p>
                        </div> -->
                        <div class="card-body">
                            <div class="card-title">COMPLETE</div>
                            <div class="price"><span class="currency">$</span><span class="value">39.99</span></div>
                            <div class="frequency">monthly</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Email Marketing Module</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">User Control Management</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">List Building And Cleaning</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Collected Data Reports</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Planning And Evaluation</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">SIGN UP</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->


    <!-- Testimonials -->
    <div class="slider-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">      
                    
                    <!-- Text Slider -->
                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">
                                
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="images/testimonial-1.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">I started to use Tivo with the free trial about a year ago and never stopped since then. It does all the repeating marketing tasks and allows me to focus on core development activities like new product research and design. I love it and recommend it to everyone.</div>
                                        <div class="testimonial-author">Jude Thorn - Online Marketer</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="images/testimonial-2.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Awesome features for the money. I never thought such a low ammount of money would bring me so many leads per month. Before Tivo I used the services of an agency which cost 10x more and delivered far less. Highly recommended to marketers focused on results.</div>
                                        <div class="testimonial-author">Roy Smith - Developer</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="images/testimonial-3.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Tivo is the best marketing automation app for small and medium sized business. It understands the mindset of young entrepreneurs and provides the necessary data for wise marketing decisions. Just give it a try and you will definitely not regret spending your time.</div>
                                        <div class="testimonial-author">Marsha Singer - Online Marketer</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="images/testimonial-4.jpg" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Tivo is one of the greatest marketing automation apps out there. I especially love the Reporting Tools module because it gives me such a great amount of information based on little amounts of input gathered in just few weeks of light weight usage. Recommended!</div>
                                        <div class="testimonial-author">Ronda Louis - Online Marketer</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                            </div> <!-- end of swiper-wrapper -->
                            
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of text slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-2 -->
    <!-- end of testimonials -->


    <!-- Newsletter -->
    <div class="form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="above-heading">NEWSLETTER</div>
                        <h2>Stay Updated With The Latest News To Get More Qualified Leads</h2>

                        <!-- Newsletter Form -->
                        <form id="newsletterForm" data-toggle="validator" data-focus="false">
                            <div class="form-group">
                                <input type="email" class="form-control-input" id="nemail" required>
                                <label class="label-control" for="nemail">Email</label>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group checkbox">
                                <input type="checkbox" id="nterms" value="Agreed-to-Terms" required>I've read and agree to Tivo's written <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a> 
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control-submit-button">SUBSCRIBE</button>
                            </div>
                            <div class="form-message">
                                <div id="nmsgSubmit" class="h3 text-center hidden"></div>
                            </div>
                        </form>
                        <!-- end of newsletter form -->

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="icon-container">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> <!-- end of col -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form -->
    <!-- end of newsletter -->
@endsection