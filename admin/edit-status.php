<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">konfirmasi pembayaran</h1>
      </div>

    <?php
        $idorder = $_GET['idorder'];
        $edit = mysqli_query($conn, "SELECT * FROM status_bayar WHERE order_id = $idorder ");
        $k = mysqli_fetch_object($edit);

    ?>
        
        <p>edit status konfirmasi bayar</p>
        <form action="" method="POST">
        <select style="width: 500px;" name="status" class="form-select" aria-label="Default select example">
        <option selected><?= $k->status ?></option>
        <option value="pending">pending</option>
        <option value="lunas">lunas</option>
        </select>

        <div class="col-12">
            <button type="submit" name="submit" style="margin-top: 10px;" class="btn btn-primary">ubah</button>
        </div>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $status = $_POST['status'];

                $ganti = mysqli_query($conn, "UPDATE status_bayar SET status = '".$status."' WHERE order_id = '".$_GET['idorder']."'");

                if($ganti){
                    echo "<script>window.location = 'pelanggan.php'</script>";
                }else{
                    echo '<script>alert("data gagal di tambahkan") </script>',mysqli_error($conn);
                }
            }
        ?>

    <?php
        include 'footer.php';
    ?>
    