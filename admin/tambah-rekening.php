<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah rekening bank</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <?php
            if(isset($_POST['submit'])){
                $no_bri = $_POST['no-bri'];
                $nm_bri = $_POST['nama-bri'];
                $no_bca = $_POST['no-bca'];
                $nm_bca = $_POST['nama-bca'];
                $no_bni = $_POST['no-bni'];
                $nm_bni = $_POST['nama-bni'];
                $no_mandiri = $_POST['no-mandiri'];
                $nm_mandiri = $_POST['nama-mandiri'];


            $tambah = mysqli_query($conn, "INSERT INTO bank_hotel VALUES(
                NULL,
                '".$_SESSION['uid']."',
                '".$no_bri."',
                '".$nm_bri."',
                '".$no_bca."',
                '".$nm_bca."',
                '".$no_bni."',
                '".$nm_bni."',
                '".$no_mandiri."',
                '".$nm_mandiri."'
            )");

            if($tambah){
                echo "<script>window.location = 'bank.php?msgg=data sudah di tambahkan'</script>";
            }else{
                echo '<script>alert("data gagal di tambahkan") </script>',mysqli_error($conn);
            }
        }
      ?>
    <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="container-bank">
    <div class="form-grup">
        <img src="../uploads/tambahan/bri.gif" alt="">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">no-rekening</span>
        <input type="text" name="no-bri"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">nama</span>
        <input type="text" name="nama-bri" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    </div>

    <div class="form-grup">
        <img src="../uploads/tambahan/bca.jpg" alt="">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">no-rekening</span>
        <input type="text" name="no-bca"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">nama</span>
        <input type="text" name="nama-bca" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    </div>

    <div class="form-grup">
        <img src="../uploads/tambahan/bni.jpg" alt="">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">no-rekening</span>
        <input type="text" name="no-bni"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">nama</span>
        <input type="text" name="nama-bni" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    </div>

    <div class="form-grup">
        <img src="../uploads/tambahan/mandiri.jpg" alt="">
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">no-rekening</span>
        <input type="text" name="no-mandiri"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">nama</span>
        <input type="text" name="nama-mandiri" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    </div>
    </div>



    <input type="submit" name="submit" class="btn-check" id="btn-check-outlined" autocomplete="off">
    <label class="btn btn-outline-primary" for="btn-check-outlined">tambahkan</label><br>
    </form>
    </div>
    <?php
        include 'footer.php';
    ?>
    