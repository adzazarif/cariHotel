<?php
        include 'header.php';
    ?>d
    <?php
        $permintaan   = mysqli_query($conn, "SELECT * FROM permintaan_khusus WHERE order_id = '".$_GET['idorder']."'");
        $h          = mysqli_fetch_object($permintaan);
      ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">detail data hotel</h1>
      </div>

<table class="table">
  <thead class="table-light">
      <?php $no = 1; ?>
    <tr>
        <td>label</td>
        <td>data</td>
    </tr>
  </thead>
  <tbody>

    <tr>
    <td>permintaan umum</td>
    <td>
        <?php
        $cek = mysqli_query($conn, "SELECT permintaan_umum FROM permintaan_khusus WHERE order_id = '".$_GET['idorder']."'");
        $c = mysqli_fetch_object($cek);
            if($c->permintaan_umum == " "){
               echo "-";
            }else{
                echo $h->permintaan_umum;
            }
        ?>
    </td>
    </tr>
    <tr>
        <td>tipe ranjang</td>
        <td>
        <?php
        $cek = mysqli_query($conn, "SELECT tipe_ranjang FROM permintaan_khusus WHERE order_id = '".$_GET['idorder']."'");
        $c = mysqli_fetch_object($cek);
            if($c->tipe_ranjang == "tidak memilih"){
               echo "-";
            }else{
                echo $h->tipe_ranjang;
            }
        ?>
        </td>
    </tr>
    <tr>
        <td>waktu chekin</td>
        <td>
        <?php
        $cek = mysqli_query($conn, "SELECT waktu_check_in FROM permintaan_khusus WHERE order_id = '".$_GET['idorder']."'");
        $c = mysqli_fetch_object($cek);
            if($c->waktu_check_in == "00:00:00"){
               echo "-";
            }else{
                echo $h->waktu_check_in;
            }
        ?>    
        </td>
    </tr>
    <tr>
        <td>waktu checkout</td>
        <td>
        <?php
        $cek = mysqli_query($conn, "SELECT waktu_check_out FROM permintaan_khusus WHERE order_id = '".$_GET['idorder']."'");
        $c = mysqli_fetch_object($cek);
            if($c->waktu_check_out == "00:00:00"){
               echo "-";
            }else{
                echo $h->waktu_check_out;
            }
        ?>  
        </td>
    </tr>
    <tr>
        <td>keterangan</td>
        <td><?= $h->ket_lainnya ?></td>
    </tr>
        

  </tbody>
</table>


    <?php
        include 'footer.php';
    ?>
    