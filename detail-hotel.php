<?php
    include 'koneksi.php';
    session_start();

    $in = $_GET['checkin'];
    $out = $_GET['checkout'];
    $kamar = $_GET['kamar'];
    $kl =  date_create($in);
    $tamu = $_GET['tamu'];
    $lama = $_GET['lama'];

    $detail = mysqli_query($conn, "SELECT * FROM hotel INNER JOIN fasilitas USING (id) LEFT JOIN foto_hotel USING (id) WHERE id_hotel = '".$_GET['id']."' ");
    if(mysqli_num_rows($detail) == 0){
        header("Location: cari-hotel.php");
    }
    $d = mysqli_fetch_object($detail);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $d->nama_hotel ?></title>
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

<!-- <p><?= $d->fasilitas_populer ?></p> -->
        <div class="input-hotel"> 
                <a href="">info umum</a>
                <a href="#gmaps">lokasi</a>
                <a href="#kamar">kamar</a>
                <a href="#fasilitas">fasilitas</a>
                <a href="">review</a>
        </div>
    </div>
    <section>
    <div class="hotel-header">
        <div class="header-input">
            <div class="header-loc">
                <label for="">tujuan</label>
                <select class="form-control" name="lokasi">
                    <option selected><?= $d->nama_hotel ?></option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Bali">Bali</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="lombok">lombok</option>
                    <option value="Malang">malang</option>
                    <option value="surabaya">surabaya</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                    <option value="surabaya">surabaya</option>
                </select>
            </div>
            <div class="header-check">
                <div class="form-group">
                    <label for="">Check-In</label>
                    <input type="date" value="<?= $in ?>" class="form-control">
                </div>
                <?php
                    $tanggalin = date_create($in) ;
                    $tanggalout = date_create($out);
                    $selisih = date_diff($tanggalin, $tanggalout) ;
                    // echo  $selisih->days."malam";
                ?>
                <div class="mlm">
                <i class="far fa-moon"><span></span><?= $selisih->days ?></i>
                    <p> malam</p>
                </div>
                <div class="form-group">
                    <label for="">Check-Out</label>
                    <input type="date" value="<?= $out ?>" class="form-control">
                </div>
            </div>
            <div class="header-kamar">
                <label for="">kamar dan tamu</label>
                <div class="form-kamar">
                <span>kamar</span><input class="form-control" value="<?= $kamar ?>" style="width: 40px;" type="number">
                <span>tamu</span><input class="form-control" type="number" value="<?= $tamu ?>" style="width: 40px;">
            </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="image">
        <div class="image-utama">
            <img src="uploads/hotel/<?= $d->foto_1 ?>" alt="">
            
        </div>

        <div class="image-kecil">
        <img src="uploads/hotel/<?= $d->foto_2 ?>" alt="">
        <img src="uploads/hotel/<?= $d->foto_3 ?>" alt="">
        <img src="uploads/hotel/<?= $d->foto_4 ?>" alt="">
        <img src="uploads/hotel/<?= $d->foto_5 ?>" alt="">
        </div>
    </div>
    <div class="informasi">
        <div class="informasi-nama">
            <p>hotel</p>
            <h1><?= $d->nama_hotel ?></h1>
            <div class="stars">
            <p class="star">
                        <?php
                            if($d->bintang == 1){
                        ?>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($d->bintang == 2){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($d->bintang == 3){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($d->bintang == 4){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>

                        <?php
                            if($d->bintang == 5){
                        ?>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                        <?php } ?>
                    </p>
                <span class="dot"><i class="fas fa-circle"></i></span>
                <span><?= $d->lokasi ?></span>
                </div>
        </div>
        <div class="informasi-harga">
                <p class="start-price">Mulai dari</p>
                <p class="harga">idr <span><?= $d->start_harga ?></span> </p>
                <p class="info-harga">per kamar permalam</p>
                <a href="#">lihat kamar</a>
        </div>
    </div>
</section>
<section id="gmaps">
    <div class="gmaps">s
            <div class="addres">
                <h2>Lokasi</h2>
                <p><?= $d->alamat ?></p>
            </div>
            <div class="maps">
            <iframe src="<?= $d->google_maps ?>" width="750" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
    </div>
</section>
<section id="kamar" class="room">
    <?php
        $kamar = mysqli_query($conn, "SELECT * FROM hotel INNER JOIN kamar USING (id) WHERE id_hotel = '".$_GET['id']."'");

        if(mysqli_num_rows($kamar) > 0){
            while($k = mysqli_fetch_array($kamar)){

    ?>
    <div class="kamar">
        <img src="uploads/kamar/<?= $k['foto'] ?>" alt="">
        <div class="info-kamar">
            <div class="tipe-kamar">
                <h2><?= $k['tipe_kamar'] ?></h2>
                <p><?= substr($k['fasilitas_kamar'],0,100)  ?></p>
            </div>
            <div class="fasilitas">
                <p>• <?= $k['kasur'] ?></p>
                <p>• <?= $k['orang'] ?> orang</p>
                <p>• <?= $k['luas'] ?></p>
            </div>
        </div>
        <div class="price-kamar">
            <a href="detail-kamar.php?idkamar=<?= $k['id_kamar'] ?>">lihat detail</a>
            <p class="harga">IDR <?= $k['harga_permalam'] ?> </p>
            <p class="info-harga">per kamar permalam</p>
            <form action="detail-pemesanan.php" method="GET">
                <input type="hidden" name="id_hotel" value="<?= $d->id_hotel?>">
                <input type="hidden" name="id_kamar" value="<?= $k['id_kamar'] ?>">
                <input type="hidden" name="harga_kamar" value="<?= $k['harga_permalam'] ?>">
                <input type="hidden" name="kamar" value="<?php echo $_GET['kamar'] ?>">
                <input type="hidden" name="tamu" value="<?php echo $_GET['tamu'] ?>">
                <input type="hidden" name="checkin" value="<?= $in ?>">
                <input type="hidden" name="checkout" value="<?= $out ?>">
                <input type="hidden" name="lama" value="<?= $selisih->days ?>">
            <input type="submit" name="booking" class="pilih" value="pilih">
            </form>
            <?php
                if(isset($_GET['booking'])){
                   header("Location: detail-pemesanan.php");
                }
            ?>
        </div>
    </div>
    <?php }} ?>
</section>

<section id="fasilitas">
    <div class="fasilitas-hotel">
        <h2>Fasilitas</h2>
        <div class="box-fasilitas">
            <div class="jdl-fasilitas">
                <h3>fasilitas umum</h3>
            </div>
            <div class="isi-fasilitas">
                <p><?= $d->fasilitas_umum?></p>
            </div>
        </div>

        <div class="box-fasilitas">
            <div class="jdl-fasilitas">
                <h3>fasilitas anak</h3>
            </div>
            <div class="isi-fasilitas">
                <p><?= $d->fasilitas_anak ?></p>
            </div>
        </div>

        <div class="box-fasilitas">
            <div class="jdl-fasilitas">
                <h3>fasilitas bisnis</h3>
            </div>
            <div class="isi-fasilitas">
                <p><?= $d->fasilitas_bisnis ?></p>
            </div>
        </div>

        <div class="box-fasilitas">
            <div class="jdl-fasilitas">
                <h3>konektivitas</h3>
            </div>
            <div class="isi-fasilitas">
                <p><?= $d->konektivitas?></p>
            </div>
        </div>

        <div class="box-fasilitas">
            <div class="jdl-fasilitas">
                <h3>transportasi</h3>
            </div>
            <div class="isi-fasilitas">
                <p><?= $d->transportasi?></p>
            </div>
        </div>

        <div class="box-fasilitas">
            <div class="jdl-fasilitas">
                <h3>makanan minuman</h3>
            </div>
            <div class="isi-fasilitas">
                <p><?= $d->makanan_minuman?></p>
            </div>
        </div>

        <div class="box-fasilitas">
            <div class="jdl-fasilitas">
                <h3>olahraga rekreasi</h3>
            </div>
            <div class="isi-fasilitas">
                <p><?= $d->olahraga_rekreasi?></p>
            </div>
        </div>
    </div>
</section>

<section>
    
</section>

<?php
    $review = mysqli_query($conn, "SELECT id_reservasi FROM reservasi WHERE id_pelanggan = '".$_SESSION['id']."' AND id = '".$d->id."' ");

    if(mysqli_num_rows($review) > 0 ){
        echo "sudah pesan";
    }else{
        echo "belum pesan";
    }
?>
</body>
</html>