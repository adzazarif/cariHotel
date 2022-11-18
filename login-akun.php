<?php
    include 'koneksi.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buat akun</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<header>

    <div class="register">

    <div class="box-register">
        <div class="box-header">
            <h1>CariHotel.com</h1>
            <p>Login</p>
        </div>

        <div class="box-body">
            <form action="" method="POST">
            <p>Bergabung dengan gaya travel masa kini dengan banyak keuntungan</p>

        <div class="form-group">
            <input type="email" autocomplete="off" autofocus name="email" placeholder="email" class="input-control">
        </div>
        <div class="form-group">
            <input type="password" name="pass" placeholder="password" class="input-control">
        </div>
            <input type="submit" name="submit" style="margin-bottom:10px" class="btn">
    </form>
    <?php
                if(isset($_POST['submit'])){
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                    $cek = mysqli_query($conn, "SELECT * FROM pelanggan WHERE email = '".$email."'");
                    if(mysqli_num_rows($cek) > 0){
                        $p = mysqli_fetch_object($cek);
                        if(md5($pass) == $p->password){
                            
                            $_SESSION['status_login'] = true;
                            $_SESSION["unama"] = $p->nama;
                            $_SESSION['id'] = $p->id_pelanggan;

                            header("Location: index.php");
                        }else{
                            echo '<div class="alert alert-eror">Password salah</div>';
                        }
                    }else{
                        echo '<div class="alert alert-eror">email anda belum terdaftar</div>';
                    }
                }
            ?>
    </div>
        <div class="box-footer">
            <p>belum punya akun?<a href="">DAFTAR</a></p>
        </div>
    </div>
    <img src="uploads/tambahan/rgstr.png" alt="">
    </div>
   
    
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>

