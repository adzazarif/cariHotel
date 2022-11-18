<?php
        include 'header.php';

       
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"><i class="bi bi-flag"></i></span>Cetak Laporan Hotel</h1>
      </div>

      <div class="cetak-data">
          <h6>Cetak berdasarkan tanggal</h6>
          <form action="cetak-laporan.php" method="POST" target="blank">
              <div class="form-control-cetak">
                  <label for="">Mulai dari</label>
              <input type="date" class="control-form" name="mulai">
              </div>
              <div class="form-control-cetak">
                  <label for=""> Sampai</label>
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
    