<?php
    session_start();
    require 'koneksi.php';
    
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
      
        $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password'";

        $result = $db->query($sql);
        $data=$result->fetch_assoc();
       
        if ($result->num_rows > 0) {
            $_SESSION['nama'] = $nama;
            $_SESSION['login'] = TRUE;
            $_SESSION['level'] = $data['level'];
           header("Location: index.php?page=dashboard");
        }else {
            echo "Login Gagal";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEKNOLOGI INFORMASI</title>
    <link rel="stylesheet" href="layout.css">
</head>
<body>
    <div class="wrapper active-popup">
        <span class="icon-close">
            <ion-icon name="close"></ion-icon>
        </span>
        <div class="form-box login">
            <div class="logo">
                <img src="favicon.png">
            </div>
            <Label><h1>Login</h1></Label>
            <form action="#" method="POST">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input name="username" id="username" type="text">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password">
                    <label>Password</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100 py-2 fs-4 mb-4 rounded-2">Login</button>
            </form>
        </div>
    </div>

    <div class="container mt-1">
      <?php
      $p = isset($_GET['page']) ? $_GET['page'] : '';
    
      if ($p == 'login') {
        include 'login.php';
      }

      ?>
    </div>

    <script src="footer.html"></script>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
