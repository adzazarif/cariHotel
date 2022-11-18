<?php
    include 'koneksi.php';

    $tiket = mysqli_query($conn, "SELECT * FROM reservasi LEFT JOIN pelanggan USING (id_pelanggan) LEFT JOIN hotel USING (id) WHERE order_id = '".$_GET['idorder']."'");
    $t = mysqli_fetch_object($tiket);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tiket</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script>
        window.print();
    </script>
</head>
<body>
    <div class="e-tiket" style="width:100%;">
    <div class="tiket">
        <div class="header-tiket">
            <h1>CariHotel.com</h1>
            <p>Voucher Hotel</p>
            <h2>Order ID : <span class="order"> <?= $t->order_id ?> </span></h2>
        </div>

        <div class="body-tiket">
            <div class="info-tiket">
                <h3><?= $t->nama_hotel ?></h3>
                <p class="txt-info"><i class="fas fa-map-marker-alt"></i><?= $t->alamat ?></p>
                <p class="txt-info"><i class="fas fa-phone"></i><?= $t->kontak ?></p>

                <div class="check">
                    <div class="in">
                        <p class="jdl">check - in</p>
                        <p><?= date('D, d F Y',strtotime($t->tgl_kedatangan))  ?></p>
                    </div>

                    <div class="out">
                        <p class="jdl">check - out</p>
                        <p><?= date('D, d F Y',strtotime($t->tgl_keluar))  ?></p>
                    </div>
                </div>
            </div>
            <div  class="maaps">
            <iframe src="<?= $t->google_maps ?>" width="350" height="200" style="border:0;"  allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        
        <div class="detail-pesanan">
            <div class="header-pesanan">
                detail pemesan
            </div>
            <div class="body-pesanan">
                <table>
                    <tr>
                        <td>nama pemesan</td>
                        <td class="bold">: <?= $t->nama ?></td>
                    </tr>
                    <tr>
                        <td>tipe kamar</td>
                        <td class="bold">: <?= $t->tipe_kamar ?></td>
                    </tr>
                    <tr>
                        <td>jumlah kamar</td>
                        <td class="bold">: <?= $t->jml_kamar ?></td>
                    </tr>
                    <tr>
                        <td>tamu</td>
                        <td class="bold">: <?= $t->tamu ?></td>
                    </tr>
                    <tr>
                        <td>permintaan khusus</td>
                        <td class="bold">: 
                        <?php
                            $cek = mysqli_query($conn, "SELECT permintaan_umum FROM permintaan_khusus WHERE order_id = '".$_GET['idorder']."'");
                            $c = mysqli_fetch_object($cek);
                                if($c->permintaan_umum == " "){
                                echo "-";
                                }else{
                                    echo $c->permintaan_umum; 
                                }
                            ?>    
                        </td>
                    </tr>
                    <tr>
                    <?php
                            $cek = mysqli_query($conn, "SELECT tipe_ranjang FROM permintaan_khusus WHERE order_id = '".$_GET['idorder']."'");
                            $c = mysqli_fetch_object($cek);
                                if($c->tipe_ranjang == "tidak memilih"){
                                echo "asu";
                                }else{
                                    echo "<td> tipe ranjang </td>"; 
                                    echo "<td class='bold'> $c->tipe_ranjang </td>"; 
                                }
                            ?>    
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
    

</body>
</html>