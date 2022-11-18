<?php
        include 'header.php';

        $bank = mysqli_query($conn, "SELECT * FROM bank_hotel WHERE id = '".$_SESSION['uid']."'");
        if(mysqli_num_rows($bank) == 0){
            echo "<script>window.location ='tambah-rekening.php'</script>";
        }
        $b = mysqli_fetch_object($bank);

    ?>

    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"><i class="bi bi-credit-card-2-back-fill"></i></span>Metode pembayaran</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">

          <?php
                if(mysqli_num_rows($bank) == 0){
                    echo ' <button type="button" class="btn btn-sm btn-outline-secondary"><a href="tambah-rekening.php ">tambah rekening</a></button>';
                }
          ?>
           
           <button type="button" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="edit-rekening.php?id=<?= $b->id?>">edit rekening</a></button>
          </div>
        </div>
      </div>

      <?php 
            
            if(isset($_GET['msgg'])){
            
            echo "<div class='alert alert-info'>
            ".$_GET['msgg'].";
            </div>";
        }    
        ?>
      
      <section class="pay">
            <div class="bayar">
                <div class="box">
                    <img src="../uploads/tambahan/bri.gif" alt="">
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
                    <img src="../uploads/tambahan/bni.jpg" alt="">
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
                    <img src="../uploads/tambahan/bca.jpg" alt="">
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
                    <img src="../uploads/tambahan/mandiri.jpg" alt="">
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

    <?php
        include 'footer.php';
    ?>
