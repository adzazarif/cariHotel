<?php
    include '../koneksi.php';
    session_start();
?>
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
            <p>Login</p>
        </div>

        <div class="box-body">
            <form action="" method="POST">
            <p>Bergabung dengan gaya travel masa kini dengan banyak keuntungan</p>

        <div class="form-group">
            <input type="email" autofocus autocomplete="off" name="username" placeholder="email" class="input-control">
        </div>
        <div class="form-group">
            <input type="password" name="pass" placeholder="password" class="input-control">
        </div>
            <input type="submit" name="submit" class="btn">
    </form>
    <?php
            if(isset($_POST['submit'])){
                $user =  mysqli_real_escape_string($conn, $_POST['username']);
                $pass =  mysqli_real_escape_string($conn, $_POST['pass']);

                $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '".$user."'");
                if(mysqli_num_rows($cek) > 0){
                    $p = mysqli_fetch_object($cek);
                    if(md5($pass)  == $p->password){
                        $_SESSION['status_login_admin'] = true;
                        $_SESSION['uname'] = $p->nama;
                        $_SESSION['uid'] = $p->id;
                        $_SESSION['ulevel'] = $p->level;
                        
                        header("location: index.php");

                    }else{
                        echo '<div class="alert alert-eror">Password Salah</div>';
                    }
                    
                }else{
                    echo '<div class="alert alert-eror">Username Belum Terdaftar</div>';
                }
            }
        ?>
    </div>
        <div class="box-footer">
            <p>belum punya akun?<a href="buat-akun.php">DAFTAR</a></p>
        </div>
    </div>
    </div>

   
    
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
