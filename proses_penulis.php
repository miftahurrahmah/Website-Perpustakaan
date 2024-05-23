
<?php 
include 'koneksi.php';

// Process Insert

if (isset($_GET['proses']) && $_GET['proses'] == 'insert') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_penulis = isset($_POST['nama_penulis']) ? $_POST['nama_penulis'] : '';

        if (!empty($nama_penulis)) {
            $insert_query = "INSERT INTO penulis (nama_penulis) 
                            VALUES ('$nama_penulis')";

            // Jalankan kueri
            $result = mysqli_query($db, $insert_query);

            if ($result) {
                echo "<script>
                alert('Data Penulis Berhasil Ditambah');
                document.location='index.php?page=penulis';
            </script>";
                exit; // Pastikan untuk keluar setelah mengarahkan pengguna
            } else {
                echo "<script>
                alert('Data Penulis Gagal Ditambah');
                document.location='index.php?page=penulis';
            </script>";
            }
        } else {
            echo "<script>
                alert('Nama Penulis tidak boleh kosong');
                document.location='index.php?page=penulis';
            </script>";
        }
    }
}

if (isset($_POST['ubahPenulis'])) {

    //persiapan ubah data
    $ubahPenulis = mysqli_query($db, "UPDATE penulis
     SET 
        nama_penulis = '$_POST[nama_penulis]' WHERE id_penulis = '$_POST[id_penulis]'");

     //jika ubah sukses
    if ($ubahPenulis) {
        echo "<script>
                alert('Data Penulis Berhasil Diubah');
                document.location='index.php?page=penulis';
            </script>";
        
    } else {
        echo "<script>
                alert('Data Penulis Gagal Diupdate');
                document.location='index.php?page=penulis';
            </script>";
    }

}  

if (isset($_GET['proses']) && $_GET['proses'] == 'delete') {
    if (isset($_GET['id_penulis'])) {
        $id_penulis = $_GET['id_penulis'];
        $delete_query = "DELETE FROM penulis WHERE id_penulis='$id_penulis'";

        if ($db->query($delete_query) === TRUE) {
            header("Location: index.php?page=penulis");
            exit;
        } else {
            echo "Error deleting record: " . $db->error;
        }
    }
}

?>