<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Pakar Tindak Pidana Kecelakaan Lalu Lintas</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="landing/css/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="landing/css/animate/animate.min.css" rel="stylesheet">
    <link href="landing/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing/css/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="landing/css/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="landing/css/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="landing/css/remixicon/remixicon.css" rel="stylesheet">
    <link href="landing/css/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="landing/css/style/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#welcome-message').click(function() {
                if (confirm('Apakah Anda yakin ingin logout?')) {
                    $(this).fadeOut(300, function() {
                        $('<form>', {
                                'action': "{{ route('logout') }}",
                                'method': 'POST',
                                'style': 'display: none;'
                            }).append(
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}">')
                            .appendTo('body')
                            .submit();
                    });
                }
            });
        });
    </script>
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-between">
            <div class="contact-info d-flex align-items-center">
                <i>
                    @auth
                        <p class="mt-3" id="welcome-message" style="cursor: pointer;">Selamat datang,
                            {{ auth()->user()->name }}! (Klik untuk logout)</p>
                    @endauth
                </i>
            </div>
            <div class="d-none d-lg-flex social-links align-items-center">
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            {{-- <h1 class="logo me-auto"><a href="index.html">Dr Brokoli</a></h1> --}}
            <img class="logo me-auto" src="landing/img/logo-es.png" alt="Logo" style="width: 215px; height: 55px;">
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#">Home</a></li>
                    <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/form-faq">Putusan</a></li>
                            <li><a href="/identifikasi">Identifikasi</a></li>
                            <li><a href="/pasal">Pasal</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->


    <main id="main">
        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container">

                <div class="section-title" style="margin-top: 80px">
                    <h2>Frequently Asked Questions</h2>
                    <p>Berikut adalah Pertanyaan yang Sering Diajukan oleh User</p>
                </div>

                <div class="faq-list">
                    <ul>
                        <li data-aos="fade-up">
                            <i class="bx bx-help-circle icon-help"></i>
                            <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apa saja
                                langkah-langkah yang harus saya ikuti untuk menggunakan Sistem Pakar ini?
                                <i class="bx bx-chevron-down icon-show">
                                </i>
                                <i class="bx bx-chevron-up icon-close">
                                </i>
                            </a>
                            <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                                <p>
                                    Anda dapat memulai dengan memasukkan informasi terkait identifikasi kecelakaan lalu
                                    lintas, dengan menekan button Isi Form dan
                                    sistem akan memberikan identifikasi pasal hukum yang mengacu pada tindak pidana.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i>
                            <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Bagaimana
                                keakuratan identifikasi pasal hukumnya?
                                <i class="bx bx-chevron-down icon-show"></i>
                                <i class="bx bx-chevron-up icon-close">
                                </i>
                            </a>
                            <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Keakuratan sistem dapat diverifikasi melalui pengujian dan validasi sebelumnya oleh
                                    developer. Tingkat Kepercayaan sistem terhadap hasil identifikasi dapat diandalkan
                                    karena sumber pengetahuan data diperoleh melalui seorang pakar yang berprofesi
                                    sebagai Hakim.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="200">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-3" class="collapsed">Apakah Sistem Pakar ini memberikan
                                informasi hukum tindak pidana kecelakaan lalu lintas yang terkini?<i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Ya, sistem ini dirancang untuk memberikan informasi hukum yang terkini dan dapat
                                    diperbarui secara real-time sesuai dengan perkembangan Undang-Undang No 22 Tahun
                                    2009 Tentang Lalu Lintas dan Angkutan Jalan di Negara Indonesia.
                                </p>
                            </div>
                        </li>

                        <li data-aos="fade-up" data-aos-delay="300">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-4" class="collapsed">Apa yang harus dilakukan jika saya
                                memiliki pertanyaan tambahan atau butuh bantuan lebih lanjut? <i
                                    class="bx bx-chevron-down icon-show"></i><i
                                    class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                                <p>
                                    Anda dapat menambahkan pertanyaan yang dibutuhkan dengan menekan tombol navigasi ->
                                    Identifikasi. Tetapi ingat pada tahapan ini anda harus login sebagai administrator
                                    terlebih dahulu.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="container d-flex align-items-end flex-column">
                        <a href="/form" class="appointment-btn scrollto d-flex align-items-center"
                            style="height: 50px"><span class="d-none d-md-inline">Next</a>
                    </div>
                </div>
            </div>
        </section><!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Sistem Pakar Tindak Pidana Kecelakaan Lalu Lintas</h3>
                        <p>
                            Jalan Ir. Sutami 36 Kentingan, Jebres, Surakarta, Jawa Tengah. Indonesia <br><br>
                            <strong>Phone:</strong> 0271-646994<br>
                            <strong>WhatsApp</strong> (+62) 851 5672 3341.<br>
                            <strong>Email:</strong> campus@mail.uns.ac.id<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bi bi-code-slash"></i>&nbsp; Web Design</li>
                            <li><i class="bi bi-code-slash"></i>&nbsp; Web Development</li>
                            <li><i class="bi bi-bag-heart"></i>&nbsp; Product Management</li>
                            <li><i class="bi bi-shop"></i>&nbsp; Marketing</li>
                            <li><i class="bi bi-eraser"></i>&nbsp; Graphic Design></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Berlangganan untuk dapatkan berita terkini</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Sistem Pakar Tindak Pidana Kecelakaan Lalu Lintas</span></strong>.
                    All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="">Fawwaz Ivandra - Program Studi Informatika - Universitas Sebelas
                        Maret</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="landing/js/purecounter/purecounter_vanilla.js"></script>
    <script src="landing/js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="landing/js/glightbox/js/glightbox.min.js"></script>
    <script src="landing/js/swiper/swiper-bundle.min.js"></script>
    <script src="landing/js/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="landing/js/main/main.js"></script>

</body>

</html>
