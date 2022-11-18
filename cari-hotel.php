<?php
    include 'koneksi.php';
    session_start();
    error_reporting(0);

    $loc = $_GET['lokasi'];
    $in = $_GET['checkin'];
    $out = $_GET['checkout'];
    $kamar = $_GET['kamar'];
    $tamu = $_GET['tamu'];

                    
    
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

        <div class="header-input">
            
            <div class="header-loc">
                <form action="" method="GET">
                <label for="">tujuan</label>
                <select class="form-control" name="lokasi">
                    <option selected><?= $loc ?></option>

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
            <div class="header-check">
                <div class="form-group">
                    <label for="">Check-In</label>
                    <input type="date"  name="checkin" value="<?= $in ?>" class="form-control">
                </div>
                <?php
                    $tanggalin = date_create($in) ;
                    $tanggalout = date_create($out);
                    $selisih = date_diff($tanggalin, $tanggalout) ;
                    // echo  $selisih->days."malam";
                ?>
                <div class="mlm">
                <i class="far fa-moon"><span>      </span><?= $selisih->days ?></i>
                    <p> malam</p>
                </div>
                
                <div class="form-group">
                    <label for="">Check-Out</label>
                    <input type="date"  name="checkout" value="<?= $out ?>" class="form-control">
                </div>
            </div>
            <div class="header-kamar">
                <label for="">kamar dan tamu</label>
                <div class="form-kamar">
                <span>kamar</span><input name="kamar" class="form-control" value="<?= $kamar ?>" style="width: 40px;" type="number">
                <span>tamu</span><input class="form-control" name="tamu" type="number" value="<?= $tamu ?>" style="width: 40px;">
            </div>
            </div>
            <div class="btn-search">
                <input type="submit" value="cari" class="search-btn" name="cari" id="">
            </div>
            </form>

            
        </div>
    </div>

    <div class="search-hotel">
     <div class="data-hotel">
        <div class="container">
               <div class="recomend">
                   <h2>urutkan</h2>
                   <div class="menu-urutkan">
                       <p><i class="far fa-dot-circle"></i> Rekomendasi</p>
                       <p><i class="far fa-dot-circle"></i> Harga (termurah terlebih dahulu)</p>
                       <p><i class="far fa-dot-circle"></i> Harga (termahal terlebih dahulu)</p>
                       <p><i class="far fa-dot-circle"></i> Rating (tertinggi terlebih dahulu)</p>
                       <p><i class="far fa-dot-circle"></i> Bintang (tertinggi terlebih dahulu)</p>
                   </div>
                </div>
                
            <div class="box-pilih">

                <?php
                   $search = mysqli_query($conn, "SELECT * FROM hotel LEFT JOIN fasilitas USING (id) INNER JOIN foto_hotel USING (id) WHERE lokasi = '".$loc."'");
                    if(mysqli_num_rows($search) > 0){
                        while($c = mysqli_fetch_array($search)){
                ?>
          
          <form style="width:920px; " action="detail-hotel.php" method="GET" target="blank">
                    <input type="hidden" name="id" value="<?= $c['id_hotel'] ?>">
                    <input type="hidden" name="checkin" value="<?= $in ?>">
                    <input type="hidden" name="checkout" value="<?= $out ?>">
                    <input type="hidden" name="lama" value="<?= $selisih->days ?>">
                    <input type="hidden" name="kamar" value="<?= $kamar ?>">
                    <input type="hidden" name="tamu" value="<?= $tamu ?>">
                    
            <div class="box-hotel">
            <input type="submit" value=" " class="sbmt" name="hotel">
            </form>
                <img src="uploads/hotel/<?= $c['foto_1'] ?>" alt="">

                <div class="nama-hotel">
                    <h4><?= $c['nama_hotel'] ?></h4>
                    <div class="stars">
                    <p class="star">
                        <?php
                            if($c['bintang'] == 1){
                        ?>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($c['bintang'] == 2){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($c['bintang'] == 3){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($c['bintang'] == 4){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($c['bintang'] == 5){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>
                    </p>
                    <span class="dot"><i class="fas fa-circle"></i></span>
                    <span><?= substr($c['alamat'],0,35)  ?>...</span>
                    </div>  
                    
                    <p class="fac"><?= substr($c['fasilitas_umum'],0,100)?>...</p>
                </div>
                
                <div class="price">
                    <p class="harga">idr <span><?= $c['start_harga'] ?></span></p>
                    <p class="info-harga">per kamar permalam</p>
                </div>
            </div>
            <?php
                if(isset($_GET['hotel'])){
                    echo "<script>window.location = 'detail-hotel.php?id=<?= '".$c['id_hotel']."' ?>'</script>";
                }
            ?>
            
            
            <?php }}else{ ?>
                <div class="empty">
                    <p>hotel belum tersedia..coba cari di lokasi lain</p>
                </div>
            <?php } ?>
            
            
        </div>
        </div>
     </div>
     </div>
</body>
</html>