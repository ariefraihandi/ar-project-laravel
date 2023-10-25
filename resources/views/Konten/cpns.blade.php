@extends('layouts/appcpns')

@push('css-addon')
<style>
    .form-group label {
        display: flex;
        align-items: left;
        justify-content: flex-start;
    }

    .form-group label input[type="checkbox"] {
        margin-right: 10px; /* Menambahkan jarak antara checkbox dan label */
    }
</style>


@endpush

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
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-1.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-2.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-3.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-4.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-5.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-6.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-7.png" alt="alternative">
                                </div>
                                <div class="swiper-slide">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/client/cpns-8.png" alt="alternative">
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
                    <div class="above-heading">JENIS SOAL</div>
                    <h2 class="h2-heading">Download Paket Bundling Soal CPNS Dengan Lebih Dari 1000 Soal Dan Latihan</h2>                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/skd.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Soal SKD</h4>
                            <p>Temukan beragam contoh soal SKD yang siap membantu Anda menghadapi ujian dengan percaya diri.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#pricing">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 1 -->
            
                <!-- Card 2 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/skb.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Soal SKB</h4>
                            <p>Perbaiki persiapan ujian Anda dengan koleksi lengkap soal SKB kami dan tingkatkan peluang kesuksesan Anda.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#pricing">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 2 -->
            
                <!-- Card 3 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/latihan.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Latihan</h4>
                            <p>Tingkatkan keterampilan Anda dengan beragam soal latihan yang kami tawarkan untuk peningkatan prestasi Anda.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#pricing">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 3 -->
            
                <!-- Card 4 -->
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-image">
                            <img class="img-fluid" src="{{ asset('assets') }}/images/tryout.png" alt="alternative">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Try Out</h4>
                            <p>Uji kemampuan Anda dengan berbagai latihan soal Try Out yang kami sediakan untuk persiapan yang lebih baik.</p>
                            <a class="btn-solid-reg nav-link page-scroll" href="#pricing">Pelajari Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <!-- End of Card 4 -->
            </div>
            
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of description -->

    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">HARGA</div>
                    <h2 class="h2-heading">DOWNLOAD BUNDLING 1000 SOAL CPNS TERAKURAT</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">PAKET BUNDLING</div>
                            <div class="price"><span class="currency">Rp</span><span class="value">30.000</span></div>
                            <div class="frequency">Permanet</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ribuan Soal SKD</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ribuan Soal SKB</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ribuan Soal Latihan</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Ribuan Soal TryOut</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Langsung Dikirim VIA Email</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Proses Pembayaran Aman</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Garansi Uang Kembali</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="sign-up.html">Pesan Sekarang</a>
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
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/testi-1.png" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Ebook soal CPNS yang saya download dari situs ini benar-benar membantu saya dalam persiapan ujian. Saya sekarang telah menjadi seorang PNS dan sangat berterima kasih. Setelah saya mendownload bundeling dari AR Project, saya merasa lebih siap dan percaya diri menghadapi ujian.</div>
                                        <div class="testimonial-author">Budi - PNS</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/testi-2.png" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Berkat ebook soal tes CPNS yang saya peroleh di sini, saya berhasil mencapai impian saya untuk menjadi seorang PNS. Soal-soalnya sangat bermanfaat dan mirip dengan yang ada di ujian sebenarnya. Setelah saya mendownload bundeling dari AR Project, saya merasa persiapan saya semakin lengkap.</div>
                                        <div class="testimonial-author">Dika - PNS</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/testi-3.png" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Saya merasa sangat beruntung menemukan bundel soal ini. Materinya lengkap dan relevan dengan ujian CPNS. Dengan bantuan ebook ini, saya berhasil lulus dan menjadi PPPK. Setelah saya mendownload bundeling dari AR Project, saya merasa lebih yakin dalam menghadapi ujian.</div>
                                        <div class="testimonial-author">Citra - PPPK</div>
                                    </div> <!-- end of text-wrapper -->
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="image-wrapper">
                                        <img class="img-fluid" src="{{ asset('assets') }}/images/testi-4.png" alt="alternative">
                                    </div> <!-- end of image-wrapper -->
                                    <div class="text-wrapper">
                                        <div class="testimonial-text">Terima kasih atas bundel soal yang luar biasa ini! Saya telah mengunduhnya dan dengan bantuan materi yang berkualitas, saya berhasil lulus seleksi CPNS. Sungguh luar biasa! Setelah saya mendownload bundeling dari AR Project, semangat belajar saya semakin meningkat. Recommended!</div>
                                        <div class="testimonial-author">Amanda - PNS</div>
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

@endsection