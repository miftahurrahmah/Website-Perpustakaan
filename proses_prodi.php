
<?php 
include 'koneksi.php';

// Process Insert


if (isset($_GET['proses']) && $_GET['proses'] == 'insert') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $nama_prodi = isset($_POST['nama_prodi']) ? mysqli_real_escape_string($db, $_POST['nama_prodi']) : '';
        $jurusan = isset($_POST['jurusan']) ? mysqli_real_escape_string($db, $_POST['jurusan']) : '';

        if (!empty($nama_prodi)) {
            
            $insert_query = "INSERT INTO prodi (nama_prodi, jurusan) VALUES ('$nama_prodi','$jurusan')";
            $result = mysqli_query($db, $insert_query);

            if ($result) {
                echo "<script>
                    alert('Data Prodi Berhasil Ditambah');
                    document.location='index.php?page=prodi';
                </script>";
                exit; // Pastikan untuk keluar setelah mengarahkan pengguna
            } else {
                echo "<script>
                    alert('Data Prodi Gagal Ditambah');
                    document.location='index.php?page=prodi';
                </script>";
            }
        } else {
            echo "<script>
                alert('Nama Prodi tidak boleh kosong');
                document.location='index.php?page=prodi';
            </script>";
        }
    }
}

if (isset($_POST['ubahProdi'])) {
    // Persiapan ubah data
    $nama_prodi = mysqli_real_escape_string($db, $_POST['nama_prodi']);
    $jurusan = mysqli_real_escape_string($db, $_POST['jurusan']);
    $id_prodi = mysqli_real_escape_string($db, $_POST['id_prodi']);

    // Query SQL dengan prepared statement
    $ubahProdi = mysqli_query($db, "UPDATE prodi
        SET 
            nama_prodi = '$nama_prodi', 
            jurusan = '$jurusan' 
        WHERE id_prodi = '$id_prodi'");

    // Jika ubah sukses
    if ($ubahProdi) {
        echo "<script>
                alert('Data Prodi Berhasil Diubah');
                document.location='index.php?page=prodi';
            </script>";
    } else {
        echo "<script>
                alert('Data Prodi Gagal Diubah');
                document.location='index.php?page=prodi';
            </script>";
    }
}



if (isset($_GET['proses']) && $_GET['proses'] == 'delete') {
    if (isset($_GET['id_prodi'])) {
        $id_prodi = $_GET['id_prodi'];
        $delete_query = "DELETE FROM prodi WHERE id_prodi='$id_prodi'";

        if ($db->query($delete_query) === TRUE) {
            header("Location: index.php?page=prodi");
            exit;
        } else {
            echo "Error deleting record: " . $db->error;
        }
    }
}

     


?>