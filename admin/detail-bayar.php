<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">detail data hotel</h1>

      </div>

      <?php
        $konfirmasi = mysqli_query($conn, "SELECT * FROM konfirmasi LEFT JOIN reservasi USING (order_id) WHERE order_id = '".$_GET['idorder']."'");
        if(mysqli_num_rows($konfirmasi) == 0){
            header("Location: booking.php");
        }
        $k = mysqli_fetch_object($konfirmasi);
      ?>
      

      <section>
        <div class="konfirmasi">
                 <form method="POST" style="width: 50%;" action="" enctype="multipart/form-data">
    
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
                <img style="width: 300px; margin-bottom:20px; border-radius: 10px; border: 1px solid; padding:5px;" src="../uploads/konfirmasi/<?= $k->foto ?>" alt="">
                </fieldset>
        </form>
        </div>
        </section>


    <?php
        include 'footer.php';
    ?>
    