<?php
        include 'header.php';
        $kamar = mysqli_query($conn, "SELECT * FROM kamar WHERE id_kamar = '".$_GET['id']."'");
            if(mysqli_num_rows($kamar) == 1){
                $k = mysqli_fetch_array($kamar);

                $c_kamar = explode(' • ', $k['fasilitas_kamar']);
                $c_makanan = explode(' • ', $k['makanan']);
                $c_konektivitas = explode(' • ', $k['konektivitas_kamar']);
            }
    ?>
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Data kamar</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">

    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">tipe kamar</label>
    <select class="form-select" name="tipe-kamar" id="inputGroupSelect01">
        <option selected><?= $k['tipe_kamar'] ?></option>
        <option value="Standard Room">Standard Room</option>
        <option value="Superior Room">Superior Room</option>
        <option value="Deluxe Room">Deluxe Room</option>
        <option value="Junior Suite Room">Junior Suite Room</option>
        <option value="Suite Room">Suite Room</option>
        <option value="Presidential Suite">Presidential Suite</option>
        <option value=" Single Room"> Single Room</option>
        <option value="Twin Room">Twin Room</option>
        <option value="Double Room">Double Room</option>
        <option value="Family Room/Triple Room">Family Room/Triple Room</option>
        <option value="Connecting Room">Connecting Room</option>
        <option value="Murphy Room">Murphy Room</option>
        <option value="Cabana Room">Cabana Room</option>
    </select>
    </select>
    </div>
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">isi kamar</label>
    <select class="form-select" name="orang" id="inputGroupSelect01">
        <option selected><?= $k['orang'] ?></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">luas</span>
        <input type="text" name="luas" value="<?= $k['luas'] ?>" placeholder="...m²" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">tipe kasur</label>
    <select class="form-select" name="kasur" id="inputGroupSelect01">
        <option selected><?= $k['kasur'] ?></option>
        <option value="single bed">single bed</option>
        <option value="twin bed">twin bed</option>
        <option value="double bed">double bed</option>
        <option value="queen bed">queen bed</option>
        <option value="king bed">King bed</option>
    </select>
    </div>


    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">deskripsi</span>
        <input type="text" name="deskripsi" value="<?= $k['deskripsi_kamar'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

     <!-- INPUTAN FASILITAS KAMAR -->

     <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
         fasilitas Kamar
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input"  type="checkbox" name="kamar[]" <?php in_array('Jubah mandi', $c_kamar) ? print 'checked' : ' ' ?> value="Jubah mandi">
                <label class="form-check-label" for="">
                    Jubah mandi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('AC', $c_kamar) ? print 'checked' : ' ' ?> value="AC">
                <label class="form-check-label" for="">
                    AC
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Layanan Kamar 24 Jam', $c_kamar) ? print 'checked' : ' ' ?> value="Layanan Kamar 24 Jam">
                <label class="form-check-label" for="">
                    Layanan Kamar 24 Jam
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Pengering rambut', $c_kamar) ? print 'checked' : ' ' ?> value="Pengering rambut">
                <label class="form-check-label" for="">
                    Pengering rambut
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Turn down Service', $c_kamar) ? print 'checked' : ' ' ?> value="Turn down Service">
                <label class="form-check-label" for="">
                    Turn down Service
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Shower', $c_kamar) ? print 'checked' : ' ' ?> value="Shower">
                <label class="form-check-label" for="">
                    Shower
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Peralatan mandi gratis', $c_kamar) ? print 'checked' : ' ' ?> value="Peralatan mandi gratis">
                <label class="form-check-label" for="">
                    Peralatan mandi gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Setrika/meja setrika', $c_kamar) ? print 'checked' : ' ' ?> value="Setrika/meja setrika">
                <label class="form-check-label" for="">
                    Setrika/meja setrika
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Shower hangat dan dingin', $c_kamar) ? print 'checked' : ' ' ?> value="Shower hangat dan dingin">
                <label class="form-check-label" for="">
                    Shower hangat dan dingin
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Sandal', $c_kamar) ? print 'checked' : ' ' ?> value="Sandal">
                <label class="form-check-label" for="">
                    Sandal
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Brankas', $c_kamar) ? print 'checked' : ' ' ?> value="Brankas">
                <label class="form-check-label" for="">
                    Brankas
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Bathtub', $c_kamar) ? print 'checked' : ' ' ?> value="Bathtub">
                <label class="form-check-label" for="">
                    Bathtub
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Meja tulis', $c_kamar) ? print 'checked' : ' ' ?> value="Meja tulis">
                <label class="form-check-label" for="">
                    Meja tulis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Cermin', $c_kamar) ? print 'checked' : ' ' ?> value="Cermin">
                <label class="form-check-label" for="">
                    Cermin
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Tempat tidur sofa', $c_kamar) ? print 'checked' : ' ' ?> value="Tempat tidur sofa">
                <label class="form-check-label" for="">
                    Tempat tidur sofa
                </label>
            </div>

            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Kursi', $c_kamar) ? print 'checked' : ' ' ?> value="Kursi">
                <label class="form-check-label" for="">
                    Kursi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Lemari', $c_kamar) ? print 'checked' : ' ' ?> value="Lemari">
                <label class="form-check-label" for="">
                    Lemari
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Handuk disediakan', $c_kamar) ? print 'checked' : ' ' ?> value="Handuk disediakan">
                <label class="form-check-label" for="">
                    Handuk disediakan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Kamar kedap suara', $c_kamar) ? print 'checked' : ' ' ?> value="Kamar kedap suara">
                <label class="form-check-label" for="">
                    Kamar kedap suara
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Tersedia pintu terhubung', $c_kamar) ? print 'checked' : ' ' ?> value="Tersedia pintu terhubung">
                <label class="form-check-label" for="">
                    Tersedia pintu terhubung
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Shower rainfall', $c_kamar) ? print 'checked' : ' ' ?> value="Shower rainfall">
                <label class="form-check-label" for="">
                    Shower rainfall
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" <?php in_array('Balkon', $c_kamar) ? print 'checked' : ' ' ?> value="Balkon">
                <label class="form-check-label" for="">
                    Balkon
                </label>
            </div>
      </div>
    </div>
  </div>

       <!-- INPUTAN KONEKTIVITAS -->
       <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
        Konektivitas
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" <?php in_array('Televisi', $c_konektivitas) ? print 'checked' : ' ' ?> value="Televisi">
                <label class="form-check-label" for="">
                    Televisi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" <?php in_array('Telepon', $c_konektivitas) ? print 'checked' : ' ' ?> value="Telepon">
                <label class="form-check-label" for="">
                Telepon
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" <?php in_array('Wi-Fi Gratis', $c_konektivitas) ? print 'checked' : ' ' ?> value="Wi-Fi Gratis">
                <label class="form-check-label" for="">
                Wi-Fi Gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" <?php in_array('Wi-Fi (biaya tambahan)', $c_konektivitas) ? print 'checked' : ' ' ?> value="Wi-Fi (biaya tambahan)">
                <label class="form-check-label" for="">
                Wi-Fi (biaya tambahan)
                </label>
            </div>

      </div>
    </div>
  </div>

   <!-- INPUTAN MAKANAN DAN MINUMAN -->
   <div class="accordion-item" style="margin-bottom: 15px;">
    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
        Makanan Dan Minuman
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Air minum kemasan gratis', $c_makanan) ? print 'checked' : ' ' ?> value="Air minum kemasan gratis">
                <label class="form-check-label" for="">
                    Air minum kemasan gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Minibar', $c_makanan) ? print 'checked' : ' ' ?> value="Minibar">
                <label class="form-check-label" for="">
                Minibar
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Fasilitas membuat kopi/teh', $c_makanan) ? print 'checked' : ' ' ?> value="Fasilitas membuat kopi/teh">
                <label class="form-check-label" for="">
                Fasilitas membuat kopi/teh
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Microwave', $c_makanan) ? print 'checked' : ' ' ?> value="Microwave">
                <label class="form-check-label" for="">
                Microwave
                </label>
            </div>

      </div>
    </div>
  </div>
 

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">harga per malam</span>
        <input type="text" name="harga" value="<?= $k['harga_permalam']?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px; border:1px solid; padding:5px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/kamar/<?= $k['foto'] ?>" alt="">
        <input type="hidden" name="gambar" value="<?= $k['foto']?>">
        <input class="form-control" name="gambar-update" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px;margin-bottom:10px; border:1px solid; padding:5px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/kamar/<?= $k['foto1'] ?>" alt="">
        <input type="hidden" name="gambar1" value="<?= $k['foto1']?>">
        <input class="form-control" name="gambar-update1" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px;margin-bottom:10px; border:1px solid; padding:5px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/kamar/<?= $k['foto2'] ?>" alt="">
        <input type="hidden" name="gambar2" value="<?= $k['foto2']?>">
        <input class="form-control" name="gambar-update2" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px;margin-bottom:10px; border:1px solid; padding:5px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/kamar/<?= $k['foto3'] ?>" alt="">
        <input type="hidden" name="gambar3" value="<?= $k['foto3']?>">
        <input class="form-control" name="gambar-update3" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px;margin-bottom:10px; border:1px solid; padding:5px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/kamar/<?= $k['foto4'] ?>" alt="">
        <input type="hidden" name="gambar4" value="<?= $k['foto4']?>">
        <input class="form-control" name="gambar-update4" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px; margin-bottom: 10px; border:1px solid; padding:5px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/kamar/<?= $k['foto5'] ?>" alt="">
        <input type="hidden" name="gambar5" value="<?= $k['foto5']?>">
        <input class="form-control" name="gambar-update5" type="file" id="formFile">
    </div>


    <input type="submit" name="submit" class="btn-check" id="btn-check-outlined" autocomplete="off">
    <label class="btn btn-outline-primary" for="btn-check-outlined">tambahkan</label><br>
    </form>
    </div>

    <?php
            if(isset($_POST['submit'])){
                $tipe = $_POST['tipe-kamar'];
                $orang = $_POST['orang'];
                $luas = $_POST['luas'];
                $kasur = $_POST['kasur'];
                $des = $_POST['deskripsi'];
                $harga = $_POST['harga'];

                $kamar = implode(' • ',  $_POST['kamar']) ;
                $konektivitas = implode(' • ',  $_POST['konektivitas']) ;
                $makanan = implode(' • ',  $_POST['makanan']) ;


                // file foto
                if($_FILES['gambar-update']['name']!= ''){
                    $filename = $_FILES['gambar-update']['name'];
                    $tmpname = $_FILES['gambar-update']['tmp_name'];
                    $filesize = $_FILES['gambar-update']['size'];

                    $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                    $rename = 'kamar'.time().'.'.$formatfile;
                    $currdate = date('Y-m-d H:i:s');
                    $allowedtype = array('png','jpeg','jpg','gif');
                    if(!in_array($formatfile,$allowedtype)){
                        echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                        return false;
                    }elseif($filesize > 1000000){
                        echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                        return false;
                        
                    }else{
                        if(file_exists("../uploads/kamar/" .$_POST['gambar'])){
                            unlink("../uploads/kamar/" .$_POST['gambar']);
                        }
                    }
                    

                    move_uploaded_file($tmpname, "../uploads/kamar/" .$rename);
                }else{
                    $rename = $_POST['gambar'];
                }

                 //menampung dan validasi update1

                 if($_FILES['gambar-update1']['name']!= ''){
                    $filename_update1  = $_FILES['gambar-update1']['name'];
                    $tmpname_update1   = $_FILES['gambar-update1']['tmp_name'];
                    $filesize_update1  = $_FILES['gambar-update1']['size'];

                    $formatfile_update1    = pathinfo($filename_update1, PATHINFO_EXTENSION);
                    $rename_update1        = 'kamar6'.time().'.'.$formatfile_update1;
                    $allowedtype_update1   = array('png','jpeg','jpg','gif');

                    if(!in_array($formatfile_update1,$allowedtype_update1)){
                        echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                        return false;
                    }elseif($filesize_update1 > 1000000){
                        echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                        return false;
                        ;
                    }else{
                        if(file_exists("../uploads/kamar/" .$_POST['gambar1'])){
                            unlink("../uploads/kamar/" .$_POST['gambar1']);
                        }
                    }
                    

                    move_uploaded_file($tmpname_update1, "../uploads/kamar/" .$rename_update1);
                }else{
    
                    $rename_update1 = $_POST['gambar1'];
                }

                //menampung dan validasi update2

                if($_FILES['gambar-update2']['name']!= ''){
                    $filename_update2  = $_FILES['gambar-update2']['name'];
                    $tmpname_update2   = $_FILES['gambar-update2']['tmp_name'];
                    $filesize_update2  = $_FILES['gambar-update2']['size'];

                    $formatfile_update2    = pathinfo($filename_update2, PATHINFO_EXTENSION);
                    $rename_update2        = 'kamar7'.time().'.'.$formatfile_update2;
                    $allowedtype_update2   = array('png','jpeg','jpg','gif');

                    if(!in_array($formatfile_update2,$allowedtype_update2)){
                        echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                        return false;
                    }elseif($filesize_update2 > 1000000){
                        echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                        return false;
                        ;
                    }else{
                        if(file_exists("../uploads/kamar/" .$_POST['gambar2'])){
                            unlink("../uploads/kamar/" .$_POST['gambar2']);
                        }
                    }
                    

                    move_uploaded_file($tmpname_update2, "../uploads/kamar/" .$rename_update2);
                }else{
    
                    $rename_update2 = $_POST['gambar2'];
                }

                 //menampung dan validasi update3

                 if($_FILES['gambar-update3']['name']!= ''){
                    $filename_update3  = $_FILES['gambar-update3']['name'];
                    $tmpname_update3   = $_FILES['gambar-update3']['tmp_name'];
                    $filesize_update3  = $_FILES['gambar-update3']['size'];

                    $formatfile_update3    = pathinfo($filename_update3, PATHINFO_EXTENSION);
                    $rename_update3        = 'kamar8'.time().'.'.$formatfile_update3;
                    $allowedtype_update3   = array('png','jpeg','jpg','gif');

                    if(!in_array($formatfile_update3,$allowedtype_update3)){
                        echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                        return false;
                    }elseif($filesize_update3 > 1000000){
                        echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                        return false;
                        ;
                    }else{
                        if(file_exists("../uploads/kamar/" .$_POST['gambar3'])){
                            unlink("../uploads/kamar/" .$_POST['gambar3']);
                        }
                    }
                    

                    move_uploaded_file($tmpname_update3, "../uploads/kamar/" .$rename_update3);
                }else{
    
                    $rename_update3 = $_POST['gambar3'];
                }

                 //menampung dan validasi update4

                 if($_FILES['gambar-update4']['name']!= ''){
                    $filename_update4  = $_FILES['gambar-update4']['name'];
                    $tmpname_update4   = $_FILES['gambar-update4']['tmp_name'];
                    $filesize_update4  = $_FILES['gambar-update4']['size'];

                    $formatfile_update4    = pathinfo($filename_update4, PATHINFO_EXTENSION);
                    $rename_update4        = 'kamar9'.time().'.'.$formatfile_update4;
                    $allowedtype_update4   = array('png','jpeg','jpg','gif');

                    if(!in_array($formatfile_update4,$allowedtype_update4)){
                        echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                        return false;
                    }elseif($filesize_update4 > 1000000){
                        echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                        return false;
                        ;
                    }else{
                        if(file_exists("../uploads/kamar/" .$_POST['gambar4'])){
                            unlink("../uploads/kamar/" .$_POST['gambar4']);
                        }
                    }
                    

                    move_uploaded_file($tmpname_update4, "../uploads/kamar/" .$rename_update4);
                }else{
    
                    $rename_update4 = $_POST['gambar4'];
                }

                 //menampung dan validasi update5

                 if($_FILES['gambar-update5']['name']!= ''){
                    $filename_update5  = $_FILES['gambar-update5']['name'];
                    $tmpname_update5   = $_FILES['gambar-update5']['tmp_name'];
                    $filesize_update5  = $_FILES['gambar-update5']['size'];

                    $formatfile_update5    = pathinfo($filename_update5, PATHINFO_EXTENSION);
                    $rename_update5        = 'kamar10'.time().'.'.$formatfile_update5;
                    $allowedtype_update5   = array('png','jpeg','jpg','gif');

                    if(!in_array($formatfile_update5,$allowedtype_update5)){
                        echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                        return false;
                    }elseif($filesize_update5 > 1000000){
                        echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                        return false;
                        ;
                    }else{
                        if(file_exists("../uploads/kamar/" .$_POST['gambar5'])){
                            unlink("../uploads/kamar/" .$_POST['gambar5']);
                        }
                    }
                    

                    move_uploaded_file($tmpname_update5, "../uploads/kamar/" .$rename_update5);
                }else{
    
                    $rename_update5 = $_POST['gambar5'];
                }

            $update = mysqli_query($conn, "UPDATE kamar SET
                    tipe_kamar =    '".$tipe."',
                    orang =    '".$orang."',
                    luas =    '".$luas."',
                    kasur =    '".$kasur."',
                    fasilitas_kamar =    '".$kamar."',
                    makanan =    '".$makanan."',
                    konektivitas_kamar =    '".$konektivitas."',
                    deskripsi_kamar =    '".$des."',
                    harga_permalam =   '".$harga."',
                    foto =    '".$rename."',
                    foto1 =    '".$rename_update1."',
                    foto2 =    '".$rename_update2."',
                    foto3 =    '".$rename_update3."',
                    foto4 =    '".$rename_update4."',
                    foto5 =    '".$rename_update5."'
                    WHERE id_kamar = '".$_GET['id']."'
            ");

            if($update){
                echo  "<script>window.location = 'data-kamar.php?msg=data sudah diupdate'</script>";
            }else{
                echo '<script>alert("data gagal di update") </script>',mysqli_error($conn);
            }
        }
        ?>
<?php
        include 'footer.php';
    ?>