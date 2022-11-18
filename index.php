<?php
    session_start();
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");
    $tgl_sekarang   = date('Y-m-d');
    $besok = "1";
    $tgl_berikutnya = date('Y-m-d', strtotime('+'.$besok .'days', strtotime($tgl_sekarang)));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CariHotel.com</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <div class="properti-header">
    <a style="padding-right:30px;" href="halaman-properti.php">daftar kan properti anda</a><a href="#">pusat bantuan</a>
    </div>
<div class="header">
        <div class="navigation">
        <a href="#" class="nav-logo">CariHotel.com</a>
     
        <nav class="navbar">
            <ul>
            <li><a href="#">hotel</a> </li>
                <li><a href="#">sewa mobil</a> </li>
                <li><a href="#">wisata</a></li>
                <?php   
                    if(!isset($_SESSION['status_login'])){
                        echo  '<li class="rgst"><a href="login-akun.php">login</a></li>
                        <li class="rgst"><a href="buat-akun.php">register</a></li>';
                        }else{
                            echo " <li class='rgst'><a href=''>". substr($_SESSION['unama'], 0,7) ." </a></li>";
                            echo  '<li class="rgst"><a href="booking.php">booking</a></li>';
                            echo  '<li class="rgst"><a href="logout.php">logg out</a></li>';
                        
                    }
                ?>
                
            </ul>
        </nav>
        </div>
        </div>
        <?php 
                        if(isset($_GET['msg'])){
                            echo "<div class='alert alert-sukses'>akun berhasil dibuat</div>";
                        }
                    ?>
        

        <div class="container-img">
            <div class="content-slide">
                <div class="imgslide fade">
                <img src="uploads/tambahan/tiket.png" alt="">
                </div>

                <div class="imgslide fade">
                <img src="uploads/tambahan/tiket2.png" alt="">
                </div>

                <div class="imgslide fade">
                <img src="uploads/tambahan/tiket3.png" alt="">
                </div>
              
            </div>
            <a class="prev" onClick="nextslide(-1)">&#10094</a>
                <a class="next" onClick="nextslide(1)">&#10095</a>
        </div>

        <section class="home">
            <div class="booking">
                <div class="box-header">
                    <span><i class="fas fa-bed"></i></span>
                    <h2>Booking Hotel Murah Online dengan Harga Promo</h2>
                </div>

                <div class="box-body">
                    <div class="body-loc">
                        <form action="cari-hotel.php" method="get">
                        <label for="">tujuan</label>
                        <select class="form-control" name="lokasi">
                        <option selected>Pilih lokasi</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Bali">Bali</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Lombok">Lombok</option>
                            <option value="Malang">malang</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Denpasar">Denpasar</option>
                        </select>
                    </div>
                    <div class="body-check">
                        <div class="form-group">
                            <label for="">Check-In</label>
                            <input type="date" name="checkin" value="<?= $tgl_sekarang ?>" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Check-Out</label>
                            <input type="date" value="<?= $tgl_berikutnya ?>" name="checkout" class="form-control">
                        </div>
                    </div>
                    <div class="body-kamar">
                        <label for="">kamar dan tamu</label>
                        <div class="form-kamar">
                        <span>kamar</span><input class="form-control" name="kamar" value="1" style="width: 40px;" type="number">
                        <span>tamu</span><input class="form-control" name="tamu" type="number" value="1" style="width: 40px;">
                    </div>
                    </div>  
                </div>
                <div class="box-footer">
                    <input type="submit" name="submit" value="cari">
                </div>
                </form>
                <?php
                    if(isset($_GET['submit'])){
                        header("Location: cari-hotel.php");
                    }
                ?>
            </div>
        </section>

        <h1 style="text-align: center; padding-bottom:100px;">masih dalam proses pengerjaan</h1>
        <script src="assets/js/script.js">
        </script>
</body>
</html>