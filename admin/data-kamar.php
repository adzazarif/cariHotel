<?php
        include 'header.php';
    ?>

    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"><i class="bi bi-house"></i></span>KAMAR</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          <button type="button" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="tambah-kamar.php">Tambah Kamar</a></button>
          </div>
        </div>
      </div>
      <?php 
      
      if(isset($_GET['msg'])){
    
    echo "<div class='alert alert-info'>
    ".$_GET['msg'].";
      </div>";
}    
?>

<div class="kamar">
<?php
        $no = 1;
            $kamar = mysqli_query($conn, "SELECT * FROM hotel INNER JOIN kamar USING (id) WHERE id = '".$_SESSION['uid']."' ORDER BY id_kamar DESC");
            if(mysqli_num_rows($kamar) > 0){
                while ($k = mysqli_fetch_array($kamar)){
        ?>
       
    <div class="tipe-kamar">
    <button type="button" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="update-kamar.php?id=<?= $k['id_kamar'] ?> ">update kamar</a></button>
    <button type="button" onclick="return confirm('apakah yakin menghapus')" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="hapus.php?id_kamar=<?= $k['id_kamar'] ?> ">delete kamar</a></button>
    <span style="padding-left: 20px;font-size:20px;">kamar <?= $no++ ?></span>
    <table style="margin-top: 20px;" class="table">
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
            <td>Rp.<?= $k['harga_permalam'] ?></td>
        </tr>
        <tr>
            <td>foto</td>
            <td>
                <img style="width: 200px; margin:5px; border-radius:10px;" src="../uploads/kamar/<?= $k['foto'] ?>" alt="">
                <img style="width: 200px; margin:5px; border-radius:10px;" src="../uploads/kamar/<?= $k['foto1'] ?>" alt="">
                <img style="width: 200px; margin:5px; border-radius:10px;" src="../uploads/kamar/<?= $k['foto2'] ?>" alt="">
                <img style="width: 200px; margin:5px; border-radius:10px;" src="../uploads/kamar/<?= $k['foto3'] ?>" alt="">
                <img style="width: 200px; margin:5px; border-radius:10px;" src="../uploads/kamar/<?= $k['foto4'] ?>" alt="">
                <img style="width: 200px; margin:5px; border-radius:10px;" src="../uploads/kamar/<?= $k['foto5'] ?>" alt="">
            </td>
        </tr>
        
    </tbody>
    </table>
    </div>
    <?php }}else{
        echo "<script>window.location = 'tambah-kamar.php'</script>";
    } ?>
</div>

    <?php
        include 'footer.php';
    ?>
