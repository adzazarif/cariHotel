<?php
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-color: #fff;">
    
    <div class="page-register">
    <h1>CariHotel.com</h1>
    <?php
            if(isset($_POST['submit'])){
                $nama = htmlspecialchars($_POST['nama']);
                $nmr = htmlspecialchars($_POST['nmr-telp']);
                $email = htmlspecialchars($_POST['email']);
                $alamat = htmlspecialchars($_POST['alamat']);
                $pass = htmlspecialchars($_POST['pass']);
                $pass2 = htmlspecialchars($_POST['pass2']);

                $cek = mysqli_query($conn, "SELECT email FROM pelanggan WHERE email = '".$email."' ");
                if(mysqli_num_rows($cek) > 0){
                 echo '<div class="alert alert-eror">Email Telah Digunakan</div>';
                }elseif($pass == $pass2){
                    $tambah = mysqli_query($conn, "INSERT INTO pelanggan VALUES(
                        NULL,
                        '".$nama."' ,
                        '".$nmr."' ,
                        '".$alamat."' ,
                        '".$email."' ,
                        '".md5($pass)."' 
                    )");

                    if($tambah){
                        echo "<script>window.location='index.php?msg=akun berhasil dibuat'</script>";
                    }else{
                        echo "akun gagal dibuat",mysqli_error($conn);
                    }
                   
                }else{
                    echo '<div class="alert alert-eror">Password tidak sama</div>';
                }
            }
            
    ?>
    <div class="register">

        <form action="" method="POST">
            <h2>Daftar</h2>
            <p>Perjalanan serumu dimulai di sini.</p>
            <div class="form-group">
                <label for="">nama</label>
                <input type="text" name="nama" autofocus autocomplete="off" class="input-edit">
            </div>

            <div class="form-group">
                <label for="">nomor telepon</label>
                <input type="number" name="nmr-telp" autocomplete="off" class="input-edit">
            </div>

            <div class="form-group">
                <label for="">alamat</label>
                <input type="text" autocomplete="off" name="alamat" class="input-edit">
            </div>

            <div class="form-group">
                <label for="">email</label>
                <input type="email" name="email" autocomplete="off" class="input-edit">
            </div>

            <div class="form-group">
                <label for="">password</label>
                <input type="password" name="pass" class="input-edit">
            </div>
            <div class="form-group">
                <label for="">ulangi password</label>
                <input type="password" name="pass2" class="input-edit">
            </div>
            <input type="submit" name="submit" class="btn">
        </form>

        <img src="uploads/tambahan/rgstr.png" alt="">
     
    </div>
</div>

</body>
</html>