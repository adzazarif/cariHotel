<?php
        include 'header.php';
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data kamar hotel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <?php
            if(isset($_POST['submit'])){
                $tipe = $_POST['tipe-kamar'];
                $orang = $_POST['orang'];
                $panjang = $_POST['panjang'];
                $lebar = $_POST['lebar'];
                $kasur = $_POST['kasur'];
                $des = $_POST['deskripsi'];
                $harga = $_POST['harga'];

                $kamar = implode(' • ',  $_POST['kamar']) ;
                $konektivitas = implode(' • ',  $_POST['konektivitas']) ;
                $makanan = implode(' • ',  $_POST['makanan']) ;

                $luas_total = $panjang * $lebar;
                $luas = "$luas_total m²";

                // file foto
                            $filename = $_FILES['gambar']['name'];
                            $tmpname = $_FILES['gambar']['tmp_name'];
                            $filesize = $_FILES['gambar']['size'];

                            $formatfile = pathinfo($filename, PATHINFO_EXTENSION);
                            $rename = 'kamar'.time().'.'.$formatfile;

                            $allowedtype = array('png','jpeg','jpg','gif');

                            if(!in_array($formatfile,$allowedtype)){
                                echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                            }elseif($filesize > 1000000){
                                echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                            }else{
                                move_uploaded_file($tmpname, "../uploads/kamar/" .$rename);
                            }

                             // file foto ke 1
                             $filename1 = $_FILES['gambar1']['name'];
                             $tmpname1 = $_FILES['gambar1']['tmp_name'];
                             $filesize1 = $_FILES['gambar1']['size'];
 
                             $formatfile1 = pathinfo($filename1, PATHINFO_EXTENSION);
                             $rename1 = 'kamar1'.time().'.'.$formatfile1;
 
                             $allowedtype1= array('png','jpeg','jpg','gif');
 
                             if(!in_array($formatfile1,$allowedtype1)){
                                 echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                             }elseif($filesize1 > 1000000){
                                 echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                             }else{
                                 move_uploaded_file($tmpname1, "../uploads/kamar/" .$rename1);
                             }
 
                     // file foto ke 2
                             $filename2 = $_FILES['gambar2']['name'];
                             $tmpname2 = $_FILES['gambar2']['tmp_name'];
                             $filesize2 = $_FILES['gambar2']['size'];
 
                             $formatfile2 = pathinfo($filename2, PATHINFO_EXTENSION);
                             $rename2 = 'kamar2'.time().'.'.$formatfile2;
 
                             $allowedtype2= array('png','jpeg','jpg','gif');
 
                             if(!in_array($formatfile2,$allowedtype2)){
                                 echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                             }elseif($filesize2 > 1000000){
                                 echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                             }else{
                                 move_uploaded_file($tmpname2, "../uploads/kamar/" .$rename2);
                             }
 
                                 // file foto ke 3
                                 $filename3 = $_FILES['gambar3']['name'];
                                 $tmpname3 = $_FILES['gambar3']['tmp_name'];
                                 $filesize3 = $_FILES['gambar3']['size'];
 
                                 $formatfile3 = pathinfo($filename3, PATHINFO_EXTENSION);
                                 $rename3 = 'kamar3'.time().'.'.$formatfile3;
 
                                 $allowedtype3= array('png','jpeg','jpg','gif');
 
                                 if(!in_array($formatfile3,$allowedtype3)){
                                     echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                                 }elseif($filesize3 > 1000000){
                                     echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                                 }else{
                                     move_uploaded_file($tmpname3, "../uploads/kamar/" .$rename3);
                                 }
                     
                                 // file foto ke 4
                                 $filename4 = $_FILES['gambar4']['name'];
                                 $tmpname4 = $_FILES['gambar4']['tmp_name'];
                                 $filesize4 = $_FILES['gambar4']['size'];
     
                                 $formatfile4 = pathinfo($filename4, PATHINFO_EXTENSION);
                                 $rename4 = 'kamar4'.time().'.'.$formatfile4;
     
                                 $allowedtype4= array('png','jpeg','jpg','gif');
     
                                 if(!in_array($formatfile4,$allowedtype4)){
                                     echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                                 }elseif($filesize4 > 1000000){
                                     echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                                 }else{
                                     move_uploaded_file($tmpname4, "../uploads/kamar/" .$rename4);
                                 }
             
                                 // file foto ke 5
                             $filename5 = $_FILES['gambar5']['name'];
                             $tmpname5 = $_FILES['gambar5']['tmp_name'];
                             $filesize5 = $_FILES['gambar5']['size'];
 
                             $formatfile5 = pathinfo($filename5, PATHINFO_EXTENSION);
                             $rename5 = 'kamar5'.time().'.'.$formatfile5;
 
                             $allowedtype5= array('png','jpeg','jpg','gif');
 
                             if(!in_array($formatfile5,$allowedtype5)){
                                 echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                             }elseif($filesize5 > 1000000){
                                 echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                             }else{
                                 move_uploaded_file($tmpname5, "../uploads/kamar/" .$rename5);
                             }

            $tambah = mysqli_query($conn, "INSERT INTO kamar VALUES(
                NULL,
                '".$_SESSION['uid']."',
                '".$tipe."',
                '".$orang."',
                '".$luas."',
                '".$kasur."',
                '".$kamar."',
                '".$makanan."',
                '".$konektivitas."',
                '".$des."',
                '".$harga."',
                '".$rename."',
                '".$rename1."',
                '".$rename2."',
                '".$rename3."',
                '".$rename4."',
                '".$rename5."'
            )");

            if($tambah){
                echo "<script>window.location = 'data-kamar.php?msg=data sudah di tambahkan'</script>";
            }else{
                echo '<script>alert("data gagal di tambahkan") </script>',mysqli_error($conn);
            }
        }
      ?>
    <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">

    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">tipe kamar</label>
    <select class="form-select" name="tipe-kamar" id="inputGroupSelect01">
        <option selected>Pilih tipe kamar</option>
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
    </div>
        
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">deskripsi</span>
        <input type="text" name="deskripsi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">isi kamar</label>
    <select class="form-select" name="orang" id="inputGroupSelect01">
        <option selected>berapa orang</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">panjang</span>
        <input type="text" name="panjang" placeholder="...meter" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

        <span class="input-group-text" id="inputGroup-sizing-default">lebar</span>
        <input type="text" name="lebar" placeholder="...meter" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">tipe kasur</label>
    <select class="form-select" name="kasur" id="inputGroupSelect01">
        <option selected>Pilih tipe kamar</option>
        <option value="single bed">single bed</option>
        <option value="twin bed">twin bed</option>
        <option value="double bed">double bed</option>
        <option value="queen bed">queen bed</option>
        <option value="king bed">King bed</option>
    </select>
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
                <input class="form-check-input"  type="checkbox" name="kamar[]" value="Jubah mandi">
                <label class="form-check-label" for="">
                    Jubah mandi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="AC">
                <label class="form-check-label" for="">
                    AC
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Layanan Kamar 24 Jam">
                <label class="form-check-label" for="">
                    Layanan Kamar 24 Jam
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Pengering rambut">
                <label class="form-check-label" for="">
                    Pengering rambut
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Turn down Service">
                <label class="form-check-label" for="">
                    Turn down Service
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Shower">
                <label class="form-check-label" for="">
                    Shower
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Peralatan mandi gratis">
                <label class="form-check-label" for="">
                    Peralatan mandi gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Setrika/meja setrika">
                <label class="form-check-label" for="">
                    Setrika/meja setrika
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Shower hangat dan dingin">
                <label class="form-check-label" for="">
                    Shower hangat dan dingin
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Sandal">
                <label class="form-check-label" for="">
                    Sandal
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Brankas">
                <label class="form-check-label" for="">
                    Brankas
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Bathtub">
                <label class="form-check-label" for="">
                    Bathtub
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Meja tulis">
                <label class="form-check-label" for="">
                    Meja tulis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Cermin">
                <label class="form-check-label" for="">
                    Cermin
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Tempat tidur sofa">
                <label class="form-check-label" for="">
                    Tempat tidur sofa
                </label>
            </div>

            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Kursi">
                <label class="form-check-label" for="">
                    Kursi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Lemari">
                <label class="form-check-label" for="">
                    Lemari
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Handuk disediakan">
                <label class="form-check-label" for="">
                    Handuk disediakan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Kamar kedap suara">
                <label class="form-check-label" for="">
                    Kamar kedap suara
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Tersedia pintu terhubung">
                <label class="form-check-label" for="">
                    Tersedia pintu terhubung
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Shower rainfall">
                <label class="form-check-label" for="">
                    Shower rainfall
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="kamar[]" value="Balkon">
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
                <input class="form-check-input" type="checkbox" name="konektivitas[]" value="Televisi">
                <label class="form-check-label" for="">
                    Televisi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" value="Telepon">
                <label class="form-check-label" for="">
                Telepon
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" value="Wi-Fi Gratis">
                <label class="form-check-label" for="">
                Wi-Fi Gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" value="Wi-Fi (biaya tambahan)">
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
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Air minum kemasan gratis">
                <label class="form-check-label" for="">
                    Air minum kemasan gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Minibar">
                <label class="form-check-label" for="">
                Minibar
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Fasilitas membuat kopi/teh">
                <label class="form-check-label" for="">
                Fasilitas membuat kopi/teh
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Microwave">
                <label class="form-check-label" for="">
                Microwave
                </label>
            </div>

      </div>
    </div>
  </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">harga per malam</span>
        <input type="text" name="harga" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">foto kamar</label>
        <input class="form-control" name="gambar" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <input class="form-control" name="gambar1" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <input class="form-control" name="gambar2" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <input class="form-control" name="gambar3" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <input class="form-control" name="gambar4" type="file" id="formFile">
    </div>
    <div class="mb-3">
        <input class="form-control" name="gambar5" type="file" id="formFile">
    </div>
    <input type="submit" name="submit" class="btn-check" id="btn-check-outlined" autocomplete="off">
    <label class="btn btn-outline-primary" for="btn-check-outlined">tambahkan</label><br>
    </form>
    </div>
    <?php
        include 'footer.php';
    ?>
    