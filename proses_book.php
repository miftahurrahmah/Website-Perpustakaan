
<?php 
include 'koneksi.php';

// Process Insert
if ($_GET['proses'] == 'insert') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kode_buku = $_POST['kode_buku'];
        $judul_buku = $_POST['judul_buku'];
        $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : "";
        $penulis = isset($_POST['penulis']) ? $_POST['penulis'] : "";
        $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : "";
        $tahun_terbit = $_POST['tahun_terbit'];
        $sinopsis = $_POST['sinopsis'];
        $stok = $_POST['stok'];

        $direktori = "berkas/";

        // unggah foto
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $file_name = basename($_FILES['foto']['name']);
            $file_path = $direktori . $file_name;

            // Gunakan parameterized query untuk mencegah SQL injection
            $insert_query = "INSERT INTO buku (kode_buku, foto, judul_buku, kategori, penulis, penerbit, tahun_terbit, sinopsis, stok) 
            VALUES ('$kode_buku', '$file_name', '$judul_buku', '$kategori', '$penulis', '$penerbit', '$tahun_terbit', '$sinopsis', '$stok')";

            // Eksekusi query
            $result = mysqli_query($db, $insert_query);

            // Handle errors
            if (!$result) {
                echo "<script>
                alert('Error: " . mysqli_error($db) . "');
                document.location='index.php?page=buku';
                </script>";
                exit;
            }

            echo "<script>
            alert('Data Buku Berhasil Ditambah');
            document.location='index.php?page=buku';
            </script>";
        exit; 
    }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $kode_buku = $_POST['kode_buku'];
            $judul_buku = $_POST['judul_buku'];
            $kategori = $_POST['kategori'];
            $penulis = $_POST['penulis'];
            $penerbit = $_POST['penerbit'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $sinopsis = $_POST['sinopsis'];
            $stok = $_POST['stok'];
    
            // Initialize the variable for the file name
            $file_name = '';
    
            if (isset($_FILES['foto']['tmp_name']) && !empty($_FILES['foto']['tmp_name'])) {
                $folder_path = "berkas/";
                $file_name = $_FILES['foto']['name'];
                $file_path = $_FILES['foto']['tmp_name'];
                $gambar_path = $folder_path . $file_name;
    
                if (move_uploaded_file($file_path, $gambar_path)) {
                    $query = "UPDATE buku SET kode_buku=?, judul_buku=?, foto=?, kategori=?, penulis=?, penerbit=?, tahun_terbit=?, sinopsis=?, stok=? WHERE id=?";
                    $stmtUpdate->bind_param("sssssssssi", $kode_buku, $judul_buku, $file_name, $kategori, $penulis, $penerbit, $tahun_terbit, $sinopsis, $stok, $id);
    
                    if (!$stmtUpdate) {
                        die("Error in query preparation: " . $db->error);
                    }
    
                    $stmtUpdate->bind_param("ssssssssss", $kode_buku, $judul_buku, $file_name, $kategori, $penulis, $penerbit, $tahun_terbit, $sinopsis, $stok, $id);
    
                    if ($stmtUpdate->execute()) {
                        echo "<script>
                                alert('Data Buku Berhasil DiUpdate');
                                document.location='index.php?page=buku';
                            </script>";
                        exit();
                    } else {
                        echo "<script>
                            alert('Data Buku Gagal Diupdate');
                            document.location='index.php?page=buku';
                        </script>";
                    }
    
                    $stmtUpdate->close();
                } else {
                    echo "<script>
                    alert('Gagal Mengupload Foto Sampul');
                    document.location='index.php?page=buku';
                </script>";
                    exit;
                }
            } else {
                $query = "UPDATE buku SET kode_buku=?, judul_buku=?, kategori=?, penulis=?, penerbit=?, tahun_terbit=?, sinopsis=?, stok=? WHERE id=?";
                $stmtUpdate = $db->prepare($query);
    
                if (!$stmtUpdate) {
                    die("Error in query preparation: " . $db->error);
                }
    
                $stmtUpdate->bind_param("ssssssssi", $kode_buku, $judul_buku, $kategori, $penulis, $penerbit, $tahun_terbit, $sinopsis, $stok, $id);
    
                if ($stmtUpdate->execute()) {
                    echo "<script>
                        alert('Data Buku Berhasil Diupdate');
                        document.location='index.php?page=buku';
                    </script>";
                    exit();
                } else {
                    echo "Data Gagal Diupdate" . $stmtUpdate->error;
                }
    
                $stmtUpdate->close();
            }
        }
    }






if (isset($_GET['proses']) && $_GET['proses'] == 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $delete_query = "DELETE FROM buku WHERE id='$id'";

        if ($db->query($delete_query) === TRUE) {
            echo "<script>
            alert('Data Buku Berhasil Dihapus');
            document.location='index.php?page=buku';
        </script>";
        exit();
        } else {
            echo "Error deleting record: " . $db->error;
        }
    }
}

?>