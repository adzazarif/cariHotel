<?php
    include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buat akun</title>
    <link rel="stylesheet" href="../assets/css/properti.css">
</head>
<body>
<header>
        <h1>CariHotel.com</h1>

        <nav>
            <ul>
                <li class="login"><a href="">Login</a></li>
                <li class="daftar"><a href="admin/buat-akun.php">daftar</a></li>
            </ul>
        </nav>
    </header>

    <div class="register">
    <img src="../uploads/tambahan/rgstr1.png" alt="">

    <div class="box-register">
        <div class="box-header">
            <h1>CariHotel.com</h1>
            <p>perjalanan menarik anda dimulai sekarang</p>
        </div>

        <div class="box-body">
            <form action="" method="POST">
            <p>buat akun anda</p>
        <div class="form-group">
            <input type="text" autocomplete="off" autofocus placeholder="nama lengkap" name="nama" class="input-control">
        </div>
        <div class="form-group">
            <input type="email" autocomplete="off" name="username" placeholder="email" class="input-control">
        </div>
        <div class="form-group">
            <input type="password" name="pass" placeholder="password" class="input-control">
        </div>

        <input type="hidden" name="level" value="User">
            <input type="submit" name="submit" class="btn">
    </form>
    <?php
            if(isset($_POST['submit'])){
                $nama = $_POST['nama'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];
                $level = $_POST['level'];

                $cek = mysqli_query($conn, "SELECT username FROM admin WHERE username = '".$username."' ");
                           if(mysqli_num_rows($cek) > 0){
                            echo '<div class="alert alert-eror">Username Telah Digunakan</div>';
                           }else{

                $tambah = mysqli_query($conn, "INSERT INTO admin VALUES(
                    NULL,
                    '".$nama."',
                    '".$username."',
                    '".md5($pass)."',
                    '".$level."'
                )");

                if($tambah){
                    echo "<script>window.location = '../halaman-properti.php?msg=akun berhasil dibuat'</script>";
                }else{
                    echo "data gagal ditaambahkan", mysqli_error($conn);
                }
            }
            }
        ?>
    </div>
        <div class="box-footer">
            <p>sudah punya akun?<a href="login.php">LOG IN</a></p>
        </div>
    </div>
    </div>


       
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>