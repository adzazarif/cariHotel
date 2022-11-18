<?php
    session_start();
    include '../koneksi.php';
    date_default_timezone_set("Asia/Jakarta");


    if(!$_SESSION['status_login_admin']){
      header("location: login.php");
    }

    $nama_hotel = mysqli_query($conn, "SELECT nama_hotel FROM hotel WHERE id = '".$_SESSION['uid']."'");
    $ht = mysqli_fetch_object($nama_hotel);

// ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>panel admin <?php if(mysqli_num_rows($nama_hotel) == 0){
      echo " ";
    }else{
      echo $ht->nama_hotel;
    } ?></title>
    <link rel="stylesheet" href="../assets/cssadmin/styleadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

    
    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 " style="background-color: #581845 ;">
  <a style="padding: 12px; text-decoration:none; font-size:21px; color:#fff " href="#">SELAMAT DATANG ADMIN | <span style="font-weight: bolder;"> <?php if(mysqli_num_rows($nama_hotel) == 0){
      echo "";
    }else{
      echo $ht->nama_hotel;
    } ?> </span>
  </a>

  <div class="kumpul-kanan" style="display: flex;">

  <button type="button" style="background: #581845;border:none" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Inbox">
  <i style="font-size: 25px;color:#FFC300;padding:7px " class="bi bi-envelope"></i>
</button>

<button type="button" style="background: #581845;border:none" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifikasi">
<i  style="font-size: 25px;color:#FFC300;padding:7px " class="bi bi-bell-fill"></i>
</button>

  <div class="dropdown" style="margin-right: 40px;">
  <button  style="border:none;background:#581845" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2 " data-bs-toggle="dropdown" aria-expanded="false">
  <i style="color:#fff;  font-size:25px; padding:10px" class="bi bi-person-circle"></i><span style="padding: 10px;font-size:25px"><?= $_SESSION['uname'] ?></span>
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2"> 
    <li><a class="dropdown-item " href="ubah-password.php">Ubah password</a></li>
    <li><a class="dropdown-item" onclick="return confirm('apakah yakin menghapus')" href="hapus.php?id=<?= $_SESSION['uid'] ?>">Hapus akun  </a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
  </ul>
</div>
</div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block  bg-dark sidebar collapse" style="padding: 50px 0;">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">

        <?php 
            if($_SESSION['ulevel'] == "Admin"){
        ?>
        <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="index.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-speedometer2"></i></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="hotel-admin.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-house-door"></i></span>
              Hotel
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="user.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-people-fill"></i></span>
              Pengguna
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="booking-admin.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-calendar2-check"></i></span>
              booking
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="laporan-admin.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-flag"></i></span>
              laporan
            </a>
          </li>

          
          <?php }elseif($_SESSION['ulevel'] == 'User'){ ?>

          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="index.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-speedometer2"></i></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="data-hotel.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-card-list"></i></span>
              Profil
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="data-kamar.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-house-door"></i></span>
              Kamar
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="bank.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-credit-card-2-back-fill"></i></span>
              Metode pembayaran
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="pelanggan.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-calendar2-check"></i></span>
              booking
            </a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid#333;margin:0 20px;padding:20px 0">
            <a class="nav-link" style="color: #fff;font-size:20px" href="laporan.php">
              <span style="color:#fff;font-size:20px;padding-right:10px;"><i class="bi bi-flag"></i></span>
              laporan
            </a>
          </li>
          <?php } ?>
          

        </ul>
        
      </div>
      <a class="nav-link" style="color: #FFC300;font-size:30px;bottom:1px; position:absolute;" href="index.php">       
              CariHotel.com
            </a>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
     