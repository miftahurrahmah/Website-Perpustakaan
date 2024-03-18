
<div class="pagetitle">
    <h1>Books</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=buku">Buku</a></li>


            <?php
            $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
            switch ($aksi) {
                case 'insert':
                    ?>
                    <li class="breadcrumb-item active">Tambah Buku</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



        </div>
        </section>


        <?php
        break;

                case 'list':
                    include 'koneksi.php';
                    ?>

        <!-- Recent Sales -->
        <div class="col-12  mt-3">
            <div class="card recent-sales overflow-auto">

                <div class="card-body">
                    <h5 class="card-title">Data Buku</h5>

                    <table class="table table-borderless datatable">

                        <?php
                        if ($_SESSION['level'] == 'admin') {
                            ?>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span class="badge bg-white text-dark me-2">+</span>Tambah Buku
                            </button>

                            <a  href="cetak_laporan_buku.php" class="btn btn-primary text-light ms-2"><span
                  class="bx bx-printer"></a>
                            
                            <?php
                        }
                        ?>
                        <!-- Button trigger modal -->



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Buku</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- General Form Elements -->
                                        <form class="form" action="proses_book.php?proses=insert" method="post"
                                            enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-3 col-form-label">ISBN</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kode_buku" id="kode_buku">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputNumber" class="col-sm-3 col-form-label">Sampul</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="file" id="foto" name="foto">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-3 col-form-label">Judul Buku</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="judul_buku" id="judul_buku">
                                                </div>
                                            </div>

                                            <div class="row mb-3 mt-3">
                                                <label class="col-sm-3 col-form-label" for="kategori">Kategori</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="kategori" id="kategori">
                                                        <option>--Pilih Kategori--</option>
                                                        <?php
                                                        // Ambil data prodi dari member yang diedit (jika ada)
                                                        $kategori = isset($_GET['id']) ? $kategori : '';

                                                        // Query untuk mendapatkan data prodi dari tabel prodi
                                                        $query = "SELECT * FROM kategori";
                                                        $result = $db->query($query);

                                                        // Periksa apakah query berhasil
                                                        if (!$result) {
                                                            die("Error in query: " . $db->error);
                                                        }

                                                        // Tampilkan data prodi dalam dropdown
                                                        while ($row = $result->fetch_assoc()) {
                                                            // Pilih prodi yang sesuai dengan data member yang diedit
                                                            $selected = ($kategori == $row['nama_kategori']) ? 'selected' : '';
                                                            echo '<option value="' . $row['nama_kategori'] . '" ' . $selected . '>' . $row['nama_kategori'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="row mb-3 mt-3">
                                                <label class="col-sm-3 col-form-label" for="penulis">Penulis</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="penulis" id="penulis">
                                                        <option>--Pilih Penulis--</option>
                                                        <?php
                                                        // Query untuk mendapatkan data prodi dari tabel prodi
                                                        $query = "SELECT * FROM penulis";
                                                        $result = $db->query($query);

                                                        // Periksa apakah query berhasil
                                                        if (!$result) {
                                                            die("Error in query: " . $db->error);
                                                        }

                                                        // Ambil data prodi dari member yang diedit (jika ada)
                                                        $penulis = isset($_GET['id_penulis']) ? $penulis : '';

                                                        // Tampilkan data prodi dalam dropdown
                                                        while ($row = $result->fetch_assoc()) {
                                                            // Pilih prodi yang sesuai dengan data member yang diedit
                                                            $selected = ($penulis == $row['nama_penulis']) ? 'selected' : '';
                                                            echo '<option value="' . $row['nama_penulis'] . '" ' . $selected . '>' . $row['nama_penulis'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="row mb-3 mt-3">
                                                <label class="col-sm-3 col-form-label" for="penerbit">Penerbit</label>
                                                <div class="col-sm-8">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="penerbit" id="penerbit">
                                                        <option>--Pilih Penerbit--</option>
                                                        <?php
                                                        // Query untuk mendapatkan data prodi dari tabel prodi
                                                        $query = "SELECT * FROM penerbit";
                                                        $result = $db->query($query);

                                                        // Periksa apakah query berhasil
                                                        if (!$result) {
                                                            die("Error in query: " . $db->error);
                                                        }

                                                        // Ambil data prodi dari member yang diedit (jika ada)
                                                        $penerbit = isset($_GET['id']) ? $penerbit : '';

                                                        // Tampilkan data prodi dalam dropdown
                                                        while ($row = $result->fetch_assoc()) {
                                                            // Pilih prodi yang sesuai dengan data member yang diedit
                                                            $selected = ($penerbit == $row['penerbit']) ? 'selected' : '';
                                                            echo '<option value="' . $row['penerbit'] . '" ' . $selected . '>' . $row['penerbit'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="row mb-3">
                                                <label for="tahun_terbit" class="col-sm-3 col-form-label">Tahun Terbit</label>
                                                <div class="col-sm-5">
                                                    <select class="form-select" name="tahun_terbit" id="tahun_terbit" required>
                                                        <option value="tahun_terbit" selected>-- Pilih Tahun --</option>
                                                        <?php
                                                        // Mendapatkan tahun sekarang
                                                        $tahun_sekarang = date("Y");

                                                        // Loop untuk membuat opsi tahun dari 1980 hingga tahun sekarang
                                                        for ($tahun_terbit = 1980; $tahun_terbit <= $tahun_sekarang; $tahun_terbit++) {
                                                            echo '<option value="' . $tahun_terbit . '">' . $tahun_terbit . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputPassword" class="col-sm-3 col-form-label">Sinopsis</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="sinopsis" id="alamat"
                                                        style="height: 100px"></textarea>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="inputNumber" class="col-sm-3 col-form-label">Stok</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="stok" id="stok">
                                                </div>
                                            </div>

                                            <!-- <fieldset class="row mb-3">

                                                <div class="row mb-3">
                                                    <div class="col-sm-10">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </fieldset> -->

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="submit"
                                                    onclick="submitForm()">Submit</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>

                                    </div>
                                </div>

                                </form><!-- End General Form Elements -->
                            </div>

                        </div>
                </div>
            </div>
            <thead>
                <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">Sampul</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>


                </tr>
            </thead>
            <tbody>
                <?php
                // Perform the database query with proper table alias and join condition
                $query = "SELECT * FROM buku";
                $result = $db->query($query);

                // Check if the query was successful
                if (!$result) {
                    die("Error in query: " . $db->error);
                }
                // Check if $result is set before using foreach
                if ($result->num_rows > 0) {
                    $nomor = 1;
                    foreach ($result as $row):
                        ?>
                        <tr>
                            <td>
                                <?= $row['kode_buku'] ?>
                            </td>
                            <td>
                                <?php
                                if (!empty($row['foto'])) {
                                    $foto_path = "berkas/" . $row['foto'];

                                    // Ambil ukuran foto dalam piksel
                                    list($width, $height) = getimagesize($foto_path);

                                    // Tentukan lebar yang diinginkan dalam piksel (sesuaikan sesuai kebutuhan)
                                    $target_width = 100;

                                    // Hitung tinggi yang sesuai dengan rasio asli
                                    $target_height = floor(($height / $width) * $target_width);

                                    // Buat gambar baru dengan dimensi baru
                                    $image_resized = imagecreatetruecolor($target_width, $target_height);
                                    $image_original = imagecreatefromjpeg($foto_path);

                                    // Salin dan sesuaikan ukuran gambar
                                    imagecopyresampled($image_resized, $image_original, 0, 0, 0, 0, $target_width, $target_height, $width, $height);

                                    // Simpan gambar yang sudah disesuaikan ke direktori
                                    $resized_path = "berkas/resized_" . $row['foto'];
                                    imagejpeg($image_resized, $resized_path, 90);

                                    // Tampilkan foto dengan dimensi baru
                                    echo '<img src="' . $resized_path . '" width="' . $target_width . '" height="' . $target_height . '" alt="Foto Member">';

                                    // Hapus gambar sementara yang sudah disesuaikan
                                    imagedestroy($image_resized);
                                    imagedestroy($image_original);
                                } else {
                                    echo 'Foto tidak tersedia';
                                }

                                ?>
                            </td>
                            <td>
                                <?= $row['judul_buku'] ?>
                            </td>
                            <td>
                                <?= $row['kategori'] ?>
                            </td>
                            <td>
                                <?= $row['stok'] ?>
                            </td>

                            <td>
                                <div class="btn">
                                    <!--Modal Detail-->
                                    <button type="button" class="btn btn-primary " data-bs-toggle="modal"
                                        data-bs-target="#DetailModal<?= $row['id'] ?>"><span class="bx bx-pen"></span></button>

                                    <div class="modal fade" id="DetailModal<?= $row['id'] ?>" tabindex="-1">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Buku</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!--Isi content Modal-->
                                                    <section class="section profile">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="card">
                                                                    <div
                                                                        class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                                                        <?php
                                                                        $imagePath = "berkas/" . $row['foto'];
                                                                        if (file_exists($imagePath) && is_readable($imagePath)) {
                                                                            echo '<img src="' . $imagePath . '" alt="Book Cover">';
                                                                        } else {
                                                                            echo '<p>Error: Image not found</p>';
                                                                        }
                                                                        ?>
                                                                        <h2 class="mt-2">
                                                                            <?= $row['judul_buku'] ?>
                                                                        </h2>
                                                                        <h3 class="mt-2"><i>
                                                                                <h6>"
                                                                                    <?= $row['kategori'] ?>"
                                                                                </h6>
                                                                            </i></h3>
                                                                        <div class="social-links">
                                                                            <p>
                                                                                <?= $row['penulis'] ?> |
                                                                                <?= $row['penerbit'] ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-7">
                                                                <div class="card">
                                                                    <div class="card-body pt-3">
                                                                        <!-- Bordered Tabs -->
                                                                        <ul class="nav nav-tabs nav-tabs-bordered">
                                                                            <li class="nav-item">
                                                                                <button class="nav-link active" data-bs-toggle="tab"
                                                                                    data-bs-target="#profile-overview">Overview</button>
                                                                            </li>
                                                                        </ul>
                                                                        <div class="tab-content pt-2">
                                                                            <div class="tab-pane fade show active profile-overview"
                                                                                id="profile-overview">
                                                                                <h5 class="card-title text-start">Sinopsis</h5>
                                                                                <p class="small fst-italic text-start">
                                                                                    <?= $row['sinopsis'] ?>
                                                                                </p>

                                                                                <h5 class="card-title text-start">Details</h5>
                                                                                <div class="row text-start">
                                                                                    <div class="col-lg-4 col-md-4 label">ISBN</div>
                                                                                    <div class="col-lg-5 col-md-8">
                                                                                        <?= $row['kode_buku'] ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row text-start">
                                                                                    <div class="col-lg-4 col-md-4 label ">Tahun Terbit
                                                                                    </div>
                                                                                    <div class="col-lg-5 col-md-8">
                                                                                        <?= $row['tahun_terbit'] ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row text-start">
                                                                                    <div class="col-lg-4 col-md-4 label ">Penulis</div>
                                                                                    <div class="col-lg-5 col-md-8">
                                                                                        <?= $row['penulis'] ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row text-start">
                                                                                    <div class="col-lg-4 col-md-4 label">Penerbit</div>
                                                                                    <div class="col-lg-5 col-md-8">
                                                                                        <?= $row['penerbit'] ?>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div><!--Akhir Modal Detail-->

                                    <?php
                                    if ($_SESSION['level'] == 'admin') {
                                        ?>




                                        <button type="button" class="btn btn-success " data-bs-toggle="modal"
                                            data-bs-target="#EditModal<?= $row['id'] ?>"><span class="bx bx-file"></span></button>

                                        <div class="modal fade" id="EditModal<?= $row['id'] ?>" tabindex="-1" data-bs-backdrop="static"
                                            data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" aria-labelledby="staticBackdropLabel">Edit Data Buku</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!--Isi Content Modal Edit-->
                                                        <form id="Edit" class="form text-start" action="proses_book.php" method="post"
                                                            enctype="multipart/form-data" onclick="submitForm()">
                                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-sm-3 col-form-label">ISBN</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="kode_buku" class="form-control"
                                                                        value="<?= $row['kode_buku'] ?>" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="inputNumber" class="col-sm-3 col-form-label">Sampul</label>
                                                                <div class="col-sm-9">
                                                                    <input class="form-control" type="file" id="formFile" name="foto"
                                                                        accept="berkas/*">
                                                                    <img class="mt-2" src="<?php echo "berkas/" . $row['foto']; ?>"
                                                                        style="width: 50px;" alt="Uploaded Image">
                                                                    <!-- Display the current file name -->
                                                                    <?php echo $row['foto']; ?>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="inputText" class="col-sm-3 col-form-label">Judul Buku</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="judul_buku"
                                                                        value="<?= $row['judul_buku'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3 mt-3">
                                                                <label class="col-sm-3 col-form-label" for="kategori">Kategori</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-select" aria-label="Default select example"
                                                                        name="kategori" id="kategori">

                                                                        <?php
                                                                        $query_kategori = "SELECT * FROM kategori";
                                                                        $result_kategori = $db->query($query_kategori);

                                                                        if ($result_kategori) {
                                                                            while ($row_kategori = $result_kategori->fetch_assoc()) {
                                                                                $selected = ($row['kategori'] == $row_kategori['nama_kategori']) ? 'selected' : '';
                                                                                echo '<option value="' . $row_kategori['nama_kategori'] . '" ' . $selected . '>' . $row_kategori['nama_kategori'] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3 mt-3">
                                                                <label class="col-sm-3 col-form-label" for="penulis">Penulis</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-select" aria-label="Default select example"
                                                                        name="penulis" id="penulis">

                                                                        <?php
                                                                        $query_penulis = "SELECT * FROM penulis";
                                                                        $result_penulis = $db->query($query_penulis);

                                                                        if ($result_penulis) {
                                                                            while ($row_penulis = $result_penulis->fetch_assoc()) {
                                                                                // Use the correct variable for the selected option comparison
                                                                                $selected = ($row['penulis'] == $row_penulis['nama_penulis']) ? 'selected' : '';
                                                                                echo '<option value="' . $row_penulis['nama_penulis'] . '" ' . $selected . '>' . $row_penulis['nama_penulis'] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3 mt-3">
                                                                <label class="col-sm-3 col-form-label" for="penerbit">Penerbit</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-select" aria-label="Default select example"
                                                                        name="penerbit" id="penerbit">

                                                                        <?php
                                                                        $query_penerbit = "SELECT * FROM penerbit";
                                                                        $result_penerbit = $db->query($query_penerbit);

                                                                        if ($result_penerbit) {
                                                                            while ($row_penerbit = $result_penerbit->fetch_assoc()) {
                                                                                // Use the correct variable for the selected option comparison
                                                                                $selected = ($row['penerbit'] == $row_penerbit['penerbit']) ? 'selected' : '';
                                                                                echo '<option value="' . $row_penerbit['penerbit'] . '" ' . $selected . '>' . $row_penerbit['penerbit'] . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="tahun_terbit" class="col-sm-3 col-form-label">Tahun
                                                                    Terbit</label>
                                                                <div class="col-sm-3">
                                                                    <select class="form-select" name="tahun_terbit" id="tahun_terbit"
                                                                        required>
                                                                        <option value="" selected>-- Pilih Tahun --</option>

                                                                        <?php
                                                                        // Loop untuk membuat opsi tahun dari 1980 hingga tahun sekarang
                                                                        $tahun_sekarang = date("Y");
                                                                        for ($tahun = 1980; $tahun <= $tahun_sekarang; $tahun++) {
                                                                            $selected = ($tahun == $row['tahun_terbit']) ? 'selected' : '';
                                                                            echo '<option value="' . $tahun . '" ' . $selected . '>' . $tahun . '</option>';
                                                                        }

                                                                        // Query database untuk mendapatkan daftar tahun terbit unik
                                                                        $query = "SELECT DISTINCT tahun_terbit FROM buku";
                                                                        $result = $db->query($query);

                                                                        if ($result->num_rows > 0) {
                                                                            while ($row_db = $result->fetch_assoc()) {
                                                                                $tahun_terbit_db = $row_db['tahun_terbit'];
                                                                                $selected = ($tahun_terbit_db == $row['tahun_terbit']) ? 'selected' : '';
                                                                                echo '<option value="' . $tahun_terbit_db . '" ' . $selected . '>' . $tahun_terbit_db . '</option>';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="inputPassword" class="col-sm-3 col-form-label">Sinopsis</label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control" style="height: 100px" name="sinopsis"
                                                                        id="sinopsis"><?= $row['sinopsis'] ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="inputNumber" class="col-sm-3 col-form-label">Stok</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" name="stok"
                                                                        value="<?= $row['stok'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div> <!--Akhir Modal Edit-->

                                        <a onclick="return confirm('Apakah kamu yakin menghapusnya?')"
                                            href="proses_book.php?proses=delete&id=<?= $row['id'] ?>"
                                            class="btn btn-danger text-light"><span class="bx bx-trash"></a>

                                    </div>
                                </td>
                                <?php
                                    }
                                    ?>



                            <!--Modal Edit-->



                        </tr>
                        <?php
                    endforeach;
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
            </tbody>
            </table>


            <?php
            break;

                case 'detail':
                    include 'koneksi.php';
                    $id = $_GET['id'];
                    $query = "SELECT * FROM buku WHERE id=?";
                    $stmtSelect = $db->prepare($query);

                    if (!$stmtSelect) {
                        die("Error in query preparation: " . $db->error);
                    }

                    $stmtSelect->bind_param("i", $id);
                    $stmtSelect->execute();
                    $result = $stmtSelect->get_result();

                    // Periksa apakah query berhasil dieksekusi
                    if (!$result) {
                        die("Error: " . $db->error);
                    }

                    // Periksa apakah data ditemukan
                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $kode_buku = $row['kode_buku'];
                        $judul_buku = $row['judul_buku'];
                        $penulis = $row['penulis'];
                        $kategori = $row['kategori'];
                        $penerbit = $row['penerbit'];
                        $tahun_terbit = $row['tahun_terbit'];
                        $sinopsis = $row['sinopsis'];
                        $stok = $row['stok'];
                    } else {
                        echo "Data id " . $id . " tidak ditemukan";
                        exit;
                    }
                    ?>


            <li class="breadcrumb-item active">Detail Buku</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="berkas/<?php echo $row['foto']; ?>" alt="Book Cover" ">
                                                <h2 class=" mt-2">
                            <?php echo $judul_buku; ?>
                            </h2>
                            <h3 class="mt-2"><i>
                                    <h6>"
                                        <?php echo $kategori; ?>"
                                    </h6>
                                </i></h3>
                            <div class="social-links">
                                <p>
                                    <?php echo $penulis . " | " . $penerbit; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Sinopsis</h5>
                                    <p class="small fst-italic">
                                        <?php echo $sinopsis; ?>
                                    </p>

                                    <h5 class="card-title">Details</h5>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">ISBN</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $kode_buku; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Tahun Terbit</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $tahun_terbit; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Penulis</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $penulis; ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Penerbit</div>
                                        <div class="col-lg-9 col-md-8">
                                            <?php echo $penerbit; ?>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        break;
            }
            ?>