<?php
    session_start();
    include 'koneksi.php';
    date_default_timezone_set("Asia/Jakarta");
    $konfirmasi = mysqli_query($conn, "SELECT * FROM konfirmasi LEFT JOIN reservasi USING (order_id) WHERE order_id = '".$_GET['idorder']."'");
    if(mysqli_num_rows($konfirmasi) == 0){
        header("Location: booking.php");
    }
    $k = mysqli_fetch_object($konfirmasi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karcis.com</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="header">
        <div class="navigation">
        <a href="#" class="nav-logo">tiket.com</a>
     
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
        <div class="konfirmasi">
                 <form method="POST" action="" enctype="multipart/form-data">
    
  <fieldset disabled>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">no booking</label>
      <input type="text" id="disabledTextInput" name="order" class="form-control" value="<?= $k->order_id ?>">
    </div>
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">total harga</label>
      <input type="text" id="disabledTextInput" class="form-control" value="<?= $k->pembayaran ?>">
    </div>
    

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">dari bank</label>
                    <input type="text" name="dari-bank" value="<?= $k->dari_bank ?>" class="form-control" placeholder="Tulis bank yang anda gunakan untuk transfer" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ke bank</label>
                    <input type="text" value="<?= $k->ke_bank ?>" name="ke-bank" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">no rekening</label>
                    <input type="text" name="no-rek" value="<?= $k->no_rek ?>" class="form-control" placeholder="No. rekening anda untuk transfer" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">atas nama</label>
                    <input type="text" name="atas-nama" value="<?= $k->nama_rek ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">nominal yang di transfer</label>
                    <input type="text" name="nominal" value="<?= $k->nominal ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <img style="width: 300px; margin-bottom:20px; border-radius: 10px; border: 1px solid; padding:5px;" src="uploads/konfirmasi/<?= $k->foto ?>" alt="">
                </fieldset>
        </form>
        </div>
        </section>
</body>
</html>