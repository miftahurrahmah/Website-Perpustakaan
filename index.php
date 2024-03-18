<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['login'])) {
  header("Location: home.php?page=beranda");
  exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - KELOMPOK_5</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/tekinfo.png">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a class="logo d-flex align-items-center">

        <img src="../assets/img/PNP.jpg" alt="" style="width: 100px; height: auto;">
        <span class="d-none d-lg-block">PERPUSTAKAAN</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="proses_search.php">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    <span class="bx bx-user"></span>
    <span class="d-none d-md-block dropdown-toggle ps-2">

   
  
    </span>
</a>


          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
 

            </li>

            <li>
              <a class="dropdown-item d-flex justify-content-center" href="home.php?page=beranda" data-toggle="modal"
                data-target="#logoutModal">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>





          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->




  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="?page=dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="?page=member" data-bs-toggle="collapse" data-bs-target="#MemberDropdown"
          aria-expanded="false">
          <i class="bi bi-people-fill"></i>
          <span>Members</span>
        </a>
        <div class="collapse" id="MemberDropdown">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?page=member">Data Member</a>
            </li>
            <?php
            if ($_SESSION['level'] == 'admin') {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=prodi">Data Prodi</a>
              </li>
              <?php
            }
            ?>

          </ul>
        </div>
      </li>

      <!-- End Components Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="?page=buku" data-bs-toggle="collapse" data-bs-target="#BukuDropdown"
          aria-expanded="false">
          <i class="bi bi-book"></i>
          <span>Buku</span>
        </a>
        <div class="collapse" id="BukuDropdown">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?page=buku">Data Buku</a>
            </li>
            <?php
            if ($_SESSION['level'] == 'admin') {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=kategori">Data Kategori</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=penulis">Data Penulis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=penerbit">Data Penerbit</a>
              </li>
              <?php
            }
            ?>



          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="?page=kunjungan">
          <i class="bx bx-home"></i>
          <span>Data Kunjungan</span>
        </a>
      </li>

      <?php
      if ($_SESSION['level'] == 'pustakawan') {
        ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="?page=transaksi">
            <i class="bi bi-folder"></i>
            <span>Transaksi Peminjaman</span>
          </a>
        </li>
        <?php
      }
      ?>


      <li class="nav-item">
        <a class="nav-link collapsed" href="?page=riwayat">
          <i class="bi bi-box"></i>
          <span>Riwayat Transaksi</span>
        </a>
      </li>




      <!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <!-- End Page Title -->

    <div class="container mt-1">
      <?php
      $p = isset($_GET['page']) ? $_GET['page'] : '';
      if ($p == 'dashboard') {
        include 'dashboard.php';
      }

      if ($p == 'member') {
        include 'member.php';
      }
      if ($p == 'transaksi') {
        include 'transaksi.php';
      }
      if ($p == 'buku') {
        include 'buku.php';
      }
      if ($p == 'penulis') {
        include 'penulis.php';
      }

      if ($p == 'penerbit') {
        include 'penerbit.php';
      }


      if ($p == 'pinjam') {
        include 'pinjam.php';
      }
      if ($p == 'pengembalian') {
        include 'pengembalian.php';
      }
      if ($p == 'riwayat') {
        include 'riwayat.php';
      }
      if ($p == 'prodi') {
        include 'prodi.php';
      }
      if ($p == 'kategori') {
        include 'kategori.php';
      }
      if ($p == 'kunjungan') {
        include 'kunjungan.php';
      }

      ?>
    </div>


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- Copyright -->
  <div class="text-center p-4">
    © 2023 UAS |
    <a class="text-reset fw-bold" href="">KELOMPOK_5</a>
  </div>
  <!-- Copyright -->
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>