<?php
    session_start();
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");

    if(!(isset($_SESSION['status_login']))){
        header("Location: index.php");
    }
   
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

        <section>
        <?php 
      
      if(isset($_GET['msg'])){
    
            echo "<div class='alert alert-info'>
            ".$_GET['msg'].";
            </div>";
        }    

        if(isset($_GET['mssg'])){
    
            echo "<div class='alert alert-info'>
            ".$_GET['mssg'].";
            </div>";
        }    
?>
            <h1 class="judul-booking">bookingan</h1>
            <table class="tabel-booking">
                <thead>
                <tr>
                    <th>no booking</th>
                    <th>hotel</th>
                    <th>tipe kamar</th>
                    <th>tanggal kedatangan</th>
                    <th>tanggal keluar</th>
                    <th>total</th>
                    <th>status</th>
                    <th>aksi</th>            
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                        $pay = mysqli_query($conn, "SELECT * FROM reservasi LEFT JOIN hotel USING(id)  WHERE id_pelanggan = '".$_SESSION['id']."' ORDER BY id_reservasi DESC");
                        if(mysqli_num_rows($pay) > 0){
                            while($a = mysqli_fetch_array($pay)){
                                
                    ?>
                    <td><?= $a['order_id']?></td>
                    <td><?= $a['nama_hotel']?></td>
                    <td><?= $a['tipe_kamar']?></td>
                    <td><?= date('d F Y', strtotime($a['tgl_kedatangan'])) ?></td>
                    <td><?= date('d F Y', strtotime($a['tgl_keluar'])) ?></td>
                    <td><?= $a['pembayaran']?></td>
                    <td><?php
                        $order = $a['order_id'];
                        $cek = mysqli_query($conn, "SELECT status FROM status_bayar WHERE order_id = '".$order."'");
                        $q = mysqli_fetch_array($cek);
                        
                        if($q['status'] == 'belum lunas'){
                            echo "silahkan lunasi pembayaran kirim ke no rekening hotel";
                            echo "<br>";
                            echo '<a class="btn info" href="detail-bank.php?idhotel='.$a['id'].'" ">no rekening hotel</a>';   
                        }elseif($q['status'] == 'lunas'){
                            echo  "<h4>Lunas</h4>";
                            echo  "silahkan cetak atau screnshot bukti tiket";
                            echo "<br>";
                            echo '<a class="btn succes"  href="tiket.php?idorder='.$a['order_id'].'" ">tiket</a';
                        }elseif($q['status'] == 'pending'){
                            echo  "<h4>Pending</h4>";
                            echo "menunggu konfirmasi pihak hotel";
                        }
                    ?></td>
                    <td>
                    <?php 


                        if($q['status'] == 'belum lunas'){
                            echo '<a class="btn warning" href="konfirmasi-bayar.php?idorder='.$a['order_id'].'" ">konfirmasi pembayaran</a>';
                        }elseif($q['status'] == 'lunas'){
                            echo '<a class="btn info" href="detail-konfirmasi.php?idorder='.$a['order_id'].'" ">detail pembayaran</a>';
                            echo '<br>';
                            echo '<a class="btn warning" href="edit-konfirmasi.php?idorder='.$a['order_id'].'" ">edit konfirmasi</a>';
                        }elseif($q['status'] == 'pending'){
                            echo '<a class="btn info" href="detail-konfirmasi.php?idorder='.$a['order_id'].'" ">detail pembayaran</a>';
                            echo '<br>';
                            echo '<a class="btn warning" href="edit-konfirmasi.php?idorder='.$a['order_id'].'" ">edit konfirmasi</a>';
                            
                            
                        }
                    ?>
                    </td>
                </tr>
                <?php }}else{ ?>
                    <td><h1>belum ada pemesanan</h1></td>

                    <?php } ?>
                </tbody>
            </table>
        </section>
</body>
</html>