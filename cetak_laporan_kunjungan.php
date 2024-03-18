<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Anggota</title>
    <!-- Tambahkan link CSS Bootstrap di sini -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {

            /* Sembunyikan tombol cetak saat mencetak */
            .btn-print {
                display: none;
            }

            /* Atur style yang ingin diaplikasikan saat mencetak */
            body {
                font-family: Arial, sans-serif;
            }

            /* Gaya untuk logo */
            .logo {
                width: 100px;
                /* Sesuaikan ukuran logo */
                height: auto;
                margin-right: 20px;
                margin-top: 5px;
                /* Geser sedikit ke bawah */
            }

            /* Gaya untuk header */
            .header {
                text-align: center;
            }

            /* Gambar dalam header */
            .img {
                max-width: 100%;
                height: auto;
            }

            /* Jarak antara judul dan tabel */
            h2.table-title {
                margin-bottom: 10px;
                text-align: center;
            }

            .signature {
                text-align: right;
                margin-top: 20px;
            }

          

            .signature-text {
                text-align: right;
                margin-top: 20px;
                /* Sesuaikan margin top sesuai kebutuhan */
            }

        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="container mt-5">
            <header class="header">
                <img src="assets/img/pnpkopsurat.png" alt="Header Image" class="img">
            </header>
            <h2 class="text-center table-title"><strong>LAPORAN KUNJUNGAN PUSTAKA</strong></h2>

            <div class="container mt-5">
                <div class="container">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>NO</th>
                                <th>NIP/NIM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Level</th>
                                <th>Tanggal Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'koneksi.php';

                            $query = "SELECT * FROM kunjungan";
                            $result = $db->query($query);

                            if (!$result) {
                                die("Error in query: " . $db->error);

                            }

                            $nomor = 1; // Inisialisasi variabel nomor
                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $nomor++ . "</td>";
                                echo "<td>" . $row['nim'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['prodi'] . "</td>";
                                echo "<td>" . $row['level'] . "</td>";
                                echo "<td>" . $row['tanggal'] . "</td>";
                                echo "</tr>";
                            }

                            $result->free_result();
                            $db->close();
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tambahkan script untuk mencetak otomatis saat tombol cetak diklik -->
                <script>
                    function printReport() {
                        // Cetak laporan secara otomatis
                        window.print();
                    }
                    // Panggil fungsi cetak saat halaman dimuat
                    printReport();
                </script>

                <!-- Tambahkan link JS Bootstrap di sini -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </div>

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <form id="signature-form" class="signature">
                        <?php
                        
                        $tanggal_sekarang = date("d F Y");

                        echo '<label for="signature" style="margin-bottom: 50px;">Padang, ' . $tanggal_sekarang . '</label>';
                        
                        ?>
                        <div class="row">
                            <div class="col-11">
                            <h6 class="text-start mt-4">Admin</h6>
                            </div>
                            <div class="col-1">
                            <h6 class="text-start"></h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <h6 class="text-start mt-2">(------------------------------------)</h6>
                            </div>
                            
                        </div>
                       
                    </form>
                </div>
            </div>


        </div>
    </div>
</body>

</html>