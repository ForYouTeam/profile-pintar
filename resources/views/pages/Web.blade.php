<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPERASI-SINAR KASIH</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/web/img/logo-koprasi.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/web/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/web/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/web/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/web/css/style.css')}}" rel="stylesheet">
    <style>
        .crop-image{
            width: 100% !important; /* Ganti dengan lebar div yang diinginkan */
            height: 200px !important; /* Ganti dengan tinggi div yang diinginkan */
            overflow: hidden !important;
        }
        .cs-image{
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }
        #komentarlist{
            max-height: 600px;
            width: 100%;
            overflow-x: hidden;
            overflow-y: hidden;
        }
        .img-comment {
            max-width: 100%;
            max-height: 100%;
        }

        .my-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }

        #comment-input-box{
            position: absolute;
            bottom: 1%;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="index.html" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <img src="{{asset('assets/web/img/logo-koprasi.png')}}" alt="" style="height: 50px">&nbsp;<h2 class="text-light">SINAR KASIH</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#home" class="nav-item nav-link">Awal</a>
                <a href="#about-us" class="nav-item nav-link">Tentang Kami</a>
                <a href="#kontribusi" class="nav-item nav-link">Kontribusi</a>
                <a href="#postingan" class="nav-item nav-link">Postingan</a>
                <a href="#keunggulan" class="nav-item nav-link">Keunggulan</a>
                <a href="#kontak" class="nav-item nav-link">Kontak</a>
            </div>
            <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-headphones text-primary me-3"></i>
                @if ($data['aboutUs'])
                    {{ $data['aboutUs']['telepon'] }}
                @endif
            </h4>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div id="home" class="container-fluid p-0 pb-5">
        <div class="owl-carousel header-carousel position-relative mb-5">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{asset('assets/web/img/bgkoprasi.jpg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(6, 3, 21, .5);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Masyarakat Berdaya, Koperasi Membantu: Sinergi Bisnis Untuk Kemakmuran Bersama!</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Koperasi <span class="text-primary">Sinar Kasih</span></h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Bersama-sama, Marilah Kita Berkumpul dan Menyuarakan Seruan untuk Membangun Masyarakat yang Maju, Sejahtera, dan Penuh Harapan!.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Baca Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div id="about-us" class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container about py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-5 ps-lg-0 wow fadeInLeft" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('assets/web/img/about.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-7 about-text wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="text-secondary text-uppercase mb-3">Tentang Kami</h6>
                    <h1 class="mb-5">Membantu Mendorong Ekonomi Masyarakat</h1>
                    <p class="mb-5">
                        @if ($data['aboutUs'])
                            {{ $data['aboutUs']['deskripsi'] }}
                        @endif
                    </p>
                    <div class="row g-4 mb-5">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <i class="fa fa-globe fa-3x text-primary mb-3"></i>
                            <h5>Visi</h5>
                            <p class="m-0">
                                @if ($data['aboutUs'])
                                    {{ $data['aboutUs']['visi'] }}
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.7s">
                            <i class="fa fa-paper-plane fa-3x text-primary mb-3"></i>
                            <h5>Misi</h5>
                            <p class="m-0">
                                @if ($data['aboutUs'])
                                    {{ $data['aboutUs']['misi'] }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div id="kontribusi" class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Kontribusi</h6>
                    <h1 class="mb-5">Satukan Langkah, Berkarya untuk Kemajuan Bersama!</h1>
                    <p class="mb-5">Program-program koperasi kami telah memberikan bantuan yang signifikan kepada banyak masyarakat. Program-program koperasi kami telah memberikan bantuan yang signifikan kepada banyak masyarakat.</p>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                        <div class="ps-4">
                            <h6>Hubungi Kami!</h6>
                            <h3 class="text-primary m-0">
                                @if ($data['aboutUs'])
                                    {{ $data['aboutUs']['telepon'] }}
                                @endif    
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <div class="bg-primary p-4 mb-4 wow fadeIn" data-wow-delay="0.3s">
                                <i class="fa fa-users fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Masyarakat</p>
                            </div>
                            <div class="bg-secondary p-4 wow fadeIn" data-wow-delay="0.5s">
                                <i class="fa fa-link fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Kontribusi</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-success p-4 wow fadeIn" data-wow-delay="0.7s">
                                <i class="fa fa-star fa-2x text-white mb-3"></i>
                                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                                <p class="text-white mb-0">Program Kerja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <div id="postingan" class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Postingan</h6>
                <h1 class="mb-5">Liat postingan terbaru disini!</h1>
            </div>
            <div class="row g-4">
                @foreach ($data['postingan'] as $item)
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="overflow-hidden mb-4">
                            <div class="crop-image">
                                <img class="img-fluid cs-image" src="{{asset('storage/gambar')}}/{{$item['path']}}" alt="">
                            </div>
                        </div>
                        <h4 class="mb-3">{{ $item['judul'] }}</h4>
                        <p>{{ $item['kontent'] }}.</p>
                        <a class="btn-slide mt-2" role="button" id="comment" data-id="{{$item['id']}}" data-url="{{asset('storage/gambar')}}/{{$item['path']}}"
                        data-collect="{{$item}}"><i class="fa fa-comment"></i><span>Komentar</span></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModal" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 my-container">
                            <img id="imgcomment" class="img-comment" src="" alt="">
                        </div>
                        <div class="col-lg-4 p-3 mt-1 shadow" style="position: relative;">
                            <h4 id="title-post">TITLE</h4>
                            <p id="content-post">Lorem</p>
                            <hr>
                            <div id="komentarlist">
                            
                            </div>
                            <div id="comment-input-box" class="d-flex mt-5">
                                <input id="postinganid" type="hidden">
                                <input id="alias" required type="text" class="form-control float-start mt-2" placeholder="--Alias nama disini--" style="width: 40% !important">
                                <input id="_komentar" required type="text" class="form-control float-start mt-2" placeholder="--Komentar disini--">
                                <button id="sendcomment" type="button" class="btn btn-primary float-end mt-2 ms-1 rounded" data-dismiss="modal"><i class="fa fa-comment fs-4"></i></button>
                            </div>
                        </div>
                    </div>
                    <button id="closeModal" type="button" class="btn btn-secondary float-end mt-4 ms-5" data-dismiss="modal">Tutup</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div id="keunggulan" class="container-fluid overflow-hidden py-5 px-lg-0">
        <div class="container feature py-5 px-lg-0">
            <div class="row g-5 mx-lg-0">
                <div class="col-lg-6 feature-text wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Keunggulan</h6>
                    <h1 class="mb-5">Unggul Bersama Koperasi!</h1>
                    <div class="d-flex mb-5 wow fadeInUp" data-wow-delay="0.3s">
                        <i class="fa fa-globe text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Kolaborasi yang Kuat</h5>
                            <p class="mb-0">Dengan saling berbagi pengalaman, sumber daya, dan pengetahuan, kami menciptakan lingkungan yang mendukung pertumbuhan bisnis secara kolektif.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-5 wow fadeIn" data-wow-delay="0.5s">
                        <i class="fa fa-headphones text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Pelayanan Profesional</h5>
                            <p class="mb-0">Dari pendampingan bisnis hingga pengelolaan administrasi, kami berkomitmen untuk menyediakan layanan berkualitas tinggi guna membantu anggota mencapai tujuan mereka.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-0 wow fadeInUp" data-wow-delay="0.7s">
                        <i class="fa fa-tree text-primary fa-3x flex-shrink-0"></i>
                        <div class="ms-4">
                            <h5>Akses ke Sumber Daya</h5>
                            <p class="mb-0">memberikan akses yang mudah dan terjangkau ke sumber daya yang dibutuhkan untuk mengembangkan usaha. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeInRight" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('assets/web/img/feature.jpg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Quote Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase mb-3">Kirim Pertanyaan</h6>
                    <h1 class="mb-5">Berikan pertanyaan untuk kami!</h1>
                    <p class="mb-5">Berikan pertanyaan pada kami melalui komentar postingan atau menghubungi kami melalui sosial media</p>
                    <div class="d-flex align-items-center">
                        <i class="fa fa-phone fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                        <div class="ps-4">
                            <h6>Whatsapp Only!</h6>
                            <h3 class="text-primary m-0">
                            @if ($data['aboutUs'])
                                {{ $data['aboutUs']['telepon'] }}
                            @endif</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container py-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Struktur Organisasi</h6>
                <h1 class="mb-5">Anggota Koperasi</h1>
            </div>
            <div class="row g-4 text-center justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h5 class="text-center text-muted">MANAGER</h5>
                    @if ($data['anggota']['manager'])
                        <div class="team-item px-4 pb-2">
                            <div class="overflow-hidden mb-4">
                            </div>
                            <h5 class="mb-0">{{$data['anggota']['manager']->nama}}</h5>
                            <p>{{$data['anggota']['manager']->jabatan}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp text-center" data-wow-delay="0.3s">
                    <h5 class="text-center text-muted">KONSULTAN</h5>
                   @foreach ($data['anggota']['konsultan'] as $item)
                    <div class="team-item px-4 pb-2">
                        <div class="overflow-hidden mb-4">
                        </div>
                        <h5 class="mb-0">{{$item->nama}}</h5>
                        <p>{{$item->jabatan}}</p>
                    </div>
                   @endforeach
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp text-center" data-wow-delay="0.3s">
                    <h5 class="text-center text-muted">PENGURUS</h5>
                    @foreach ($data['anggota']['pengurus'] as $item)
                    <div class="team-item px-4 pb-2">
                        <div class="overflow-hidden mb-4">
                        </div>
                        <h5 class="mb-0">{{$item->nama}}</h5>
                        <p>{{$item->jabatan}}</p>
                    </div>
                   @endforeach
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp text-center" data-wow-delay="0.3s">
                    <h5 class="text-center text-muted">PENGAWAS</h5>
                    @foreach ($data['anggota']['pengawas'] as $item)
                    <div class="team-item px-4 pb-2">
                        <div class="overflow-hidden mb-4">
                        </div>
                        <h5 class="mb-0">{{$item->nama}}</h5>
                        <p>{{$item->jabatan}}</p>
                    </div>
                   @endforeach
                </div>
            </div>
            {{-- <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="{{asset('assets/web/img/team-1.jpg')}}" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <p>Designation</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="{{asset('assets/web/img/team-2.jpg')}}" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <p>Designation</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="{{asset('assets/web/img/team-3.jpg')}}" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <p>Designation</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="team-item p-4">
                        <div class="overflow-hidden mb-4">
                            <img class="img-fluid" src="{{asset('assets/web/img/team-4.jpg')}}" alt="">
                        </div>
                        <h5 class="mb-0">Full Name</h5>
                        <p>Designation</p>
                        <div class="btn-slide mt-1">
                            <i class="fa fa-share"></i>
                            <span>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Team End -->

    <!-- Footer Start -->
    <div id="kontak" class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-12 col-md-12">
                    <h4 class="text-light mb-4">Alamat</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>
                    @if ($data['aboutUs'])
                        {{ $data['aboutUs']['alamat'] }}
                    @endif</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>
                    @if ($data['aboutUs'])
                        {{ $data['aboutUs']['telepon'] }}
                    @endif
                    </p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>
                    @if ($data['aboutUs'])
                        {{ $data['aboutUs']['email'] }}
                    @endif
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">sinarkasih.co.id</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/web/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/web/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/web/moment-with-locales.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/web/js/main.js')}}"></script>
    <script>
        const baseUrl = `{{config('app.url')}}`
        function getComment(params) {
            $.get(`${baseUrl}/api/v2/komentar?postingan_id=${params}`, (res) => {
                let data = res.data
                $('#komentarlist').html('')
                $.each(data, (i, d) => {
                    $('#komentarlist').append(`
                        <div class="testimonial-item my-3">
                            <i class="fa fa-quote-right fa-3x text-light position-absolute top-0 end-0 mt-n3 me-4"></i>
                            <div class="d-flex align-items-end">
                                <p class="mb-1" style="color: gray !important; font-size: 11pt;"><i class="fa fa-user me-1"></i> <b>${d.alias}</b> <span class="ms-1" style="font-size: 9pt;">${moment(d.created_at).locale('id').fromNow()}</span></p>
                            </div>
                            <div class="row mt-1">
                                <p class="mb-0">${d._komentar}.</p>
                            </div>
                        </div>
                    `)
                })

            })
        }

        $(document).on('click', '#sendcomment', function()
        {
            let data = {
                postingan_id: $('#postinganid').val(),
                alias       : $('#alias'      ).val(),
                _komentar   : $('#_komentar'  ).val(),
                asal        : 'user',
                mac_address : '123324'
            }

            $.ajax({
                url        : `${baseUrl}/api/v2/komentar`,
                method     : "POST"                   ,
                data       : data                     ,
                success: function(res) {
                    getComment($('#postinganid').val())
                    $('#_komentar'  ).val('')
                },
                error: function(err) {
                },
                dataType   : "json"
            });
        })
        
        $(document).on('click', '#comment', function()
        {
            let dataId  = $(this).data('id'      )
            let imgpath = $(this).data('url'     )
            let collect = $(this).data('collect' )

            $('#title-post'  ).html(collect.judul  )
            $('#content-post').html(collect.kontent)

            $('#postinganid' ).val(dataId)
            $('#alias'       ).val(''),
            $('#_komentar'   ).val(''),
            $('#imgcomment'  ).attr('src', imgpath)

            getComment(dataId)
            $('#postModal').modal('show')
        })

        $(document).on('click', '#closeModal', function()
        {
            $('#postModal').modal('hide')
        })

        window.addEventListener('DOMContentLoaded', function() {
        let komentarList = document.getElementById('komentarlist');

        window.addEventListener('resize', function() {
            checkOverflow();
        });

        setInterval(function() {
            checkOverflow();
        }, 500); // Mengatur interval pengecekan tinggi elemen setiap 500 milidetik (setengah detik)

        function checkOverflow() {
            let scrollHeight = komentarList.scrollHeight;
            let clientHeight = komentarList.clientHeight;

            if (scrollHeight > clientHeight && clientHeight >= 600) {
            komentarList.style.overflowY = 'scroll';
            } else {
            komentarList.style.overflowY = 'hidden';
            }
        }

        // Memanggil fungsi checkOverflow() saat halaman dimuat
        checkOverflow();
        });
    </script>
</body>

</html>