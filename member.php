<div class="pagetitle">
  <h1><b>Members</b></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
      <li class="breadcrumb-item active"><a href="index.php?page=member">Members</a></li>


      <?php
      $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
      switch ($aksi) {
        case 'insert':
          ?>
          <li class="breadcrumb-item active">Tambah Member</li>
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
          <h5 class="card-title">Data Member</h5>

          <table class="table table-borderless datatable">

            <?php
            if ($_SESSION['level'] == 'pustakawan') {
              ?>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <span class="badge bg-white text-dark me-2">+</span>Tambah Member
              </button>

              <a href="cetak_laporan_member.php" class="btn btn-primary text-light ms-2"><span class="bx bx-printer"></a>

              <?php
            }
            ?>
            <!-- Button trigger modal -->



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Member</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- General Form Elements -->
                    <form class="form" action="proses_member.php?proses=insert" method="post" enctype="multipart/form-data">
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-4 col-form-label">NIP/NIM</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nim" id="nim">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                          <input type="email" class="form-control" name="email" id="email">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-4 col-form-label">Tanggal Registrasi</label>
                        <div class="col-sm-6">
                          <input type="date" class="form-control" name="register_date" id="register_date" require>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                          <textarea class="form-control" name="alamat" id="alamat" style="height: 100px"></textarea>
                        </div>
                      </div>

                      <div class="row mb-3 mt-3">
                        <label class="col-sm-4 col-form-label" for="prodi">Prodi</label>
                        <div class="col-sm-8">
                          <select class="form-select" aria-label="Default select example" name="prodi" id="prodi">
                            <?php
                            // Query untuk mendapatkan data prodi dari tabel prodi
                            $query = "SELECT * FROM prodi";
                            $result = $db->query($query);

                            // Periksa apakah query berhasil
                            if (!$result) {
                              die("Error in query: " . $db->error);
                            }

                            // Ambil data prodi dari member yang diedit (jika ada)
                            $ProdiMember = isset($_GET['id_prodi']) ? $prodi : '';

                            // Tampilkan opsi untuk prodi
                            echo '<option value="" ' . ($ProdiMember === '' ? 'selected' : '') . '>--Pilih Prodi--</option>';

                            while ($row = $result->fetch_assoc()) {
                              // Pilih prodi yang sesuai dengan data member yang diedit
                              $selected = ($ProdiMember == $row['nama_prodi']) ? 'selected' : '';
                              echo '<option value="' . $row['nama_prodi'] . '" ' . $selected . '>' . $row['nama_prodi'] . '</option>';
                            }
                            ?>
                          </select>
                          <?php echo '<small class="text-danger">* Kosongkan Jika Tidak Memiliki Prodi</small>'; ?>
                        </div>
                      </div>


                      <div class="row mb-3 mt-3">
                        <label class="col-sm-4 col-form-label" for="level">Level</label>
                        <div class="col-sm-6">
                          <select class="form-select" aria-label="Default select example" name="level" id="level" required>
                            <option selected>--Select menu--</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Staff">Staff</option>
                          </select>
                        </div>
                      </div>

                      <!-- <div class="row mb-3">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div> -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submitEdit"
                          onclick="submitForm()">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </form><!-- End General Form Elements -->


                  </div>
                </div>


              </div>

            </div>
        </div>
      </div>
    </div>
    <thead>
      <tr>
        <th scope="col">NIP/NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Prodi</th>
        <th scope="col">Email</th>
        <th scope="col">Level</th>
        <?php
        if ($_SESSION['level'] == 'pustakawan') {
          ?>
          <th scope="col">Aksi</th>
          <?php
        }
        ?>

      </tr>
    </thead>
    <tbody>
      <?php
      require 'koneksi.php';
      $query = "SELECT * FROM member";
      $result = $db->query($query);
      $nomor = 1;

      foreach ($result as $row):
        $level = $row['level']; // Move this line inside the foreach loop
        ?>
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
          <td>
            <?= $row['email'] ?>
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
              <span class="badge <?= $badgeClass ?> rounded-3 fw-semibold">
                <?= $level ?>
              </span>
            </div>
          </td>

          <?php
          if ($_SESSION['level'] == 'pustakawan') {
            ?>
            <td>
              <div class="btn">

                <!-- Modal edit-->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                  data-bs-target="#ModalEdit<?= $row['nim'] ?>">
                  <span class="bx bx-file"></span>
                </button>

                <a onclick="return confirm('Apakah kamu yakin menghapusnya?')"
                  href="proses_member.php?proses=delete&nim=<?= $row['nim'] ?>" class="btn btn-danger text-light"><span
                    class="bx bx-trash"></a>

                <div class="modal fade" id="ModalEdit<?= $row['nim'] ?>" tabindex="-1" aria-labelledby="modal"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalEdit<?= $row['nim'] ?>"><strong>Edit Data Member</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form class="form text-start" id="formEdit" action="proses_member.php" method="post"
                          onsubmit="submitForm()">
                          <input type="hidden" name="nim" value="<?= $row['nim'] ?>">
                          <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-4 col-form-label">NIP/NIM</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" value="<?= $row['nim'] ?>" readonly>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="nama" value="<?= $row['nama'] ?>">
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="inputDate" class="col-sm-4 col-form-label">Tanggal Registrasi</label>
                            <div class="col-sm-5">
                              <input type="date" class="form-control" name="register_date" id="register_date"
                                value="<?= $row['register_date'] ?>" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" style="height: 100px" name="alamat"
                                id="alamat"><?= $row['alamat'] ?></textarea>
                            </div>
                          </div>

                          <div class="row mb-3 mt-3">
                            <label class="col-sm-4 col-form-label" for="prodi">Prodi</label>
                            <div class="col-sm-8">
                              <select class="form-select" aria-label="Default select example" name="prodi" id="prodi">
                                <?php
                                $query_prodi = "SELECT * FROM prodi";
                                $result_prodi = $db->query($query_prodi);

                                if ($result_prodi) {
                                  while ($row_prodi = $result_prodi->fetch_assoc()) {
                                    // Use the correct variable for the selected option comparison
                                    $selected = ($row['prodi'] == $row_prodi['nama_prodi']) ? 'selected' : '';
                                    echo '<option value="' . $row_prodi['nama_prodi'] . '" ' . $selected . '>' . $row_prodi['nama_prodi'] . '</option>';
                                  }
                                  $result_prodi->free_result(); // Free the result set
                                } else {
                                  die("Error in query: " . $db->error);
                                }
                                ?>
                              </select>
                              <?php echo '<small class="text-danger">* Kosongkan Jika Tidak Memiliki Prodi</small>'; ?>
                            </div>
                          </div>


                          <div class="row mb-3 mt-3">
                            <label class="col-sm-4 col-form-label" for="level">Level</label>
                            <div class="col-sm-6">
                              <select name="level" class="form-select" aria-label="Default select example">
                                <option <?php echo ($row['level'] == 'Mahasiswa') ? 'selected' : ''; ?> value="Mahasiswa">
                                  Mahasiswa</option>
                                <option <?php echo ($row['level'] == 'Dosen') ? 'selected' : ''; ?> value="Dosen">Dosen
                                </option>
                                <option <?php echo ($row['level'] == 'Staff') ? 'selected' : ''; ?> value="Staff">Staff
                                </option>
                              </select>
                            </div>
                          </div>



                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="submitEdit"
                              onclick="submitForm()">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>

                </div>
                <script>
                  function submitForm() {
                    document.getElementById('formEdit').submit();
                  }
                </script>
                <!--Akhir Modal Edit Member-->

              </div>



            </td>
            <?php
          }
          ?>



        </tr>
      <?php endforeach ?>
    </tbody>

    </table>



    <?php
    break;
      }
      ?>