<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
        <h1 class="h2"> Data Hotel</h1>
      </div>

      <form action="" method="GET">
      <div class="mb-3" style="display: flex;">
        <input type="text" name="key" class="form-control" placeholder="pencarian berdasarkan nama hotel" >
        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
    </div>
    </form>

    <table class="table">
        <thead class="table-light">
                <tr>
                    <?php $no = 1 ?>
                    <th>no</th>
                    <th>nama hotel</th>
                    <th>lokasi</th>
                    <th>alamat</th>
                    <th>bintang</th>
                    <th>kontak</th>
                    <th>action</th>          
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php

                        // pencarian
                        $where = "WHERE 1 = 1";
                        if(isset($_GET['key'])){
                            $where .= " AND nama_hotel LIKE '%".$_GET['key']."%' ";
                        }

                        $hotel = mysqli_query($conn, "SELECT * FROM hotel  $where ORDER BY id_hotel DESC ");
                        if(mysqli_num_rows($hotel)){
                            while($a = mysqli_fetch_array($hotel)){
                                
                    ?>
                    <td><?= $no++ ?></td>
                    <td><?= $a['nama_hotel']?></td>
                    <td><?= $a['lokasi']?></td>
                    <td><?= $a['alamat']?></td>
                    <td><?= $a['bintang']?></td>
                    <td><?= $a['kontak']?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"><a href="hapus.php?id_admin=<?= $a['id'] ?>" onclick="return confirm('apakah yakin menghapus')" style="color: #fff; text-decoration:none">hapus</a></button>
                        <button type="button" class="btn btn-primary btn-sm"><a href="detail-hotel.php?id=<?= $a['id'] ?>" style="color: #fff; text-decoration:none">detail</a></button>
                    </td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>


    <?php
        include 'footer.php';
    ?>
    