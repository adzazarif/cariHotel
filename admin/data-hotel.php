<?php
        include 'header.php';
    ?>
    <?php
        $gabung   = mysqli_query($conn, "SELECT * FROM hotel INNER JOIN fasilitas USING(id) INNER JOIN foto_hotel USING (id) WHERE id = '".$_SESSION['uid']."'");
        if(mysqli_num_rows($gabung) == 0){
            echo "<script>window.location ='tambah-hotel.php'</script>";
        }
        $h          = mysqli_fetch_object($gabung);
      ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"><i class="bi bi-card-list"></i></span>Profil</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <button type="button" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="update-hotel.php?id=<?= $h->id_hotel ?>">update data</a></button>
          </div>
        </div>
      </div>

            <?php 
            
                if(isset($_GET['mssg'])){
                
                echo "<div class='alert alert-info'>
                ".$_GET['mssg'].";
                </div>";
            }    
            ?>

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
        <td>nama hotel</td>
        <td><?= $h->nama_hotel ?></td>
    </tr>
    <tr>
        <td>lokasi</td>
        <td><?= $h->lokasi ?></td>
    </tr>
    <tr>
        <td>alamat</td>
        <td><?= $h->alamat ?></td>
    </tr>
    <tr>
        <td>bintang</td>
        <td><?= $h->bintang ?></td>
    </tr>
    <tr>
        <td>kontak</td>
        <td><?= $h->kontak ?></td>
    </tr>
    <tr>
        <td>fasilitas umum</td>
        <td><?= $h->fasilitas_umum ?></td>
    </tr>
    <tr>
        <td>layanan</td>
        <td><?= $h->layanan_hotel ?></td>
    </tr>
    <tr>
        <td>fasilitas anak</td>
        <td><?= $h->fasilitas_anak ?></td>
    </tr>
    <tr>
        <td>fasilitas bisnis</td>
        <td><?= $h->fasilitas_bisnis ?></td>
    </tr>
    <tr>
        <td>konektivitas</td>
        <td><?= $h->konektivitas ?></td>
    </tr>
    <tr>
        <td>transportasi</td>
        <td><?= $h->transportasi ?></td>
    </tr>
    <tr>
        <td>makanan minuman</td>
        <td><?= $h->makanan_minuman ?></td>
    </tr>
    <tr>
        <td>transportasi</td>
        <td><?= $h->transportasi ?></td>
    </tr>
    <tr>
        <td>olahraga rekreasi</td>
        <td><?= $h->olahraga_rekreasi ?></td>
    </tr>
    <tr>
        <td>foto</td>
        <td>
            <img width="250px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_1 ?>" alt="">
            <img width="250px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_2 ?>" alt="">
            <img width="250px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_3 ?>" alt="">
            <img width="250px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_4 ?>" alt="">
            <img width="250px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_5 ?>" alt="">
        </td>
    </tr>
        
    </tr>

  </tbody>
</table>


    <?php
        include 'footer.php';
    ?>
    