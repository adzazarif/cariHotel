<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/properti.css">
</head>
<body>
    <header>
        <h1>CariHotel.com</h1>

        <nav>
            <ul>
                <li class="login"><a href="admin/login.php">Login</a></li>
                <li class="daftar"><a href="admin/buat-akun.php">daftar</a></li>
            </ul>
        </nav>
    </header>
                <?php 
                        if(isset($_GET['msg'])){
                            echo "<div class='alert alert-sukses'>akun berhasil dibuat</div>";
                        }
                    ?>

    <div class="home">
        <div class="information">
            <h1>Daftarkan Properti Anda dan Berkembang Bersama CariHotel.com</h1>
            <p>Mari bergabung bersama CariHotel.com dan bersiap untuk menyambut lebih banyak tamu di propertui anda.Daftarkan beragam properti penginapan anda seperti Hotel,Villa,Resort,dan Apartmen .Kamu bisa mulai sekarang dengan proses registrasi yang mudah dan cepat!</p>
            <a href="admin/buat-akun.php">gabung sekarang</a>
        </div>

        <div class="image">
            <img src="uploads/tambahan/home1.jpg" alt="">
        </div>
    </div>

    <h1 style="padding: 300px 15%; font-size:50px;">masih dalam proses pengerjaan</h1>
    <script src="assets/js/script.js"></script>
</body>
</html>