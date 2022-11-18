<?php
    session_start();
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");

    $bank = mysqli_query($conn, "SELECT * FROM bank_hotel WHERE id = '".$_GET['idhotel']."'");
    if(mysqli_num_rows($bank) == 0){
        header("Location: booking.php");
    }
    $b = mysqli_fetch_object($bank);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

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
                            echo  '<li class="rgst"><a href="booking.php">booking</a></li>';
                            echo " <li class='rgst'><a href=''>". $_SESSION['unama']." </a></li>";
                            echo  '<li class="rgst"><a href="logout.php">logg out</a></li>';
                        
                    }
                ?>
                
            </ul>
        </nav>
        </div>
        </div>

        <section class="pay">
            <p>silahkan transfer uang sesuai nominal total bayar ke salah satu rekening di bawah ini</p>
            <div class="bayar">
                <div class="box">
                    <img src="uploads/tambahan/bri.gif" alt="">
                    <table class="garis-no">

                            <tr>
                                <th>no rekening:</th>
                                <th><?= $b->no_bri ?></th>
                            </tr>
                            <tr>
                                <th>atas nama:</th>
                                <th><?= $b->nama_bri ?></th>
                            </tr>

                    </table>
                </div>

                <div class="box">
                    <img src="uploads/tambahan/bni.jpg" alt="">
                    <table class="garis-no">

                            <tr>
                                <th>no rekening:</th>
                                <th><?= $b->no_bni ?></th>
                            </tr>
                            <tr>
                                <th>atas nama:</th>
                                <th><?= $b->nama_bni ?></th>
                            </tr>

                    </table>
                </div>

                <div class="box">
                    <img src="uploads/tambahan/bca.jpg" alt="">
                    <table class="garis-no">

                            <tr>
                                <th>no rekening:</th>
                                <th><?= $b->no_bca ?></th>
                            </tr>
                            <tr>
                                <th>atas nama:</th>
                                <th><?= $b->nama_bca ?></th>
                            </tr>

                    </table>
                </div>

                <div class="box">
                    <img src="uploads/tambahan/mandiri.jpg" alt="">
                    <table class="garis-no">

                            <tr>
                                <th>no rekening:</th>
                                <th><?= $b->no_mandiri ?></th>
                            </tr>
                            <tr>
                                <th>atas nama:</th>
                                <th><?= $b->nama_mandiri ?></th>
                            </tr>

                    </table>
                </div>
            </div>
        </section>
</body>
</html>