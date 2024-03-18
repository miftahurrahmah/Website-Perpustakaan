<!doctype html>
<html lang="en">
  
  <head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <!--Custom CSS-->
    <link rel="stylesheet" href="style2.css">
    
    
    <title>PROJECT KELOMPOK_5</title>
    <link rel="icon" href="assets/img/favicon.png">
  </head>
  <body>




<!-- Header -->

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <img src="assets/img/logoo2.png" alt="" style="width: 80px; height: auto;">
            <a class="navbar-brand fw-bold"><strong>PERPUSTAKAAN</strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item mx-3">
                <a class="nav-link active" aria-current="page" href="?page=beranda">Beranda</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="#Pengumuman">Pengumuman</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="?page=librarian">Librarian</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="?page=BukuTamu">Buku Tamu</a>
              </li>
              
            </ul>
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    <!--Navbar End-->

    <!--Carousel Start-->
    <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <!-- Slides with fade transition -->
              <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="assets/img/library1.jpg" class="d-block w-100 " alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/library2.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/library3.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="assets/img/library4.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>

                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>


                <div class="container mt-1">
                  <?php
                  $p = isset($_GET['page']) ? $_GET['page'] : '';
                  if ($p == 'beranda') {
                      include 'beranda.php';
                  }

                  if ($p == 'librarian') {
                      include 'librarian.php';
                  }
                  if ($p == 'BukuTamu') {
                      include 'bukutamu.php';
                  }
                  
                  ?>
                  </div>
                
               

        
    
      

        <!--Footer-->
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-black text-white pt-4 mt-5">
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
          <div class="col-md-3">
            <h6 class="text-uppercase fw-bold mb-4">
              <img src="assets/img/TI.jpg" alt="" style="width: 200px; height: auto;">
            </h6>
            <p>
              Moto : Berakhlak Mulia, Berpikir Akademis, Bertindak Profesional.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="?page=beranda" class="text-reset">Beranda</a>
            </p>
            <p>
              <a href="#Pengumuman" class="text-reset">Pengumuman</a>
            </p>
            <p>
              <a href="?page=librarian" class="text-reset">Librarian</a>
            </p>
          </div>
          <!-- Grid column -->



          <!-- Grid column -->
          <div class="col-md-3">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fa fa-home me-3"></i> Kampus Politeknik Negeri Padang Limau Manis Kecamatan Pauh Kota Padang
              25164
              Provinsi Sumatera Barat</p>
            <p>
              <i class="fa fa-envelope me-3"></i>
              info@pnp.ac.id
            </p>
            <p><i class="fa fa-phone me-3"></i> 0751 72590</p>


          </div>

          <!-- Grid column -->
          <div class="col-md-2">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.310043240093!2d100.46357607472395!3d-0.9145678990765886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b7be9e52a171%3A0x609ef1cc57a38e32!2sPoliteknik%20Negeri%20Padang!5e0!3m2!1sid!2sid!4v1702861474061!5m2!1sid!2sid"
              width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- ======= Footer ======= -->
    <!-- Copyright -->
    <div class="text-center p-4">
      © 2023 UAS |
      <a class="text-reset fw-bold" >KELOMPOK_5</a>
    </div>
    <!-- Copyright -->
    <!-- End Footer -->
</footer>
<!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>