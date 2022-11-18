<?php
        include 'koneksi.php';
        session_start();
        date_default_timezone_set("Asia/Jakarta");
        
        if(!isset($_SESSION['status_login'])){
            header("Location: login-akun.php");
        }
        $id_pelanggan = $_SESSION['id'];

        $now   = date('Y-m-d H:i');
        $jam = "3";
        $tgl_berikutnya = date('Y-m-d H:i', strtotime('+'.$jam .'minutes', strtotime($now)));
            
        $hotel = mysqli_query($conn, "SELECT * FROM hotel INNER JOIN kamar USING (id) WHERE id_kamar = '".$_GET['id_kamar']."'");
        $h = mysqli_fetch_object($hotel);

                    // TOTAL PENJUMLAHAN
        $kamar = $_GET['kamar'];
        $lama = $_GET['lama'];
        $harga = $h->harga_permalam;
            
        $total = $harga * $lama * $kamar;

                    // KODE ORDER

        $nmr = mysqli_query($conn, "SELECT max(id_reservasi) as maxID_RESERVASI FROM reservasi");
        $n = mysqli_fetch_array($nmr);

        $kode = $n['maxID_RESERVASI'];

        $kode++;
        $ket = date('myd');
        $kodeauto = $ket . sprintf($kode);

                    
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $h->nama_hotel ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="header">
        <div class="navigation">
        <a href="#" class="nav-logo">CariHotel.com</a>
        <div class="langkah">
            <p>
                <span class="active">1. Order</span>><span>2. Payment</span>><span>3. Complete</span>
            </p>
        </div>
        </div>
        </div>

        <section>
            <div class="pesan">
                <form action="" method="post">
                    <div class="pesanan-hotel">
                        <h2>data booking hotel</h2>

                    <?php
                        $pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan = $id_pelanggan ");
                        $p = mysqli_fetch_object($pelanggan);
                    ?>
                    <div class="form-group">

                    <!-- <label style="padding-right: 10px;" for="">tujuan</label>
                <select class="input-control-nama" name="titel">
                    <option selected>titel</option>
                    <option value="tuan">tuan</option>
                    <option value="nyonya">nyonya</option>
                    <option value="nona">nona</option>

                </select> -->
                        <label style="padding-right: 10px;" for="">Pemesan</label>
                        <input type="text" class="input-control-nama" disabled value="<?= $p->nama  ?>">
                    </div>
                    <div class="form-group">
                        <label style="padding-right: 10px;" for="">Nmr Telepon</label>
                        <input type="number" class="input-control" disabled value="<?= $p->nmr_telepon ?>">
                    </div>
                    <div class="form-group">
                        <label style="padding-right: 64px;" for="">alamat</label>
                        <input type="text" class="input-control" disabled value="<?= $p->alamat ?>">
                    </div>
                    <div  class="form-group">
                        <label style="padding-right: 80px;" for="">email </label> 
                        <input type="text" style="margin-bottom: 50px;" class="input-control" disabled value="<?= $p->email ?>">
                    </div>
                    <input type="hidden" name="tipe" value="<?= $h->tipe_kamar ?>">
                    <input type="hidden" name="id" value="<?= $h->id ?>">
                    <input type="hidden" name="checkin" value="<?= $_GET['checkin'] ?>">
                    <input type="hidden" name="checkout" value="<?= $_GET['checkout'] ?>">
                    <input type="hidden" name="lama" value="<?= $_GET['lama'] ?>">
                    <input type="hidden" name="kamar" value="<?= $_GET['kamar'] ?>">
                    <input type="hidden" name="tamu" value="<?= $_GET['tamu'] ?>">
                    <input type="hidden" name="total" value="<?= $total ?>">
                    <input type="hidden" name="kode" value="<?= $kodeauto ?>">
                    
                    
                    </div>

                    <div class="pesanan-hotel">
                        <h2>Permintaan Khusus</h2>
                        <p>Punya permintaan khusus yang membuatmu makin nyaman? Minta di sini. Permintaanmu tergantung persediaan dan mungkin dikenakan biaya tambahan.</p>

                    <div class="form-group" style="border-bottom: 1px solid #ddd; margin: 20px;">
                        <input type="hidden" name="permintaan[]" value=" ">
                        <input type="checkbox" value="  bebas asap rokok" name="permintaan[]" class="chekbox"> 
                        <label style="padding-right: 10px; padding-right: 40px;" for="">bebas asap rokok</label>
                        <input type="checkbox" value="bebas asap rokok" name="permintaan[]" class="chekbox">
                        <label style="padding-right: 10px;padding-right: 40px;" for="">kamar dengan pintu terhubung</label>
                        <input type="checkbox" value=" lantai atas" name="permintaan[]" class="chekbox">
                        <label style="padding-right: 10px;" for="">lantai atas</label>
                    </div>
                    <div class="form-group">
                        <label style="padding-right: 10px;" for="">tipe ranjanag</label>
                <select class="input-control-nama" name="tipe-ranjang">
                    <option selected>tidak memilih</option>
                    <option value="2 ranjang single">2 ranjang single</option>
                    <option value="1 ranjang besar">1 ranjang besar</option>

                </select>
                     
                <label for="">check in</label>
                <input type="time" name="permintaan-in" class="check-time">

                <label for="">check out</label>
                <input type="time" name="permintaan-out" class="check-time">
                    </div>
                    <div class="form-group">
                        <textarea name="lainnya" id="" placeholder="lainnya" ></textarea>
                    </div>
                    </div>
                    
                    <input type="submit" class="button-psn" name="submit" id="">
                </form>
            
                <?php
                    if(isset($_POST['submit'])){
                        $id = $_POST['id'];
                        $kode = $_POST['kode'];
                        $tipe = $_POST['tipe'];
                        $checkin = $_POST['checkin'];
                        $checkout = $_POST['checkout'];
                        $lama = $_POST['lama'];
                        $kamar = $_POST['kamar'];
                        $tamu = $_POST['tamu'];
                        $harga = $_POST['total'];
                        $status = 'belum lunas';

                        $permintaan = implode(' • ',  $_POST['permintaan']) ;
                        $tipe_ranjang = $_POST['tipe-ranjang'];
                        $permintaan_in = $_POST['permintaan-in'];
                        $permintaan_out = $_POST['permintaan-out'];
                        $lainnya = $_POST['lainnya'];

                        $tambah = mysqli_query($conn, "INSERT INTO reservasi VALUES(
                            NULL,
                            '".$kode."',
                            '".$_SESSION['id']."',
                            '".$id."',
                            '".$tipe."',
                            '".$checkin."',
                            '".$checkout."',
                            '".$lama."',
                            '".$kamar."',
                            '".$tamu."',
                            '".$harga."'
                        )");
                        
                        $tambah = mysqli_query($conn, "INSERT INTO permintaan_khusus VALUES(
                            NULL,
                            '".$kode."',
                            '".$permintaan."',
                            '".$tipe_ranjang."',
                            '".$permintaan_in."',
                            '".$permintaan_out."',
                            '".$lainnya."'
                        )");

                        $tambah = mysqli_query($conn, "INSERT INTO status_bayar VALUES(
                            NULL,
                            '".$kode."',
                            '".$status."'
                        )");
                        if($tambah){
                            echo "<script>window.location='bayar.php?orderid=$kodeauto&jam=$tgl_berikutnya'</script>";
                        }else{
                            echo "data gagal di upload",mysqli_error($conn);
                        }
                    }
                ?>


                    <?php

                    ?>
                
                <div class="detail-pemesanan">
                    <h2>Detaol Pemesanan</h2>
                    <div class="pemesanan-hotel">
                        <div class="pemesanan-foto">
                            <img src="uploads/kamar/kamar1638621572.jpg" alt="">
                        </div>
                        <div class="pemesanan-txt">
                        <h4><?= $h->nama_hotel ?></h4>
                        <p class="nm"><?= $_GET['kamar'] ?>  <?= $h->tipe_kamar ?></p>
                        <div class="info-pemesanan">
                            <p><?= $_GET['lama'] ?> malam</p>
                            <p><i class="fas fa-circle"></i></p>
                            <p><?= $_GET['tamu'] ?> tamu</p>
                        </div>
                        </div>
                    </div>
                    <div class="check-bok">
                    <div class="check">
                    <p>Check-in</p>
                    <P style="color: #888; font-weight: 500;"><?= date('D, d F Y', strtotime($_GET['checkin']))  ?></P>
                    </div>
                    <div class="check">
                    <p>Check-out</p>
                    <P style="color: #888; font-weight: 500;"><?= date('D, d F Y', strtotime($_GET['checkout']))  ?></P>
                    </div>
                    </div>
                    <div class="total-pemesanan">
                        
                        <p>Total</p>
                        <h3>IDR <?php  echo $total; ?></h3>
                    </div>
                </div>
            </div>
            
        </section> -->
</body>
</html>