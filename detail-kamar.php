<?php
    include 'koneksi.php';

    $kamar = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = '".$_GET['idkamar']."'");
    $kmr = mysqli_fetch_object($kamar);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="detail-kamar">

        <div class="box-info">
            <h1><?= $kmr->tipe_kamar ?></h1>
            <p class="komen">info kamar</p>
            <div class="header-info">
                <div class="tamu">
                    <p><i class="fas fa-user-circle"></i> tamu</p>
                    <span><?= $kmr->orang ?></span>
                </div>
                <div class="tamu">
                    <p><i class="fas fa-th-large"></i>ukuran kamar</p>
                    <span><?= $kmr->luas ?></span>
                </div>
                <div style="margin-bottom: 40px;" class="tamu">
                    <p><i class="fas fa-bed"></i>tipe ranjang</p>
                    <span><?= $kmr->kasur ?></span>
                </div>
            </div>
            <div class="fasilitas-info">
                <h3>fasilitas kamar</h3>
                <p><?= $kmr->fasilitas_kamar ?></p>
            </div>
            <div class="fasilitas-info">
                <h3>konektivitas</h3>
                <p><?= $kmr->konektivitas_kamar ?></p>
            </div>
            <div class="fasilitas-info">
                <h3>makanan dan minuman</h3>
                <p><?= $kmr->makanan ?></p>
            </div>
            <div class="fasilitas-info">
                <h3>deskripsi kamar</h3>
                <p><?= $kmr->deskripsi_kamar ?></p>
            </div>
        </div>

        <div class="image">

            <img id="featured" src="uploads/kamar/<?= $kmr->foto ?>" alt="">
            <a href="pfornmsj.php">kembali</a>
                <a href="porspda.pgp"></a>
            
            <div id="slider-wraper">
                <img id="slide-left" class="arrow" src="uploads/tambahan/arrow-left.png" alt="">
                <div id="slider">
                    <img class="thumbnail aktif" src="uploads/kamar/<?= $kmr->foto ?>" alt="">
                    <img class="thumbnail" src="uploads/kamar/<?= $kmr->foto1 ?>" alt="">
                    <img class="thumbnail" src="uploads/kamar/<?= $kmr->foto2 ?>" alt="">
                    <img class="thumbnail" src="uploads/kamar/<?= $kmr->foto3 ?>" alt="">
                    <img class="thumbnail" src="uploads/kamar/<?= $kmr->foto4 ?>" alt="">
                    <img class="thumbnail" src="uploads/kamar/<?= $kmr->foto5 ?>" alt="">
                </div>
                <img class="arrow" id="slide-right" src="uploads/tambahan/arrow-right.png" alt="">
            </div>
        </div>

        
    </div>

    <script >
    let thumbnail = document.getElementsByClassName('thumbnail');

let activeImage = document.getElementsByClassName('aktif');

for(var i=0; i < thumbnail.length; i++){
  thumbnail[i].addEventListener('mouseover', function(){
    if(activeImage.length > 0 ){
      activeImage[0].classList.remove('aktif')
    }
    this.classList.add('aktif')
    document.getElementById('featured').src = this.src
  })
}

let buttonRight = document.getElementById('slide-right');
let buttonLeft = document.getElementById('slide-left');

buttonLeft.addEventListener('click', function(){
    document.getElementById('slider').scrollLeft -= 280
})

buttonRight.addEventListener('click', function(){
    document.getElementById('slider').scrollLeft += 280
})
    </script>
</body>
</html>