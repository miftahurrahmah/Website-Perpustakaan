<div class="pagetitle">
    <h1>Data Penulis</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=prodi">Data Penulis</a></li>


            <?php
            $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
            switch ($aksi) {
                case 'insert':
                    ?>
                   
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
                    <h5 class="card-title">Data Penulis</h5>

                    <table class="table table-borderless datatable">


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="badge bg-white text-dark me-2">+</span>Tambah Penulis
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Data Penulis</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- General Form Elements -->
                                        <form class="form" action="proses_penulis.php?proses=insert" method="post"
                                            enctype="multipart/form-data">

                                            <div class="row mb-3">
                                                <label for="inputText" class="col-sm-3 col-form-label">Nama Penulis</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nama_penulis"
                                                        id="nama_penulis">
                                                </div>
                                            </div>



                                            <fieldset class="row mb-3">

                                                <div class="row mb-3">
                                                    <div class="col-sm-10">
                                                        <button type="submit" name="submit"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </fieldset>

                                    </div>
                                </div>

                                </form><!-- End General Form Elements -->
                            </div>

                        </div>
                </div>
            </div>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Penulis</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php
                // Perform the database query with proper table alias and join condition
                $query = "SELECT * FROM penulis";
                $result = $db->query($query);

                // Check if the query was successful
        
                // Check if $result is set before using foreach
                if ($result->num_rows > 0) {
                    $nomor = 1;
                    foreach ($result as $row):
                        ?>
                        <tr>
                            <td>
                                <?= $nomor++ ?>
                            </td>
                            <td>
                                <?= $row['nama_penulis'] ?>
                            </td>
                            <td>
                                <div class="btn">


                                    <!--Modal Edit-->
                                    <button type="button" class="btn btn-success " data-bs-toggle="modal"
                                        data-bs-target="#EditModal<?= $row['id_penulis'] ?>"><span class="bx bx-file"></span></button>

                                    <div class="modal fade" id="EditModal<?= $row['id_penulis'] ?>" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" aria-labelledby="staticBackdropLabel">Edit Data Penulis
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!--Isi Content Modal Edit-->
                                                    <form id="Edit" class="form text-start" action="proses_penulis.php" method="post">
                                                        <input type="hidden" name="id_penulis" value="<?php echo $row['id_penulis']; ?>">
                                                        <div class="row mb-3">
                                                            <label for="nama_penulis" class="col-sm-4 col-form-label">Nama Penulis</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="nama_penulis"
                                                                    value="<?= $row['nama_penulis'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary" name="ubahPenulis">Simpan</button>
                                                        </div>
                                                    </form>


                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                    <a onclick="return confirm('Apakah kamu yakin menghapusnya?')"
                                        href="proses_penulis.php?proses=delete&id_penulis=<?= $row['id_penulis'] ?>"
                                        class="btn btn-danger text-light"><span class="bx bx-trash"></a>


                                </div>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                } else {
                    echo "<tr><td class ='text-center' colspan='6'>No data found</td></tr>";
                }
                ?>
            </tbody>
            </table>


        </div>

        <?php
        break;

            }