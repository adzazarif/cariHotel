<?php
        include 'koneksi.php';
        session_start();
        
        if(!isset($_SESSION['status_login'])){
            header("Location: login-akun.php");
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="header">
        <div class="navigation">
        <a href="index.php" class="nav-logo">CariHotel.com</a>
        <div class="langkah">
            <p>
                <span >1. Order</span>><span  >2. Payment</span>><span class="active">3. Complete</span>
            </p>
        </div>
        </div>
        </div>
        
        <?php
             $cek = mysqli_query($conn, "SELECT status FROM status_bayar WHERE order_id = '".$_GET['id']."'");
             $q = mysqli_fetch_array($cek);
             
             if($q['status'] == 'pending'){
                 echo '<div class="alert alert-info" role="alert">
                <h2>menunggu konfirmasi dari pihak hotel!</h2>
               </div>';
             }elseif($q['status'] == 'lunas'){
                 echo '<div class="alert alert-success" role="alert">
                 silahkan Screenshot / cetak voucher hotel tersebut! <a href="tiket.php?idorder='.$_GET['id'].'">tiket</a>
               </div>';
             }
        ?>
        <section class="pay">
        <div class="complet">
            <h2>informasi</h2>
            <ul>
                <li>1. jika anda pesan tidak di jam kerja hotel maka konfirmasi anda agak lambat</li>
                <li>2. jika 24 jam tidak di konfimasi silahkan email atau telepon ke nomor hotel yang sudah tersedia di info hotel</li>
                <li>3. kalo sudah di konfirmasi hotel silahkan Screnshoot / Cetak voucher hotel..tunjukan voucher ke resepsionis hotel</li>
                <li>4. jika hotel tidak mengkonfirmasi sama sekali silahkan laporkan ke admin di <a href="">SUPPORT ADMIN</a>.biar admin bisa menindak lanjuti masalah nya</li>
                <li>5. tekan tombol selesai jika ingin ke halaman beranda..jangan khawatir gagal..data pesanan anda sudah tersimpan dan masuk di bagian booking</li>
            </ul>
        </div>
        <button class="button-psn ful"><a href="index.php">Selesai,kemabali ke menu utama</a></button>
        </section>

        
</body>
</html>