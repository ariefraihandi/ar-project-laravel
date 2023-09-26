<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Tivo is a HTML landing page template built with Bootstrap to help you crate engaging presentations for SaaS apps and convert visitors into users.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="AR Project" /> <!-- Nama situs web Anda -->
    <meta property="og:site" content="https://www.ariefraihandi.biz.id" /> <!-- Tautan situs web Anda -->
    <meta property="og:title" content="Jasa Pembuatan Makalah, Pengecekan Turnitin, dan Pembuatan Website di Lhokseumawe" /> <!-- Judul yang akan ditampilkan pada posting yang dibagikan -->
    <meta property="og:description" content="Kami adalah penyedia jasa terpercaya di Lhokseumawe untuk pembuatan makalah berkualitas, pengecekan Turnitin gratis, perbaikan plagiasi, dan pembuatan website profesional." /> <!-- Deskripsi yang akan ditampilkan pada posting yang dibagikan -->
    <meta property="og:image" content="https://www.ariefraihandi.biz.id/assets/images/logo/arp.png" /> <!-- Tautan gambar yang sesuai dengan bisnis Anda (pastikan gambarnya berformat jpg) -->
    <meta property="og:url" content="https://www.ariefraihandi.biz.id" /> <!-- Tautan yang ingin Anda bagikan dalam posting -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>{{$title}} - {{$subtitle}}</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/fontawesome-all.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/swiper.css" rel="stylesheet">
	<link href="{{ asset('assets') }}/css/magnific-popup.css" rel="stylesheet">
	<link href="{{ asset('assets') }}/css/styles.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

	<!-- Favicon  -->
    <link rel="icon" href="{{ asset('assets') }}/images/logo/arp.png">
    @stack('head-script')
</head>
@stack('css-addon')
