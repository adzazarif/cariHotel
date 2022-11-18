<?php
        include 'koneksi.php';
        session_start();
        date_default_timezone_set("Asia/Jakarta");
        
        
        if(!isset($_SESSION['status_login'])){
            header("Location: login-akun.php");
        }
        $id_pelanggan = $_SESSION['id'];
        $test = $_GET['orderid'];
        $pay = mysqli_query($conn, "SELECT * FROM reservasi LEFT JOIN pelanggan USING (id_pelanggan) LEFT JOIN hotel USING (id) WHERE order_id = '".$test."'");
        $a = mysqli_fetch_object($pay);
        
    // data rekening
        $bank = mysqli_query($conn, "SELECT * FROM bank_hotel WHERE id = '".$a->id."'");
        $b = mysqli_fetch_object($bank);

    // cek tanggal
    $now   = date('Y-m-d H:i');
    $besok = $_GET['jam'];

   

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
    <header style="background-color:#FFF700; text-align:center">
    <?php
         if($now >= $besok){
            $cek = mysqli_query($conn, "SELECT * FROM status_bayar WHERE order_id = '".$test."'");
            $c = mysqli_fetch_object($cek);
            if($c->status == 'belum lunas'){
                $cencel = mysqli_query($conn, "DELETE FROM reservasi WHERE order_id = '".$test."' ");
                $cencel = mysqli_query($conn, "DELETE FROM status_bayar WHERE order_id = '".$test."' ");
                $cencel = mysqli_query($conn, "DELETE FROM permintaan_khusus WHERE order_id = '".$test."' ");      
                echo "<script>window.location = 'index.php'</script>";      
            }
        }else{
            echo '<p style="font-size: 20px; padding:10px 0 ">Selesaikan Pembayaran Sebelum : <span  class="teks" style="color: #095080;font-weight:bolder"> '.$besok.' </span></p>';
        }
    ?>
        
    </header>
<div class="header">
        <div class="navigation">
        <a href="#" class="nav-logo">CariHotel.com</a>
        <div class="langkah">
            <p>
                <span class="active">1. Order</span>><span  class="active">2. Payment</span>><span>3. Complete</span>
            </p>
        </div>
        </div>
        </div>

        <section class="pay">
            <div class="detail-bayar">
                <p>detail order</p>
            <table class="table table-striped">
                    <tr>
                        <td>no order</td>
                        <td><?= $a->order_id ?></td>
                    </tr>
                    <tr>
                        <td>nama</td>
                        <td><?= $a->nama ?></td>
                    </tr>
                    <tr>
                        <td>hotel</td>
                        <td><?php echo $a->nama_hotel; ?></td>
                    </tr>
                    <tr>
                        <td>tipe kamar</td>
                        <td><?= $a->tipe_kamar ?></td>
                    </tr>
                    <tr>
                        <td>tanggal kedatangan</td>
                        <td><?= date('D, d F Y', strtotime($a->tgl_kedatangan) )  ?></td>
                    </tr>
                    <tr>
                        <td>tanggal keluar</td>
                        <td><?= date('D, d F Y', strtotime($a->tgl_keluar) )  ?></td>
                    </tr>
                    <tr>
                        <td>lama menginap</td>
                        <td><?= $a->lama_menginap ?></td>
                    </tr>
                    <tr>
                        <td>total harga</td>
                        <td><?= $a->pembayaran ?></td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="pay">
            <h4>silahkan transfer uang sesuai nominal total bayar ke salah satu rekening di bawah ini</h4>
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
        <section class="pay">
        <h4>jika sudah transfer ke salah satu bank tersebut selanjutnya silahkan isi konfirmasi bayar di bawah ini</h4>
        </section> 

        <section>
        <div class="konfirmasi">
                 <form method="POST" action="" enctype="multipart/form-data">
    
  <fieldset disabled>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">no booking</label>
      <input type="text" id="disabledTextInput" name="order" class="form-control" value="<?= $a->order_id ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">total harga</label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?= $a->pembayaran ?>">
    </div>
    
  </fieldset>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">dari bank</label>
                    <input type="text" name="dari-bank" class="form-control" placeholder="Tulis bank yang anda gunakan untuk transfer" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ke bank</label>
                    <input type="text" name="ke-bank" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">no rekening</label>
                    <input type="text" name="no-rek" class="form-control" placeholder="No. rekening anda untuk transfer" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">atas nama</label>
                    <input type="text" name="atas-nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nominal yang di transfer</label>
                    <input type="text" name="nominal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">Foto / screnshot bukti transaksi</label>
                    <input type="file" name="gambar" class="form-control" id="inputGroupFile01">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $dari = $_POST['dari-bank'];
                $ke = $_POST['ke-bank'];
                $no = $_POST['no-rek'];
                $nama = $_POST['atas-nama'];
                $nominal = $_POST['nominal'];
                $pending = "pending";

                // file foto
                $filename = $_FILES['gambar']['name'];
                $tmpname = $_FILES['gambar']['tmp_name'];
                $filesize = $_FILES['gambar']['size'];

                $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                $rename = 'konfirmasi'.time().'.'.$formatfile;

                $allowedtype = array('png','jpeg','jpg','gif');

                if(!in_array($formatfile,$allowedtype)){
                    echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                }elseif($filesize > 1000000){
                    echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                }else{
                    move_uploaded_file($tmpname, "uploads/konfirmasi/" .$rename);
                }

                $tambah = mysqli_query($conn, "INSERT INTO konfirmasi VALUES(
                    NULL,
                    '".$test."',
                    '".$dari."',
                    '".$ke."',
                    '".$no."',
                    '".$nama."',
                    '".$nominal."',
                    '".$rename."'
                )");

                $tambah = mysqli_query($conn, "UPDATE status_bayar SET status = '".$pending."' WHERE order_id = '".$test."'");

                if($tambah){
                    echo "<script>window.location = 'completed.php?id=$test'</script>";
                }else{
                    echo '<script>alert("data gagal di tambahkan") </script>',mysqli_error($conn);
            }
        }
        ?>
        </div>
        </section>
        <script src="assets/js/script.js"></script>
</body>
</html>