<?php
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim = $_POST['nim'];
        $kode_buku = $_POST['kode_buku'];
        $tgl_pinjam = date("Y-m-d", strtotime($_POST["tgl_pinjam"]));

        // Cek nim dan kode_buku
        if ($nim && $kode_buku) {

            // Cek jumlah pinjam member maks 3 buku
            $query_jumlah_pinjam = "SELECT COUNT(*) AS jumlah_pinjam, member.level, member.nama FROM pinjaman JOIN member ON pinjaman.nim = member.nim WHERE pinjaman.nim = '$nim'";

            $result_jumlah_pinjam = $db->query($query_jumlah_pinjam);

            if ($result_jumlah_pinjam) {
                $row_jumlah_pinjam = $result_jumlah_pinjam->fetch_assoc();
                $jumlah_pinjam = $row_jumlah_pinjam['jumlah_pinjam'];
                $level = $row_jumlah_pinjam['level'];
                $nama = $row_jumlah_pinjam['nama'];

                // Batasi jumlah peminjaman maksimal
                $batas_peminjaman = ($level == 'Mahasiswa') ? 7 : 30;

                if ($jumlah_pinjam < $batas_peminjaman) {
                    // Dapatkan informasi buku
                    $query_buku = "SELECT judul_buku, foto, kategori, stok FROM buku WHERE kode_buku = '$kode_buku'";
                    $result_buku = $db->query($query_buku);

                    if ($result_buku) {
                        $row_buku = $result_buku->fetch_assoc();

                        if ($row_buku) {
                            // Cek stok buku
                            $stok = $row_buku['stok'];

                            if ($stok > 0) {
                                // Cek total buku yang sudah dipinjam
                                $query_total_pinjam = "SELECT COUNT(*) AS total_pinjam FROM pinjaman WHERE nim = '$nim'";
                                $result_total_pinjam = $db->query($query_total_pinjam);

                                if ($result_total_pinjam) {
                                    $row_total_pinjam = $result_total_pinjam->fetch_assoc();
                                    $total_pinjam = $row_total_pinjam['total_pinjam'];

                                    // Batasi jumlah total peminjaman maksimal menjadi 3 buku
                                    $batas_total_peminjaman = 3;

                                    if ($total_pinjam < $batas_total_peminjaman) {
                                        // Update stok buku
                                        $query_update_stok = "UPDATE buku SET stok = stok - 1 WHERE kode_buku = '$kode_buku'";
                                        $result_update_stok = $db->query($query_update_stok);

                                        if ($result_update_stok) {
                                            // Tambah hari peminjaman sesuai level
                                            $tgl_kembali = date("Y-m-d", strtotime($tgl_pinjam . " +$batas_peminjaman days"));

                                            $judul_buku = $row_buku['judul_buku'];
                                            $kategori = $row_buku['kategori'];

                                            $file_name = $row_buku['foto'];

                                            // Insert data peminjaman
                                            $query_insert = "INSERT INTO pinjaman (nim, nama, kode_buku, judul_buku, kategori, tgl_pinjam, tgl_kembali, foto, level) VALUES ('$nim', '$nama', '$kode_buku', '$judul_buku', '$kategori', '$tgl_pinjam', '$tgl_kembali', '$file_name', '$level')";
                                            $result_insert = $db->query($query_insert);

                                            if ($result_insert) {
                                                echo "<script>
                                                    alert('Data Peminjaman Berhasil Ditambah');
                                                    document.location='index.php?page=transaksi';
                                                </script>";
                                                exit();
                                            } else {
                                                echo "Error: " . $query_insert . "<br>" . $db->error;
                                            }
                                        } else {
                                            echo "Error updating stok buku: " . $db->error;
                                        }
                                    } else {
                                        echo "<script>
                                            alert('Anda mencapai batas total peminjaman maksimal (3 buku). Silahkan kembalikan buku terlebih dahulu');
                                            document.location='index.php?page=transaksi';
                                        </script>";
                                        exit();
                                    }
                                } else {
                                    echo "Error: " . $query_total_pinjam . "<br>" . $db->error;
                                    exit();
                                }
                            } else {
                                echo "<script>
                                    alert('Stok buku tidak mencukupi.');
                                    document.location='index.php?page=transaksi';
                                </script>";
                                exit();
                            }
                        } else {
                            echo "<script>
                                alert('Data Buku Tidak Ditemukan');
                                document.location='index.php?page=transaksi';
                            </script>";
                            exit();
                        }
                    } else {
                        echo "Error: " . $query_buku . "<br>" . $db->error;
                        exit();
                    }
                } else {
                    echo "<script>
                        alert('Anda mencapai batas peminjaman maksimal. Silahkan kembalikan buku terlebih dahulu');
                        document.location='index.php?page=transaksi';
                    </script>";
                    exit();
                }
            } else {
                echo "Error: " . $query_jumlah_pinjam . "<br>" . $db->error;
                exit();
            }
        } else {
            echo "<script>
                alert('NIM Tidak Ditemukan.');
                document.location='index.php?page=transaksi';
            </script>";
            exit();
        }
    }
}





