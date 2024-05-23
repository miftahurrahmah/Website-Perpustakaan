
<?php 
include 'koneksi.php';

// Process Insert

if (isset($_GET['proses']) && $_GET['proses'] == 'insert') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_kategori = isset($_POST['nama_kategori']) ? $_POST['nama_kategori'] : '';

        if (!empty($nama_kategori)) {
            $insert_query = "INSERT INTO kategori (nama_kategori) 
                            VALUES ('$nama_kategori')";

            // Jalankan kueri
            $result = mysqli_query($db, $insert_query);

            if ($result) {
                echo "<script>
                alert('Data Kategori Berhasil Ditambah');
                document.location='index.php?page=kategori';
            </script>";
                exit; // Pastikan untuk keluar setelah mengarahkan pengguna
            } else {
                echo "<script>
                alert('Data Kategori Gagal Ditambah');
                document.location='index.php?page=kategori';
            </script>";
            }
        } else {
            echo "<script>
                alert('Nama Kategori tidak boleh kosong');
                document.location='index.php?page=kategori';
            </script>";
        }
    }
}

if (isset($_POST['ubahKategori'])) {

    //persiapan ubah data
    $ubahKategori = mysqli_query($db, "UPDATE kategori
     SET 
        nama_kategori = '$_POST[nama_kategori]' WHERE id_kategori = '$_POST[id_kategori]'");

     //jika ubah sukses
    if ($ubahKategori) {
        echo "<script>
                alert('Data Kategori Berhasil Diubah');
                document.location='index.php?page=kategori';
            </script>";
        
    } else {
        echo "<script>
                alert('Data Kategori Gagal Diupdate');
                document.location='index.php?page=kategori';
            </script>";
    }

}  

if (isset($_GET['proses']) && $_GET['proses'] == 'delete') {
    if (isset($_GET['id_kategori'])) {
        $id_kategori = $_GET['id_kategori'];
        $delete_query = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";

        if ($db->query($delete_query) === TRUE) {
            header("Location: index.php?page=kategori");
            exit;
        } else {
            echo "Error deleting record: " . $db->error;
        }
    }
}

?>