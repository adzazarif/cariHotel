<?php
        include 'header.php';

       
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">cetak laporan booking hotel</h1>
      </div>

      <div class="cetak-data">
          <h6>cetak berdasarkan tanggal</h6>
          <form action="cetak-laporan-booking.php" method="POST" target="blank">
              <div class="form-control-cetak">
                  <label for="">mulai dari</label>
              <input type="date" class="control-form" name="mulai">
              </div>
              <div class="form-control-cetak">
                  <label for="">sampai</label>
              <input type="date" name="sampai" class="control-form">
              </div>
              <div class="form-control-cetak">
              <button class="btn btn-primary" name="submit" type="submit">Print</button>
              </div>
          </form>
      </div>



    <?php
        include 'footer.php';
    ?>
    