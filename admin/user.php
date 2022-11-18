<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2">Data Pengguna</h1>
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
                    <?php $no = 1 ?>
                    <th>no</th>
                    <th>nama</th>
                    <th>nomor telepon</th>
                    <th>alamat</th>
                    <th>email</th>
                    <th>action</th>          
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                        // pencarian
                        $where = "WHERE 1 = 1";
                        if(isset($_GET['key'])){
                            $where .= " AND nama LIKE '%".$_GET['key']."%' ";
                        }

                        $pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan  $where ORDER BY id_pelanggan DESC ");
                        if(mysqli_num_rows($pelanggan)){
                            while($a = mysqli_fetch_array($pelanggan)){
                                
                    ?>
                    <td><?= $no++ ?></td>
                    <td><?= $a['nama']?></td>
                    <td><?= $a['nmr_telepon']?></td>
                    <td><?= $a['alamat']?></td>
                    <td><?= $a['email']?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"><a href="hapus.php?id_pelanggan=<?= $a['id_pelanggan'] ?>" style="color: #fff; text-decoration:none" onclick="return confirm('apakah yakin menghapus')">hapus</a></button>
                        <button type="button" class="btn btn-primary btn-sm"><a href="detail-riwayat.php?id_pelanggan=<?= $a['id_pelanggan'] ?>" style="color: #fff; text-decoration:none">riwayat booking</a></button>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>


    <?php
        include 'footer.php';
    ?>
    