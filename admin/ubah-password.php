<?php
    include 'header.php';

    $akun = mysqli_query($conn, "SELECT * FROM admin WHERE id = '".$_SESSION['uid']."'");
    $a = mysqli_fetch_object($akun);
?>


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><span style="color:#111;font-size:40px;padding-right:20px;"></span>Ubah Password </h1>
      </div>

      <form style="width: 50%;" method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" placeholder="<?= $a->username ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password lama</label>
    <input type="password" class="form-control" name="pass-lama" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password baru</label>
    <input type="password" class="form-control" name="pass-baru1" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Ulangi Password baru</label>
    <input type="password" class="form-control" name="pass-baru2" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

<?php

    if(isset($_POST['submit'])){
        $pass_lama = mysqli_real_escape_string($conn, $_POST['pass-lama']);
        $pass_baru1 = mysqli_real_escape_string($conn, $_POST['pass-baru1']);
        $pass_baru2 = mysqli_real_escape_string($conn, $_POST['pass-baru2']);

        $cek_pass = mysqli_query($conn, "SELECT password FROM admin WHERE id = '".$_SESSION['uid']."'");
        $c = mysqli_fetch_object($cek_pass);

        if( md5($pass_lama) == $c->password ){
            if($pass_baru1 == $pass_baru2){
               $update = mysqli_query($conn, "UPDATE admin SET password = '".md5($pass_baru1)."' WHERE id = '".$_SESSION['uid']."'");
               
               if($update){
                   echo "Password berhasil di ubah";
               }else{
                   echo "password gagal di ubah",mysqli_error($conn);
               }
            }else{
                echo "pasword  1 dan password 2 tidak sama";
            }
        }else{
            echo "Password yang anda masukan tidak sesuai dengan yang password lama";
        }
        
    }

?>

<?php
    include 'footer.php';
?>