<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2"> Data Booking</h1>
      </div>

      <form action="" method="GET">
      <div class="mb-3" style="display: flex;">
        <input type="text" name="key" class="form-control" placeholder="pencarian berdasarkan nmr booking" >
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
    </div>
    </form>

    <table class="table">
        <thead class="table-light">
                <tr>
                    <th>no booking</th>
                    <th>nama</th>
                    <th>nama hotel</th>
                    <th>tipe kamar</th>
                    <th>tanggal kedatangan</th>
                    <th>tanggal keluar</th>
                    <th>lama</th>
                    <th>total</th>
                    <th>status pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                        // pencarian
                        $where = "WHERE 1 + 1";
                        if(isset($_GET['key'])){
                            $where .= " AND order_id LIKE '%".$_GET['key']."%' ";
                        }

                        $booking = mysqli_query($conn, "SELECT * FROM reservasi LEFT JOIN pelanggan USING (id_pelanggan) LEFT JOIN hotel USING (id)  $where ORDER BY id_reservasi DESC ");
                        if(mysqli_num_rows($booking)){
                            while($a = mysqli_fetch_array($booking)){
                                
                    ?>
                    <td><?= $a['order_id']?></td>
                    <td><?= $a['nama']?></td>
                    <td><?= $a['nama_hotel']?></td>
                    <td><?= $a['tipe_kamar']?></td>
                    <td><?= date('d F Y', strtotime($a['tgl_kedatangan'])) ?></td>
                    <td><?= date('d F Y', strtotime($a['tgl_keluar'])) ?></td>
                    <td><?= $a['lama_menginap']?></td>
                    <td><?= $a['pembayaran']?></td>
                    <td><?php

                       
                        $order = $a['order_id'];
                        $cek = mysqli_query($conn, "SELECT status FROM status_bayar WHERE order_id = '".$order."'");
                        $q = mysqli_fetch_array($cek);
                        
                        if($q['status'] == 'belum lunas'){
                            echo "belum di bayar";
                        }elseif($q['status'] == 'lunas'){
                            echo  "Lunas";
                            echo "<br>";
                            echo '<button type="button" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="detail-bayar.php?idorder='.$a['order_id'].'" ">detail bayar</a></button>';
                        }elseif($q['status'] == 'pending'){
                            echo "pending";
                            echo "<br>";
                            echo '<button type="button" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="detail-bayar.php?idorder='.$a['order_id'].'" ">detail bayar</a></button>';
                        }
                    ?></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>


    <?php
        include 'footer.php';
    ?>
    