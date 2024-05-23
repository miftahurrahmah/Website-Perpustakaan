
<main class="Kategori" id="Kategori" class="mt-5">
    <div class="container">
       <!--Header buku terbaru-->
        <h1 class="h2-responsive fw-bold text-center my-5">
            <strong>Buku Terbaru</strong>
        </h1>
        <!--Akhir-->

        <!--Content hanya untuk menampilkan 6 buku terbaru-->
        <div class="row mt-5 justify-content-center" id="bookList">
            <?php
            include 'koneksi.php';

            // Fetch the latest 6 books from the database
            $query = "SELECT judul_buku, foto FROM buku ORDER BY id DESC LIMIT 6"; // Replace timestamp_column with the actual column name
            $result = $db->query($query);

            // Check if the query was successful
            if (!$result) {
                echo "Error executing query: " . $db->error;
            } else {
                // Iterate through the fetched book data and generate card elements
                while ($row = $result->fetch_assoc()) {
                    $imagePath = 'berkas/' . $row['foto'];

                    // Check if the image file exists
                    if (file_exists($imagePath)) {
                        echo '
                            <div class="col-md-2">
                                <div class="card" style="width: 10rem;">
                                    <img src="' . $imagePath . '" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <p class="card-text">' . $row['judul_buku'] . '</p>
                                    </div>
                                </div>
                            </div>';
                    } else {
                        // Display a placeholder or handle the missing image
                       
                        error_log('Image not found: ' . $imagePath);
                    }
                }
            }
            ?>
        </div>
    </div>
</main>





        <!-- <div class="row mt-5">
            <div class="card">
                <div class="card-header">Quotes</div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>“Sebaik-baiknya privilege adalah dengan ilmu”.</p>
                        <footer class="blockquote-footer">Evan S. Parusa</footer>
                    </blockquote>
                </div>
            </div>
        </div> -->


<!-- 
    </div>
</main> -->


<!--About End-->

<!--Courses Section Start-->
<main class="Pengumuman" id="Pengumuman" class="mt-5">
    <div class="container">
        <!--Section Head Start-->
        <h1 class="h2-responsive fw-bold text-center my-5">
            <strong>PNP News</strong>
        </h1>
        <!--Section Head End-->

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card box">
                    <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_960/https://www.pnp.ac.id/wp-content/uploads/2023/12/Rezki-Hidayat-1.jpg"
                        class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Awardee IISMAVO, Belajar Di Perpustakaan 24 Jam Ala Coventry
                                University Hingga Berkunjung Ke Perusahaan Ternama Dunia</strong></h5>
                        <p class="card-text">admin</p>
                        <a href="berita.php" class="btn btn-primary">SELENGKAPNYA</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card box">
                    <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_2048/https://www.pnp.ac.id/wp-content/uploads/2023/11/RTM-bersama-1-2048x1365-1.jpg"
                        class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Rapat Tinjauan Manajemen & Workshop Leadership Wawasan
                                Kebangsaan</strong></h5>
                        <p class="card-text">admin</p>
                        <a href="berita2.php" class="btn btn-primary">SELENGKAPNYA</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card box">
                    <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_960/https://www.pnp.ac.id/wp-content/uploads/2023/09/Pelatihan-dan-Sertifikasi-Kompetensi-Dosen-Vokasi-01.jpg"
                        class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Pelatihan Dan Sertifikasi Kompetensi Dosen Vokasi</strong></h5>
                        <p class="card-text">admin</p>
                        <a href="https://id.wikipedia.org/wiki/SMA_Negeri_2_Pariaman"
                            class="btn btn-primary">SELENGKAPNYA</a>

                    </div>
                </div>
            </div>
        </div>



    </div>
</main>


