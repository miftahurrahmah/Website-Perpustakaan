
<?php 
include 'koneksi.php';

// Process Insert

if (isset($_GET['proses']) && $_GET['proses'] == 'insert') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
        $kota = isset($_POST['kota']) ? $_POST['kota'] : '';

        if (!empty($penerbit)) {
            $insert_query = "INSERT INTO penerbit (penerbit,kota) 
                            VALUES ('$penerbit','$kota')";

            // Jalankan kueri
            $result = mysqli_query($db, $insert_query);

            if ($result) {
                echo "<script>
                alert('Data Penerbit Berhasil Ditambah');
                document.location='index.php?page=penerbit';
            </script>";
                exit; // Pastikan untuk keluar setelah mengarahkan pengguna
            } else {
                echo "<script>
                alert('Data Penerbit Gagal Ditambah');
                document.location='index.php?page=penerbit';
            </script>";
            }
        } else {
            echo "<script>
                alert('Nama Penerbit tidak boleh kosong');
                document.location='index.php?page=penerbit';
            </script>";
        }
    }
}

if (isset($_POST['ubahPenerbit'])) {

    //persiapan ubah data
    $ubahPenerbit = mysqli_query($db, "UPDATE penerbit
     SET 
        penerbit = '$_POST[penerbit]' WHERE id_penerbit = '$_POST[id_penerbit]'");

     //jika ubah sukses
    if ($ubahPenerbit) {
        echo "<script>
                alert('Data Penerbit Berhasil Diubah');
                document.location='index.php?page=penerbit';
            </script>";
        
    } else {
        echo "<script>
                alert('Data Penerbit Gagal Diupdate');
                document.location='index.php?page=penerbit';
            </script>";
    }

}  

if (isset($_GET['proses']) && $_GET['proses'] == 'delete') {
    if (isset($_GET['id_penerbit'])) {
        $id_penerbit = $_GET['id_penerbit'];
        $delete_query = "DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'";

        if ($db->query($delete_query) === TRUE) {
            header("Location: index.php?page=penerbit");
            exit;
        } else {
            echo "Error deleting record: " . $db->error;
        }
    }
}

?>