<div class="pagetitle">
      <h1>Data Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
          <li class="breadcrumb-item active"><a href="index.php?page=transaksi">Data Transaksi</a></li>
      
    <?php
    $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    switch ($aksi) {

        case 'list':
            include 'koneksi.php';
            ?>

                                    <section class="section dashboard">
                                      <div class="row">

      

                                        <!-- Left side columns -->
                                        <div class="col-lg-12 mt-3">
                                          <div class="row">
          
        

                                            <!-- Top Selling -->
                                            <div class="col-12">
                                                <div class="card top-selling overflow-auto">
  
                                                  <div class="btn text-start  mt-2">
                                                      <!-- Button trigger modal -->
                                                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                      <span class="badge bg-white text-black me-2">+</span>Tambah Peminjaman
                                                      </button>

                                                  </div>
                  

                                                  <!-- Modal -->
                                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Data Peminjaman</h5>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <form class="form" action="proses_transaksi.php?proses=insert" method="post" enctype="multipart/form-data">
                                                                <div class="row mb-3">
                                                                    <label for="inputNumber" class="col-sm-4 col-form-label">Nip/Nim</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="nim" id="nim">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="inputNumber" class="col-sm-4 col-form-label">Kode Buku</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" name="kode_buku" id="kode_buku">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="inputDate" class="col-sm-4 col-form-label">Tanggal Peminjaman</label>
                                                                    <div class="col-sm-5">
                                                                        <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" required>
                                                                    </div>
                                                                </div>

                                                

                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <button type="submit" class="btn btn-primary">Pinjam</button>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                        </div>
                        
                                                      </div>
                                                    </div>
                                                  </div>
                        

                                                  <div class="card-body pb-0">
                                                    <h5 class="card-title">Buku Yang Dipinjam</h5>
  
                                                    <table class="table table-borderless datatable">

      
                                    <thead>
                                        <tr>
                                            <th scope="col">Kode Buku</th>
                                   
                                            <th scope="col">Judul</th>
                                            <th scope="col">Nip/Nim</th>
                                            <th scope="col">Nama Peminjam</th>
                                            <th scope="col">Tanggal Peminjaman</th>
                                            <th scope="col">Tanggal Pengembalian</th>
                                            <th scope="col">Level</th>
                                            <th scope="col">Status</th>
                                    
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- isi Tabel -->
                                        <?php
                                        require 'koneksi.php';

                                        $query = "SELECT * FROM pinjaman INNER JOIN buku ON pinjaman.kode_buku = buku.kode_buku";
                                        $result = $db->query($query);

                                        if ($result) {
                                            while ($row = $result->fetch_assoc()):
                                                ?>
                                                                                <tr>
                                                                                    <td><?= $row['kode_buku'] ?></td>
                                                                   
                                                                                    <td><?= $row['judul_buku'] ?></td>
                                                                                    <td><?= $row['nim'] ?></td>
                                                                                    <td><?= $row['nama'] ?></td>
                                                                                    <td><?= $row['tgl_pinjam'] ?></td>
                                                                                    <td><?= $row['tgl_kembali'] ?></td>
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
           
                                                                                    <td><?= $row['status'] ?>
                                                                                    <?php
                                                                                    $tgl_kembali = $row['tgl_kembali'];
                                                                                    $tgl_sekarang = date("Y-m-d");

                                                                                    // Jika tanggal sekarang melebihi tanggal kembali, hitung denda
                                                                                    if ($tgl_sekarang > $tgl_kembali) {
                                                                                        $selisih_hari = strtotime($tgl_sekarang) - strtotime($tgl_kembali);
                                                                                        $selisih_hari = floor($selisih_hari / (60 * 60 * 24));

                                                                                        echo '<small class="text-danger">Terlambat ' . $selisih_hari . ' hari.' . '</small>';
                                                                                    } else {


                                                                                    }
                                                                                    ?>
                    
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="btn">

                          

                                                                                            <a href="proses_transaksi.php?proses=perpanjang&id_pinjam=<?= $row['id_pinjam'] ?>" class="badge bg-success text-light">Perpanjang</a>


                                                                                            <!--Modal Kembali-->
                                                                                            <button type="button" class="btn badge bg-danger text-light" data-bs-toggle="modal" data-bs-target="#KembaliModal<?= $row['id_pinjam'] ?>">
                                                                                                Kembali
                                                                                            </button>

                                                                                            <div class="modal fade" id="KembaliModal<?= $row['id_pinjam'] ?>" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pengembalian Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Isi Content Kembali -->
                                <form class="form text-start" action="proses_transaksi.php?proses=kembali" method="post">

                                    <!-- Tambahkan input hidden untuk id_pinjam -->
                                    <input type="hidden" name="id_pinjam" value="<?= $row['id_pinjam'] ?>">
                                    <input type="hidden" name="denda" value="<?= $total_denda ?>">

                                    <div class="row">
                                        <div class="col">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-6 col-form-label">Nim/Nip</label>
                                                <div class="col-6">
                                                    <input type="text" name="nim" class="form-control" value="<?= $row['nim'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-6 col-form-label">Nama Peminjam</label>
                                                <div class="col-6">
                                                    <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-6 col-form-label">Tanggal Peminjaman</label>
                                                <div class="col-6">
                                                    <input type="text" name="tgl_pinjam" class="form-control" value="<?= $row['tgl_pinjam'] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-6 col-form-label">Tanggal Pengembalian</label>
                                                <div class="col-6">
                                                    <input type="text" name="tgl_kembali" class="form-control" value="<?= $row['tgl_kembali'] ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-4 col-form-label">Kode Buku</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="kode_buku" class="form-control" value="<?= $row['kode_buku'] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-4 col-form-label">Judul Buku</label>
                                                <div class="col-8">
                                                    <input type="text" name="judul_buku" class="form-control" value="<?= $row['judul_buku'] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-8">
                                                    <input type="text" name="kategori" class="form-control" value="<?= $row['kategori'] ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                    <label for="inputDecimal" class="col-sm-4 col-form-label">Denda</label>
                    <div class="col-8">
                        <?php
                        // Mendefinisikan variabel
                        $total_denda = 0;
                        $selisih_hari = 0;

                        $tgl_kembali = $row['tgl_kembali'];
                        $tgl_sekarang = date("Y-m-d");

                        // proses perhitungan
                        if ($tgl_sekarang > $tgl_kembali) {
                            $selisih_hari = strtotime($tgl_sekarang) - strtotime($tgl_kembali);
                            $selisih_hari = floor($selisih_hari / (60 * 60 * 24));

                            // Denda perhari
                            $denda_perhari = 1000;

                            //total denda
                            $total_denda = $selisih_hari * $denda_perhari;

                            // Menampilkan total denda di form 
                            echo '<input type="text" name="denda" class="form-control" value="Rp ' . number_format($total_denda) . '" readonly>';

                            // menampilkan jumlah hari telat
                            echo '<small class="text-danger">Terlambat ' . $selisih_hari . ' hari.' . '</small>';
                        } else {
                            //default denda = 0
                            echo '<input type="text" name="denda" class="form-control" value="0" readonly>';

                            // keterangan tidak ada denda
                            echo '<small class="text-success">Tidak ada denda.</small>';
                        }
                        ?>
                        <input type="hidden" name="total_denda" value="<?= $total_denda ?>">
                    </div>
                </div>


                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="kembali" value="kembali" class="btn btn-danger">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Akhir Modal Kembali-->
                                                                                            <!-- <a href="?page=transaksi&aksi=kembali&id_pinjam=<?= $row['id_pinjam'] ?>" class="badge bg-danger text-light">Kembali</a> -->


                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                        <?php
                                            endwhile;
                                        } else {
                                            echo "Query error: " . $db->error;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                    </tbody>
                                </table>

  
                                                  </div>
  
                                                </div>
                                              </div><!-- End Top Selling -->

                                          </div>


                                        </div><!-- End Left side columns -->

                                        <!-- Right side columns -->
                                <!-- End Right side columns -->



                                      </div>
                                    </section>
    
   
                                    <?php
                                    break;

        case 'kembali':
            include 'koneksi.php';
            $id_pinjam = $_GET['id_pinjam'];
            $nama = isset($_GET['nama']) ? $_GET['nama'] : '';


            $query = "SELECT * FROM pinjaman WHERE id_pinjam = '$id_pinjam'";
            $result = $db->query($query);

            if (!$result) {
                die("Error in query execution: " . $db->error);
            }

            // Check if data is found
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
            }

            ?>

      

      
                                      <div class="col-lg-12">
                                          <div class="row">
                                              <section class="section">
                                                  <div class="row">
                                                      <div class="col-lg-18">
      
                                                          <div class="card">
                                                              <div class="card-body">
                                                                  <h5 class="card-title">Pengembalian</h5>
      
                                                                  <!-- General Form Elements -->
                                                            <form class="form" action="proses_transaksi.php?proses=kembali" method="post" enctype="multipart/form-data">
                                                                  <input type="hidden" name="id_pinjam" value="<?php echo $id_pinjam; ?>">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="row mb-3">
                                                                                <label for="inputText" class="col-sm-6 col-form-label">Nim/Nip</label>
                                                                                      <div class="col-6">
                                                                                    <input type="text" name="nim" class="form-control" value="<?= $row['nim'] ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mb-3">
                                                                                <label for="inputText" class="col-sm-6 col-form-label">Nama Peminjam</label>
                                                                                <div class="col-6">
                                                                                    <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="inputText" class="col-sm-6 col-form-label">Tanggal Peminjaman</label>
                                                                                <div class="col-6">
                                                                                    <input type="text" name="nama" class="form-control" value="<?= $row['tgl_pinjam'] ?>" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="inputText" class="col-sm-6 col-form-label">Tanggal Pengembalian</label>
                                                                                <div class="col-6">
                                                                                    <input type="text" name="nama" class="form-control" value="<?= $row['tgl_kembali'] ?>" readonly>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="row mb-3">
                                                                                <label for="inputText" class="col-sm-3 col-form-label">Kode Buku</label>
                                                                                <div class="col-sm-8">
                                                                                    <input type="text" name="kode_buku" class="form-control" value="<?= $row['kode_buku'] ?>" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="inputText" class="col-sm-3 col-form-label">Judul Buku</label>
                                                                                <div class="col-8">
                                                                                    <input type="text" name="judul_buku" class="form-control" value="<?= $row['judul_buku'] ?>" readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="inputText" class="col-sm-3 col-form-label">Kategori</label>
                                                                                <div class="col-8">
                                                                                    <input type="text" name="kategori" class="form-control" value="<?= $row['kategori'] ?>"  readonly>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="inputDecimal" class="col-sm-3 col-form-label">Denda</label>
                                                                                <div class="col-8">
                                                                                    <?php
                                                                                    // Mendefinisikan variabel
                                                                                    $total_denda = 0;
                                                                                    $selisih_hari = 0;

                                                                                    $tgl_kembali = $row['tgl_kembali'];
                                                                                    $tgl_sekarang = date("Y-m-d");

                                                                                    // proses perhitungan
                                                                                    if ($tgl_sekarang > $tgl_kembali) {
                                                                                        $selisih_hari = strtotime($tgl_sekarang) - strtotime($tgl_kembali);
                                                                                        $selisih_hari = floor($selisih_hari / (60 * 60 * 24));

                                                                                        // Denda perhari
                                                                                        $denda_perhari = 1000;

                                                                                        //total denda
                                                                                        $total_denda = $selisih_hari * $denda_perhari;

                                                                                        // Menampilkan total denda di form 
                                                                                        echo '<input type="text" name="denda" class="form-control" value="Rp ' . number_format($total_denda) . '" readonly>';

                                                                                        // menampilkan jumlah hari telat
                                                                                        echo '<small class="text-danger">Terlambat ' . $selisih_hari . ' hari.' . '</small>';
                                                                                    } else {
                                                                                        //default denda = 0
                                                                                        echo '<input type="text" name="denda" class="form-control" value="0" readonly>';

                                                                                        // keterangan tidak ada denda
                                                                                        echo '<small class="text-success">Tidak ada denda.</small>';
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                </div>
                                                                              <div class="row mb-3 text-start">
                                                                                <div class="col-sm-10">
                                                                                    <button type="submit" name="submit" class="btn btn-danger">Kembali</button>
                                                                                </div>
                                                                            </div>
                                          
                                          
                                                                        </div>
                                      
                                                                    </div>
                                
                                                            </form>
                                                                  <!-- End General Form Elements -->
                                 
                                                              </div>
                                                          </div>
      
                                                      </div>
                                                  </div><!-- End Recent Sales -->
      
                                              </div>
                                          </div><!-- End Left side columns -->
      
                                      </div>
                                      </section>
      


      
                                <?php
                                break;

    }
    ?>