<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
     <h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"><i class="bi bi-calendar2-check"></i></span>Booking</h1>
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
                    <th>tipe kamar</th>
                    <th>tanggal kedatangan</th>
                    <th>tanggal keluar</th>
                    <th>lama</th>
                    <th>total</th>
                    <th>permintaan</th>
                    <th>status pembayaran</th>
                    <th>aksi</th>            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                        // pencarian
                        $where = "";
                        if(isset($_GET['key'])){
                            $where .= " AND order_id LIKE '%".$_GET['key']."%' ";
                        }

                        $pay = mysqli_query($conn, "SELECT * FROM reservasi LEFT JOIN pelanggan USING (id_pelanggan)  WHERE id = '".$_SESSION['uid']."' $where ORDER BY id_reservasi DESC ");
                        if(mysqli_num_rows($pay)){
                            while($a = mysqli_fetch_array($pay)){
                                
                    ?>
                    <td><?= $a['order_id']?></td>
                    <td><?= $a['nama']?></td>
                    <td><?= $a['tipe_kamar']?></td>
                    <td><?= date('d F Y', strtotime($a['tgl_kedatangan'])) ?></td>
                    <td><?= date('d F Y', strtotime($a['tgl_keluar'])) ?></td>
                    <td><?= $a['lama_menginap']?></td>
                    <td><?= $a['pembayaran']?></td>
                    <td><button type="button" class="btn btn-info"><a style="color: #111; text-decoration:none;" href="permintaan.php?idorder=<?= $a['order_id']?> ">permintaan</a></button></td>
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
                    <td><button type="button" class="btn btn-warning"><a style="color: #111; text-decoration:none;" href="edit-status.php?idorder=<?= $a['order_id']?> ">edit status</a></button></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>


    <?php
        include 'footer.php';
    ?>
    