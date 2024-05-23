<div class="pagetitle">
  <h1>Riwayat Transaksi</h1>
  <nav?>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
      <li class="breadcrumb-item active"><a href="index.php?page=riwayat">Riwayat Transaksi</a></li>
    

<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
  case 'list':
    include 'koneksi.php';
?>

<div class="row">
<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-12 mt-3">
      <div class="row">
        <!-- Top Selling -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">
            <div class="card-body pb-0">
              <h5 class="card-title">Riwayat Transaksi</h5>

              <table class="table table-borderless datatable">
              <a  href="cetak_laporan_riwayat.php" class="btn btn-primary text-light ms-2"><span
                  class="bx bx-printer"></a>
                <thead>
                  <tr>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Nip/Nim</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Level</th>
                    <th scope="col">Status</th>
                    <th scope="col">Denda</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <!-- isi Tabel -->
                  <?php
                  require 'koneksi.php';
                  $query = "SELECT * FROM riwayat";
                  $result = $db->query($query);
                  $nomor = 1;
                  foreach ($result as $row) :
                  ?>
                    <tr>
                      <td><?= $row['kode_buku'] ?></td>
                      <td><?= $row['judul_buku'] ?></td>
                      <td><?= $row['nim'] ?></td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['tgl_kembali'] ?></td>
                      <td class="border-bottom-0 justify-content-center">
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
                      <td><?= $row['status'] ?></td>
                      <td><?= 'Rp. ' . number_format($row['denda'], 0, ',', '.') ?></td>
                      
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div><!-- End Top Selling -->
      </div>
    </div><!-- End Left side columns -->
  </div>
</section>
<?php
    break;

  // Tambahkan case lain jika ada

  default:
    // Tindakan default jika tidak sesuai case
    break;
}

?>

</div>
