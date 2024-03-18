<?php
include 'koneksi.php';

if (isset($_GET['proses']) && $_GET['proses'] == 'insert' && $_SERVER["REQUEST_METHOD"] == "POST") {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $register_date = date("Y-m-d", strtotime($_POST["register_date"]));
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $level = isset($_POST['level']) ? $_POST['level'] : "";
    
    $insert_query = "INSERT INTO member (nim, nama, email, register_date, alamat, prodi, level) 
                    VALUES ('$nim', '$nama', '$email', '$register_date', '$alamat', '$prodi', '$level')";

    if ($db->query($insert_query) === TRUE) {
        echo "<script>
            alert('Data Member Berhasil Ditambah');
            window.location='index.php?page=member';
        </script>";
        exit;
    } else {
        echo "<script>
        alert('Data Member Gagal Ditambah');
        document.location='index.php?page=member';
    </script>";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitEdit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $register_date = $_POST['register_date'];
    $alamat = $_POST['alamat'];
    $prodi = $_POST['prodi'];
    $level = $_POST['level'];

    // Validate input if needed
    // ...
    //dd($query);
    // Update data in the database
    $query = "UPDATE member SET nama='$nama', email='$email', register_date='$register_date', alamat='$alamat', prodi='$prodi', level='$level' WHERE nim='$nim'";

    if ($db->query($query)) {
        echo "<script>
            alert('Data Member Berhasil Diupdate');
            window.location='index.php?page=member';
        </script>";
        exit();
    } else {
        echo "<script>
            alert('Data Member Gagal Diupdate');
            window.location='index.php?page=member';
        </script>";
    }
}



if (isset($_GET['proses']) && $_GET['proses'] == 'delete') {
    if (isset($_GET['nim'])) {
        $nim = $_GET['nim'];
        $delete_query = "DELETE FROM member WHERE nim='$nim'";

        if ($db->query($delete_query) === TRUE) {
            echo "<script>
            alert('Data Member Berhasil Dihapus');
            window.location='index.php?page=member';
        </script>";
        exit();
        } else {
            die("Error deleting record: " . $db->error);
        }
    }
}
?>