@extends('layouts/boss')

@push('css-addon')
@endpush

@section('content')
    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="above-heading">Download Gratis</div>
                    <h2 class="h2-heading">Pilih Metode Download</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Social Media</div>
                            <div class="price"><span class="currency">Rp</span><span class="value">Gratis</span></div>
                            <div class="frequency">per 1 Makalah</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Wajib Follow Seluruh Social Media Kami</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Wajib Posting Promosi Konten Kami Dan Tag Kami Di Sosial Media</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Menunggu Proses Verifikasi (5-6 Jam)</div>
                                </li>
                                
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="{{ route('social.redirect', ['id_makalah' => $idMakalah, 'judul_makalah' => $judulMakalah, 'format' => $format, 'harga' => $harga]) }}">Mulai</a>
                            </div>
                        </div>
                    </div> <!-- end of card -->
                    <!-- end of card -->

                    <!-- Card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Upload Makalah</div>
                            <div class="price"><span class="currency">Rp</span><span class="value">Gratis</span></div>
                            <div class="frequency">per 1 Makalah</div>
                            <div class="divider"></div>
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Wajib Upload 3 Makalah Yang Berbeda</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-check"></i><div class="media-body">Menunggu Proses Verifikasi (3-4 Jam)</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <a class="btn-solid-reg page-scroll" href="{{ route('download.redirect', ['id_makalah' => $idMakalah, 'judul_makalah' => $judulMakalah, 'format' => $format, 'harga' => $harga]) }}">Mulai</a>
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
        <img class="img-fluid" src="{{ asset('assets') }}/images/testimonial-1.jpg" alt="alternative">
    </div> <!-- end of image-wrapper -->
    <div class="text-wrapper">
        <div class="testimonial-text">Saya mulai menggunakan layanan ini sekitar setahun yang lalu dan saya tidak pernah berhenti sejak saat itu. Layanan ini sangat membantu dalam pembuatan makalah dan memungkinkan saya fokus pada kegiatan utama seperti penelitian produk baru dan desain. Saya sangat menyukainya dan sangat merekomendasikannya kepada semua orang.</div>
        <div class="testimonial-author">Budi Susanto - Mahasiswa</div>
    </div> <!-- end of text-wrapper -->
</div> <!-- end of swiper-slide -->
<!-- end of slide -->

<!-- Slide -->
<div class="swiper-slide">
    <div class="image-wrapper">
        <img class="img-fluid" src="{{ asset('assets') }}/images/testimonial-2.jpg" alt="alternative">
    </div> <!-- end of image-wrapper -->
    <div class="text-wrapper">
        <div class="testimonial-text">Fitur-fitur luar biasa dengan harga yang terjangkau. Saya tidak pernah membayangkan bahwa biaya yang sangat rendah akan memberi saya begitu banyak makalah per bulan. Sebelum menggunakan layanan ini, saya menggunakan jasa lain yang biayanya 10 kali lipat lebih mahal dan hasilnya jauh lebih buruk. Sangat direkomendasikan untuk para peneliti yang fokus pada hasil.</div>
        <div class="testimonial-author">Siti Rahayu - Peneliti</div>
    </div> <!-- end of text-wrapper -->
</div> <!-- end of swiper-slide -->
<!-- end of slide -->

<!-- Slide -->
<div class="swiper-slide">
    <div class "image-wrapper">
        <img class="img-fluid" src="{{ asset('assets') }}/images/testimonial-3.jpg" alt="alternative">
    </div> <!-- end of image-wrapper -->
    <div class="text-wrapper">
        <div class="testimonial-text">Tivo adalah aplikasi otomatisasi pemasaran terbaik untuk bisnis kecil dan menengah. Ini memahami cara berpikir pengusaha muda dan menyediakan data yang diperlukan untuk pengambilan keputusan pemasaran yang bijak. Cukup coba dan Anda pasti tidak akan menyesal menghabiskan waktu Anda.</div>
        <div class="testimonial-author">Ahmad Farhan - Pebisnis Online</div>
    </div> <!-- end of text-wrapper -->
</div> <!-- end of swiper-slide -->
<!-- end of slide -->

<!-- Slide -->
<div class="swiper-slide">
    <div class="image-wrapper">
        <img class="img-fluid" src="{{ asset('assets') }}/images/testimonial-4.jpg" alt="alternative">
    </div> <!-- end of image-wrapper -->
    <div class="text-wrapper">
        <div class="testimonial-text">Tivo adalah salah satu aplikasi otomatisasi pemasaran terbaik. Saya khususnya menyukai modul Alat Pelaporan karena memberi saya banyak informasi berdasarkan sedikit data yang diinputkan dalam beberapa minggu penggunaan yang ringan. Sangat direkomendasikan!</div>
        <div class="testimonial-author">Dewi Sari - Pebisnis Online</div>
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