if (isset($_POST['kembali'])) {
    if (isset($_POST['id_pinjam'])) {

        $id_pinjam = isset($_POST['id_pinjam']) ? $_POST['id_pinjam'] : null;
        $total_denda = isset($_POST['total_denda']) ? (int)$_POST['total_denda'] : 0;


        // data dari tabell pinjaman
        $query_select = "SELECT pinjaman.*, member.level 
                         FROM pinjaman 
                         JOIN member ON pinjaman.nim = member.nim
                         WHERE pinjaman.id_pinjam = '$id_pinjam'";

        $result_select = $db->query($query_select);

        if ($result_select) {
            // Cek data ditemukan/tidak
            if ($result_select->num_rows > 0) {
                $row = $result_select->fetch_assoc();

                // Salin data ke tabel riwayat
                $query_insert_riwayat = "INSERT INTO riwayat (id_pinjam, kode_buku, foto, judul_buku, kategori, nim, nama, tgl_pinjam, tgl_kembali, status, level, denda) 
                                         VALUES ('{$row['id_pinjam']}', '{$row['kode_buku']}', '{$row['foto']}', '{$row['judul_buku']}', '{$row['kategori']}', '{$row['nim']}', '{$row['nama']}', '{$row['tgl_pinjam']}', '{$row['tgl_kembali']}', 'Selesai', '{$row['level']}', $total_denda)";
                $result_insert_riwayat = $db->query($query_insert_riwayat);

                if ($result_insert_riwayat) {
                    // Update status
                    $query_update_status = "UPDATE pinjaman SET status = 'Selesai' WHERE id_pinjam = '$id_pinjam'";
                    $result_update_status = $db->query($query_update_status);

                    if ($result_update_status) {
                        // Hapus data tabel peminjaman
                        $query_delete_pinjaman = "DELETE FROM pinjaman WHERE id_pinjam = '$id_pinjam'";
                        $result_delete_pinjaman = $db->query($query_delete_pinjaman);

                        if ($result_delete_pinjaman) {
                            // Tambahkan stok buku yang dikembalikan
                            $kode_buku = $row['kode_buku'];
                            $query_update_stok = "UPDATE buku SET stok = stok + 1 WHERE kode_buku = '$kode_buku'";
                            $result_update_stok = $db->query($query_update_stok);

                            if ($result_update_stok) {
                                echo "<script>
                                    alert('Buku Berhasil Dikembalikan');
                                    document.location='index.php?page=riwayat';
                                </script>";
                                exit();
                            } else {
                                echo "Error updating stok buku: " . $db->error;
                            }
                        } else {
                            echo "Error deleting data from pinjaman table: " . $db->error;
                        }
                    } else {
                        echo "Error updating status: " . $db->error;
                    }
                } else {
                    echo "Error inserting data into riwayat table: " . $db->error;
                }
            } else {
                echo "ID Pinjaman '$id_pinjam' tidak ditemukan atau tidak valid.";
            }
        } else {
            echo "Error in query execution: " . $db->error;
        }
    } else {
        echo "ID Pinjaman tidak ditemukan dalam parameter POST.";
    }
} else {
    echo "Form submission tidak valid.";
}



if (isset($_GET['proses']) && $_GET['proses'] == 'perpanjang') {
    // cek id_pinjam
    if (isset($_GET['id_pinjam'])) {
        $id_pinjam = $_GET['id_pinjam'];

       //data peminjaman
        $query = "SELECT * FROM pinjaman WHERE id_pinjam = '$id_pinjam'";
        $result = $db->query($query);

        if ($result) {
            //jika tidak kosong jalankan 
            $row = $result->fetch_assoc();

            if ($row) {
                $tgl_kembali = $row['tgl_kembali'];
                $tgl_sekarang = date("Y-m-d");

                // Periksa tgl_sekarang lebih kecil dari tgl_kembali
                if ($tgl_sekarang < $tgl_kembali) {
                    $tgl_kembali_baru = date("Y-m-d", strtotime($tgl_kembali . " +7 days"));

                    // update tanggal
                    $query_perpanjang = "UPDATE pinjaman SET tgl_kembali = '$tgl_kembali_baru' WHERE id_pinjam = '$id_pinjam'";
                    $result_perpanjang = $db->query($query_perpanjang);

                    if ($result_perpanjang) {
                        echo "<script>
                        alert('Perpanjangan Buku Berhasil, Harap Kembalikan Buku Sesuai Dengan Jadwal');
                        document.location='index.php?page=transaksi';
                        </script>";

                        exit();
                    } else {
                        echo "<script>
                        alert('Perpanjangan Peminjaman Gagal');
                        document.location='index.php?page=transaksi';
                    </script>";
                    }
                } else {
                    echo "<script>
                    alert('Batas peminjaman Anda sudah lewat.Silakan kembalikan buku terlebih dahulu.');
                    document.location='index.php?page=transaksi';
                    </script>";

                }
            } else {
                echo "ID Pinjaman tidak valid.";
            }
        } else {
            echo "Error dalam menjalankan query: " . $db->error;
        }
    } else {
        echo "ID Pinjaman tidak ditemukan dalam parameter GET.";
    }
} else {
    echo "Proses tidak valid.";
}



?>