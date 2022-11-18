<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">detail data hotel</h1>
      </div>

      <?php
        $gabung   = mysqli_query($conn, "SELECT * FROM hotel INNER JOIN fasilitas  USING (id) INNER JOIN foto_hotel  USING (id) WHERE id = '".$_GET['id']."'");
        if(mysqli_num_rows($gabung) == 0){
            echo "<script>window.location ='hotel-admin.php'</script>";
        }
        $h          = mysqli_fetch_object($gabung);
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
        <td>bintang</td>
        <td><?= $h->kontak ?></td>
    </tr>
    <tr>
        <td>fasilitas umum</td>
        <td><?= $h->fasilitas_umum ?></td>
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
        <td>maaps</td>
        <td>  <iframe src="<?= $h->google_maps ?>" width="500" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe></td>
    </tr>
    <tr>
        <td>foto</td>
       <td>
            <img width="300px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_1 ?>" alt="">
            <img width="300px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_2 ?>" alt="">
            <img width="300px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_3 ?>" alt="">
            <img width="300px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_4 ?>" alt="">
            <img width="300px" style="border-radius: 10px; margin:5px;" src="../uploads/hotel/<?= $h->foto_5 ?>" alt="">
        </td>
    </tr>
        
    </tr>

  </tbody>
</table>


<h2 style="color: #2470dc;">Kamar yang tersedia</h2>


<div class="kamar">
<?php
            $kamar = mysqli_query($conn, "SELECT * FROM kamar  WHERE id = '".$_GET['id']."'");
            if(mysqli_num_rows($kamar) > 0){
                while ($k = mysqli_fetch_array($kamar)){
        ?>
       
    <div class="tipe-kamar">
    <table class="table">
    <thead class="table-light">
        <tr>
            <td>label</td>
            <td>data</td>
        </tr>
    </thead>
    <tbody>
    
        <tr>
            <td>tipe kamar</td>
            <td><?= $k['tipe_kamar'] ?></td>
        </tr>
        <tr>
            <td>berpa orang</td>
            <td><?= $k['orang'] ?></td>
        </tr>
        <tr>
            <td>luas</td>
            <td><?= $k['luas'] ?></td>
        </tr>
        <tr>
            <td>fasilitas kamar</td>
            <td><?= $k['fasilitas_kamar'] ?></td>
        </tr>
        <tr>
            <td>makanan</td>
            <td><?= $k['makanan'] ?></td>
        </tr>
        <tr>
            <td>konektivitas</td>
            <td><?= $k['konektivitas_kamar'] ?></td>
        </tr>
        <tr>
            <td>deskripsi Kamar</td>
            <td><?= $k['deskripsi_kamar'] ?></td>
        </tr>
        <tr>
            <td>harga per malam</td>
            <td><?= $k['harga_permalam'] ?></td>
        </tr>
        <tr>
            <td>foto</td>
            <td>
                <img style="width: 200px; border-radius:10px; margin:5px;" src="../uploads/kamar/<?= $k['foto'] ?>" alt="">
                <img style="width: 200px; border-radius:10px; margin:5px;" src="../uploads/kamar/<?= $k['foto1'] ?>" alt="">
                <img style="width: 200px; border-radius:10px; margin:5px;" src="../uploads/kamar/<?= $k['foto2'] ?>" alt="">
                <img style="width: 200px; border-radius:10px; margin:5px;" src="../uploads/kamar/<?= $k['foto3'] ?>" alt="">
                <img style="width: 200px; border-radius:10px; margin:5px;" src="../uploads/kamar/<?= $k['foto4'] ?>" alt="">
                <img style="width: 200px; border-radius:10px; margin:5px;" src="../uploads/kamar/<?= $k['foto5'] ?>" alt="">
            </td>
        </tr>
        
    </tbody>
    </table>
    </div>
    <?php }} ?>
</div>
    <?php
        include 'footer.php';
    ?>
    