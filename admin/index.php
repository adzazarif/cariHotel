    <?php
        include 'header.php';
    ?>
    
    <?php
        if($_SESSION['ulevel'] == "User"){
    ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"><i class="bi bi-speedometer2"></i></span>DASHBOARD </h1>
      </div>
      
    <?php 
      $angka = mysqli_query($conn, "SELECT id FROM reservasi WHERE id = '".$_SESSION['uid']."'");
      $p = mysqli_num_rows($angka);

 
    ?>


      <div style="display:flex" class="bok-kartu">
      <div class="card text-white bg-info"  style="width: 25rem; margin: 20px;">
  <div class="card-body">
    <div class="card-body-icon">
    <i class="bi bi-people-fill"></i>
    </div>
    <h5 class="card-title">Jumlah Pelanggan</h5>
    <div class="display-4" style="font-weight: bolder;"><?= $p ?></div>
    <a style="text-decoration:none; font-size:20px;font-weight:bolder" href="#"><p  class="card-text text-white">Lihat detail <i class="bi bi-chevron-double-right"></i></p></a> 

  </div>
</div>
<?php
        $hitung = mysqli_query($conn, "SELECT SUM(pembayaran) AS total FROM reservasi WHERE id = '".$_SESSION['uid']."'");
        $jumlah = mysqli_fetch_assoc($hitung)['total'];

      ?>

<div class="card text-white bg-warning" style="width: 25rem; margin: 20px;">
  <div class="card-body">
    <div class="card-body-icon">
    <i class="bi bi-currency-dollar"></i>
    </div>
    <h5 class="card-title">Pemasukan Uang</h5>
    <div class="display-4" style="font-weight: bolder;">Rp.<?= $jumlah ?></div>
    <a style="text-decoration:none; font-size:20px;font-weight:bolder" href="#"><p  class="card-text text-white">Lihat detail <i class="bi bi-chevron-double-right"></i></p></a> 

  </div>
</div>
</div>

        <?php }elseif($_SESSION['ulevel'] == "Admin"){ ?>


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"><i class="bi bi-speedometer2"></i></span>DASHBOARD </h1>
      </div>
      
      <?php 
        $hotel = mysqli_query($conn, "SELECT id_hotel FROM hotel");
        $h = mysqli_num_rows($hotel);
      
      ?>

      <div style="display:flex; flex-wrap:wrap;" class="bok-kartu">
      <div class="card text-white bg-primary"  style="width: 25rem; margin: 20px ;">
  <div class="card-body">
    <div class="card-body-icon">
    <i class="bi bi-house-door"></i>
    </div>
    <h5 class="card-title">jumlah hotel</h5>
    <div class="display-4" style="font-weight: bolder;"><?= $h ?></div>
    <a style="text-decoration:none; font-size:20px;font-weight:bolder" href="#"><p  class="card-text text-white">Lihat detail <i class="bi bi-chevron-double-right"></i></p></a> 

  </div>
</div>
<?php 
        $pelanggan = mysqli_query($conn, "SELECT id_pelanggan FROM pelanggan");
        $p = mysqli_num_rows($pelanggan);
      ?>
      

<div class="card text-white bg-info" style="width: 25rem; margin: 20px ;">
  <div class="card-body">
    <div class="card-body-icon">
    <i class="bi bi-people-fill"></i>
    </div>
    <h5 class="card-title">jumlah user pengguna</h5>
    <div class="display-4" style="font-weight: bolder;"><?= $p ?></div>
    <a style="text-decoration:none; font-size:20px;font-weight:bolder" href="#"><p  class="card-text text-white">Lihat detail <i class="bi bi-chevron-double-right"></i></p></a> 

  </div>
</div>

<?php 
        $reservasi = mysqli_query($conn, "SELECT id_reservasi FROM reservasi");
        $r = mysqli_num_rows($reservasi);
      ?>

<div class="card text-white bg-danger" style="width: 25rem; margin: 20px ;">
  <div class="card-body">
    <div class="card-body-icon">
    <i class="bi bi-calendar2-check"></i>
    </div>
    <h5 class="card-title">jumlah seluruh data booking</h5>
    <div class="display-4" style="font-weight: bolder;"><?= $r ?></div>
    <a style="text-decoration:none; font-size:20px;font-weight:bolder" href="#"><p  class="card-text text-white">Lihat detail <i class="bi bi-chevron-double-right"></i></p></a> 

  </div>
</div>

<?php 
        $kamar = mysqli_query($conn, "SELECT id_kamar FROM kamar");
        $k = mysqli_num_rows($kamar);
      ?>

<div class="card text-white bg-warning" style="width: 25rem; margin: 20px ;">
  <div class="card-body">
    <div class="card-body-icon">
    <i class="bi bi-house"></i>
    </div>
    <h5 class="card-title">jumlah seluruh kamar</h5>
    <div class="display-4" style="font-weight: bolder;"><?= $k ?></div>
    <a style="text-decoration:none; font-size:20px;font-weight:bolder" href="#"><p  class="card-text text-white">Lihat detail <i class="bi bi-chevron-double-right"></i></p></a> 

  </div>
</div>
</div>

    


      <?php } ?>

      <?php
        include 'footer.php';
    ?>
    