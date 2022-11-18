<?php
    include '../koneksi.php';
    
    session_start();
error_reporting(0);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/cssadmin/styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script>
        window.print();
    </script>
</head>
<body>
    


    <div class="cetak-laporan">
        <h1>laporan booking</h1>
        <p>dari tanggal : <?=date('d F Y',strtotime( $_POST['mulai'])) ?> <span class="tab">sampai tanggal : <?=date('d F Y',strtotime( $_POST['sampai'])) ?></span></p>

    </div>
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th>no booking</th>
                    <th>nama</th>
                    <th>tipe kamar</th>
                    <th>tanggal kedatangan</th>
                    <th>tanggal keluar</th>
                    <th>lama</th>
                    <th>jumlah kamar</th>
                    <th>tamu</th>
                    <th>total</th>          
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                $cetak = mysqli_query($conn, "SELECT * FROM reservasi LEFT JOIN pelanggan USING (id_pelanggan) WHERE id = '".$_SESSION['uid']."' AND tgl_kedatangan BETWEEN '".$_POST['mulai']."' AND '".$_POST['sampai']."' ");
                if(mysqli_num_rows($cetak) > 0){
                    while($c = mysqli_fetch_array($cetak)){
        

    ?>
                    <td><?= $c['order_id']?></td>
                    <td><?= $c['nama']?></td>
                    <td><?= $c['tipe_kamar']?></td>
                    <td><?= date('d F Y', strtotime($c['tgl_kedatangan'])) ?></td>
                    <td><?= date('d F Y', strtotime($c['tgl_keluar'])) ?></td>
                    <td><?= $c['lama_menginap']?></td>
                    <td><?= $c['jml_kamar']?></td>
                    <td><?= $c['tamu']?></td>
                    <td><?= $c['pembayaran']?></td>
 
                    
                </tr>
                <?php }} ?>
            </tbody>
        </table>

</body>
</html>