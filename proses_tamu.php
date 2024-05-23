<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $nim = $_POST['nim'];

    //cek nim/nip apakah sudah terdaftar atau tidak
    $query_check_member = "SELECT * FROM member WHERE nim = '$nim'";
    $result_check_member = $db->query($query_check_member);

    
    if ($result_check_member->num_rows > 0) {
        //tgl hari ini
        $tanggal_kunjungan = date('Y-m-d');

       // menambahkan nim, nama, prodi, level, tanggal kedalam tabel kunjungan
        $query_insert_kunjungan = "INSERT INTO kunjungan (nim, nama, prodi, level, tanggal, total_kunjungan)
        SELECT m.nim, m.nama, m.prodi, m.level, '$tanggal_kunjungan', 0 FROM member m WHERE m.nim = '$nim'";


        $result_insert_kunjungan = $db->query($query_insert_kunjungan);

        
        if ($result_insert_kunjungan) {
            echo "<script>
            alert('Data Kunjungan Berhasil Disimpan. Selamat Datang');
            document.location='home.php?page=BukuTamu';
            </script>";
        } else {
            echo "Gagal menyimpan data kunjungan: " . $db->error;
        }
    } else {
        echo "<script>
        alert('ID Anda belum terdaftar, Silahkan daftar menjadi member perpustakaan terlebih dahulu');
        document.location='home.php?page=BukuTamu';
        </script>";
    }


}
?>
