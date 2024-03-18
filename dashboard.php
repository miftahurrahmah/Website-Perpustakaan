<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    
<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Kunjungan <span>| Hari Ini</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-contacts-fill"></i>
                </div>
                <div class="ps-3">
                  <?php
                  include 'koneksi.php';
                  date_default_timezone_set('Asia/Jakarta');

                  // Mendapatkan tanggal hari ini
                  $today = date('Y-m-d');

                  // Mengecek apakah data kunjungan untuk tanggal hari ini sudah ada atau belum
                  $queryCheck = "SELECT COUNT(*) AS total_kunjungan FROM kunjungan WHERE tanggal = '$today'";
                  $resultCheck = mysqli_query($db, $queryCheck);

                  if ($resultCheck) {
                    $rowCheck = mysqli_fetch_assoc($resultCheck);
                    $totalKunjunganHariIni = $rowCheck['total_kunjungan'];

                    if ($totalKunjunganHariIni > 0) {
                      // Jika data kunjungan untuk tanggal hari ini sudah ada, tampilkan jumlah kunjungan
                      echo '<h6> ' . $totalKunjunganHariIni . '</h6>';
                    } else {
                      // Jika data kunjungan untuk tanggal hari ini belum ada, tambahkan data baru
                      $queryInsert = "INSERT INTO kunjungan (tanggal, total_kunjungan) VALUES ('$today', 0)";

                      if (mysqli_query($db, $queryInsert)) {
                        // Jika penambahan data berhasil, tampilkan jumlah kunjungan (yang sudah termasuk data baru)
                        echo '<h6>0</h6>';
                      } else {
                        // Jika ada kesalahan saat menambahkan data, tampilkan pesan error
                        echo 'Error: ' . mysqli_error($db);
                      }
                    }

                    mysqli_free_result($resultCheck);
                  } else {
                    // Jika ada kesalahan saat menjalankan query, tampilkan pesan error
                    echo 'Error: ' . mysqli_error($db);
                  }

                  ?>
                  <span class="text-success small pt-1 fw-bold">
                  <?php
                    // Mengatur zona waktu ke zona waktu yang diinginkan
                    date_default_timezone_set('Asia/Jakarta');

                    // Mendapatkan tanggal hari ini
                    $today = date('l, j M Y');

                    // Menampilkan tanggal hari ini dalam format yang diinginkan
                    echo $today;
                    ?>
                  </span>


                </div>
              </div>
            </div>


          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Buku</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-book"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?php
                    include 'koneksi.php';

                    // Query untuk mengambil jumlah total kunjungan di tabel 'kunjungan'
                    $query = "SELECT COUNT(*) AS total_buku FROM buku";
                    $stmtSelect = $db->prepare($query);

                    // Memeriksa hasil query
                    if ($stmtSelect->execute()) {
                      // Mengambil hasil query
                      $result = $stmtSelect->get_result();
                      $row = $result->fetch_assoc();

                      // Menampilkan jumlah total kunjungan
                      $total_buku = $row['total_buku'];

                      echo '<h6> ' . $total_buku . '</h6>';
                    } else {
                      echo 'Error: ' . $stmtSelect->error;
                    }
                    ?>
                  </h6>
                  <span class="text-success small pt-1 fw-bold">
                    <?php
                    // Mengatur zona waktu ke zona waktu yang diinginkan
                    date_default_timezone_set('Asia/Jakarta');

                    // Mendapatkan tanggal hari ini
                    $today = date('l, j M Y');

                    // Menampilkan tanggal hari ini dalam format yang diinginkan
                    echo $today;
                    ?>

                  </span>



                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="card-body">
              <h5 class="card-title">Member</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>
                    <?php
                    include 'koneksi.php';

                    // Query untuk mengambil jumlah total kunjungan di tabel 'kunjungan'
                    $query = "SELECT COUNT(*) AS total_member FROM member";
                    $stmtSelect = $db->prepare($query);

                    // Memeriksa hasil query
                    if ($stmtSelect->execute()) {
                      // Mengambil hasil query
                      $result = $stmtSelect->get_result();
                      $row = $result->fetch_assoc();

                      // Menampilkan jumlah total kunjungan
                      $total_member = $row['total_member'];

                      echo '<h6> ' . $total_member . '</h6>';
                    } else {
                      echo 'Error: ' . $stmtSelect->error;
                    }
                    ?>
                  </h6>
                  <span class="text-success small pt-1 fw-bold">
                    <?php
                    // Mengatur zona waktu ke zona waktu yang diinginkan
                    date_default_timezone_set('Asia/Jakarta');

                    // Mendapatkan tanggal hari ini
                    $today = date('l, j M Y');

                    // Menampilkan tanggal hari ini dalam format yang diinginkan
                    echo $today;
                    ?>

                  </span>



                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->

        <!-- <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Grafik Kunjungan</h5>

              

              <Bar Chart 
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
                      datasets: [{
                        label: 'Bar Chart',
                        data: [65, 59, 80, 81, 56, 55],
                        backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
            

            </div>
          </div>
        </div>-->

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Data Kunjungan<span> | Hari Ini</span></h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Level</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require 'koneksi.php';

                  // Query untuk mengambil data kunjungan hari ini
                  $query = "SELECT * FROM kunjungan WHERE DATE(tanggal) = CURDATE()";
                  $result = $db->query($query);

                  $nomor = 1;
                  foreach ($result as $row): ?>
                    <tr>
                      <td>
                        <?= $row['nim'] ?>
                      </td>
                      <td>
                        <?= $row['nama'] ?>
                      </td>
                      <td>
                        <?= $row['prodi'] ?>
                      </td>
                      <td class="border-bottom-0">
                                                <div class="d-flex justify-content-center gap-2 fs-6">
                                                    <?php
                                                    $level = $row['level'];
                                                    $badgeClass = '';

                                                    // Array yang memetakan nilai type ke kelas warna
                                                    $colorMapping = [
                                                        'Staff' => 'bg-success',
                                                        'Mahasiswa' => 'bg-primary',
                                                        'Dosen' => 'bg-danger',
                                                    ];
                                                    // Cek apakah type ada dalam mapping, jika tidak, gunakan warna default
                                                    $badgeClass = isset($colorMapping[$level]) ? $colorMapping[$level] : 'bg-secondary';
                                                    ?>
                                                    <span class="badge <?= $badgeClass ?> rounded-3 fw-semibold"><?= $level ?></span>
                                                </div>
                                            </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>

            </div>
          </div>
        </div><!-- End Recent Sales -->

      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <!-- News & Updates Traffic -->
      <div class="card">
        <?php
        include 'koneksi.php';

        // Ambil data buku dari database hanya 5 buku terbaru
        $query = "SELECT * FROM buku ORDER BY id DESC LIMIT 3";
        $result = $db->query($query);

        ?>

        <div class="card-body pb-0">
          <h5 class="card-title">Buku Terbaru <span>| Hari Ini</span></h5>

          <div class="news">
            <?php

            while ($row = $result->fetch_assoc()) {
              echo '<div class="post-item clearfix">';

              // Menampilkan foto
              if (!empty($row['foto'])) {
                $foto_path = "berkas/" . $row['foto'];
                echo '<img src="' . $foto_path . '" alt="Book Cover">';
              } else {
                echo 'Foto tidak tersedia';
              }

              echo '<h4><a href="?page=buku&aksi=detail&id=' . $row['id'] . '">' . $row['judul_buku'] . '</a></h4>';
              // Membatasi panjang sinopsis menjadi 100 huruf
              $sinopsis = (strlen($row['sinopsis']) > 50) ? substr($row['sinopsis'], 0, 100) . '...' : $row['sinopsis'];

              echo '<p>' . $sinopsis . '</p>';
              echo '</div>';
              
            }

            ?>
          </div><!-- End sidebar recent posts-->
        </div>

      </div><!-- End News & Updates -->

    </div><!-- End Right side columns -->

  </div>
</section>