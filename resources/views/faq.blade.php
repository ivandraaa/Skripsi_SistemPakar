<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dr.Brokoli Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <!-- =======================================================
  * Template Name: Medilab
  * Updated: Jun 23 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:contact@example.com">drbrokoli@gmail.com</a>
        <i class="bi bi-phone"></i> +62 558 55488 1255
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
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
      <img class="logo me-auto" src="landing/img/logo-dr-brokoli.png" alt="Logo" style="width: 215px; height: 55px;">
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="/dashboard">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto active" href="#faq">FAQ</a></li>
          <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/form-faq">Diagnosa</a></li>
              <li><a href="/identifikasi">Identifikasi</a></li>
              <li><a href="/pasal">Pasal</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#about">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="/login" class="appointment-btn scrollto"><span class="d-none d-md-inline">Log</span> In</a>

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
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apa itu DR.BROKOLI? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                    DR.BROKOLI adalah aplikasi sistem pakar yang dirancang untuk membantu petani 
                    dalam mendiagnosis dan merawat kesehatan tanaman brokoli.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Bagaimana DR.BROKOLI dapat membantu dalam mendiagnosis kesehatan tanaman brokoli? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                    DR.BROKOLI menggunakan kecerdasan buatan dan sistem pakar untuk menganalisis data
                    yang Anda berikan tentang tanaman brokoli Anda. Berdasarkan informasi tersebut, 
                    aplikasi akan memberikan diagnosis dan rekomendasi untuk merawat tanaman brokoli secara efektif.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Apakah aplikasi DR.BROKOLI dapat memberikan informasi lebih lanjut mengenai perawatan tanaman brokoli? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Ya, selain memberikan diagnosis dan rekomendasi, aplikasi DR.BROKOLI juga menyediakan informasi 
                    dan sumber daya berguna mengenai perawatan tanaman brokoli. Anda dapat menemukan panduan, tips, 
                    dan praktik terbaik untuk merawat tanaman brokoli dengan baik.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300" style="margin-bottom: 30px">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Bagaimana jika saya memiliki pertanyaan atau masalah yang tidak tercakup di DR.BROKOLI? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Jika Anda memiliki pertanyaan atau masalah yang tidak tercakup di DR.BROKOLI, silakan hubungi tim kami 
                    melalui halaman "Kontak Kami" di website kami. Kami akan dengan senang hati membantu 
                    Anda dengan pertanyaan atau masalah yang Anda hadapi.
                </p>
              </div>
            </li>
			<div class="container d-flex align-items-end flex-column">
				<a href="/form" class="appointment-btn scrollto d-flex align-items-center" style="height: 50px" ><span class="d-none d-md-inline">Next</a>
			</div>
          </ul>  
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
            <h3>Dr.Brokoli</h3>
            <p>
              Jl. Ir. Soepomo No 24 <br>
              Surakarta, SOC 535022<br>
              Indonesia <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> drbrokoli@gmail.com<br>
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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
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
          &copy; Copyright <strong><span>Dr.Brokoli</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Kelompok 12</a>
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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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