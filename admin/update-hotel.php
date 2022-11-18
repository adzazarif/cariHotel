<?php
        include 'header.php';

    // AMBIL DATA HOTEL DAN FOTO
        $liat = mysqli_query($conn, "SELECT * FROM hotel LEFT JOIN foto_hotel USING (id) WHERE id_hotel = '".$_GET['id']."'");
        $a = mysqli_fetch_object($liat);
    // AMBIL DATA FASILITAS
        $explode = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id = '".$_SESSION['uid']."'");
        $c = mysqli_fetch_array($explode);
        
        $c_umum = explode(' • ', $c['fasilitas_umum']);
        $c_layanan = explode(' • ', $c['layanan_hotel']);
        $c_anak = explode(' • ', $c['fasilitas_anak']);
        $c_bisnis = explode(' • ', $c['fasilitas_bisnis']);
        $c_konektivitas = explode(' • ', $c['konektivitas']);
        $c_transportasi = explode(' • ', $c['transportasi']);
        $c_makanan = explode(' • ', $c['makanan_minuman']);
        $c_olahraga = explode(' • ', $c['olahraga_rekreasi']);

        var_dump($c_umum);
        echo $c_umum[0];

       
            
        
    ?>
    <?php
     foreach($c_umum as $sad){
    ?>
    <p><?= $sad ?></p>

    <?php } ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Hotel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      
    <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">nama hotel</span>
        <input type="text" name="nama-hotel" value="<?= $a->nama_hotel ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">opsi</label>
    <select class="form-select" name="lokasi" id="inputGroupSelect01">
        <option selected><?= $a->lokasi ?></option>
        <option value="Jawa Timur">Jawa Timur</option>
        <option value="Bali">Bali</option>
        <option value="Jawa Barat">Jawa Barat</option>
        <option value="lombok">lombok</option>
        <option value="Malang">malang</option>
        <option value="surabaya">surabaya</option>
        <option value="Jawa Tengah">Jawa Tengah</option>
        <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
        <option value="surabaya">surabaya</option>
    </select>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Alamat lokasi</span>
        <input type="text" name="alamat-lokasi" value="<?= $a->alamat ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">link gogle maps</span>
        <input type="text" name="google-maps" value="<?= $a->google_maps ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Bintang</span>
        <input type="number" name="bintang" value="<?= $a->bintang ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">start harga</span>
        <input type="number" name="start" value="<?= $a->start_harga ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    
    <!-- INPUTAN FASILITAS UMUM -->

    <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
         Umum
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input"  type="checkbox" name="umum[]"  value="Kolam renang" <?php in_array('Kolam renang', $c_umum) ? print 'checked' : ' ' ?>>
                <label class="form-check-label" for="">
                    Kolam renang
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('AC', $c_umum) ? print 'checked' : ' ' ?> value="AC">
                <label class="form-check-label" for="">
                    AC
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Teras', $c_umum) ? print 'checked' : ' ' ?> value="Teras">
                <label class="form-check-label" for="">
                    Teras
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Parkir', $c_umum) ? print 'checked' : ' ' ?> value="Parkir">
                <label class="form-check-label" for="">
                    Parkir
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Restoran', $c_umum) ? print 'checked' : ' ' ?> value="Restoran">
                <label class="form-check-label" for="">
                    Restoran
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Lift', $c_umum) ? print 'checked' : ' ' ?> value="Lift">
                <label class="form-check-label" for="">
                    Lift
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Akses kursi roda', $c_umum) ? print 'checked' : ' ' ?> value="Akses kursi roda">
                <label class="form-check-label" for="">
                    Akses kursi roda
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Ruang santai', $c_umum) ? print 'checked' : ' ' ?> value="Ruang santai">
                <label class="form-check-label" for="">
                    Ruang santai
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Tempat berjemur', $c_umum) ? print 'checked' : ' ' ?> value="Tempat berjemur">
                <label class="form-check-label" for="">
                    Tempat berjemur
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Pantai', $c_umum) ? print 'checked' : ' ' ?> value="Pantai">
                <label class="form-check-label" for="">
                    Pantai
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Kursi bayi', $c_umum) ? print 'checked' : ' ' ?> value="Kursi bayi">
                <label class="form-check-label" for="">
                    Kursi bayi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Ruang merokok', $c_umum) ? print 'checked' : ' ' ?> value="Ruang merokok">
                <label class="form-check-label" for="">
                    Ruang merokok
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Gazabo', $c_umum) ? print 'checked' : ' ' ?> value="Gazabo">
                <label class="form-check-label" for="">
                    Gazabo
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Fasilitas rapat', $c_umum) ? print 'checked' : ' ' ?> value="Fasilitas rapat">
                <label class="form-check-label" for="">
                    Fasilitas rapat
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Perpustakaan', $c_umum) ? print 'checked' : ' ' ?> value="Perpustakaan">
                <label class="form-check-label" for="">
                    Perpustakaan
                </label>
            </div>

            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" <?php in_array('Ruang tamu', $c_umum) ? print 'checked' : ' ' ?> value="Ruang tamu">
                <label class="form-check-label" for="">
                    Ruang tamu
                </label>
            </div>
      </div>
    </div>
  </div>


        <!-- INPUTAN LAYANAN HOTEL -->

        <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Layanan
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Layanan pernikahan', $c_layanan) ? print 'checked' : ' ' ?> value="Layanan pernikahan">
                <label class="form-check-label" for="">
                    Layanan pernikahan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Layanan concierge', $c_layanan) ? print 'checked' : ' ' ?> value="Layanan concierge">
                <label class="form-check-label" for="">
                Layanan concierge
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Resepsionis 24 jam', $c_layanan) ? print 'checked' : ' ' ?> value="Resepsionis 24 jam">
                <label class="form-check-label" for="">
                Resepsionis 24 jam
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Penitipan bagasi', $c_layanan) ? print 'checked' : ' ' ?> value="Penitipan bagasi">
                <label class="form-check-label" for="">
                Penitipan bagasi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Staf multibahasa', $c_layanan) ? print 'checked' : ' ' ?> value="Staf multibahasa">
                <label class="form-check-label" for="">
                Staf multibahasa
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Layanan laundry/dry cleaning', $c_layanan) ? print 'checked' : ' ' ?> value="Layanan laundry/dry cleaning">
                <label class="form-check-label" for="">
                Layanan laundry/dry cleaning
                </label>
            </div>


            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Tour', $c_layanan) ? print 'checked' : ' ' ?> value="Tour">
                <label class="form-check-label" for="">
                Tour
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Penukaran mata uang', $c_layanan) ? print 'checked' : ' ' ?> value="Penukaran mata uang">
                <label class="form-check-label" for="">
                Penukaran mata uang
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" <?php in_array('Rak koran', $c_layanan) ? print 'checked' : ' ' ?> value="Rak koran">
                <label class="form-check-label" for="">
                Rak koran
                </label>
            </div>

      </div>
    </div>
  </div>


        <!-- INPUTAN FASILITAS BISNIS -->
        <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
       Bisnis
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Pusat bisnis', $c_bisnis) ? print 'checked' : ' ' ?>  value="Pusat bisnis">
                <label class="form-check-label" for="">
                    Pusat bisnis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Proyektor', $c_bisnis) ? print 'checked' : ' ' ?>  value="Proyektor">
                <label class="form-check-label" for="">
                Proyektor
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Ruang rapat', $c_bisnis) ? print 'checked' : ' ' ?>  value="Ruang rapat">
                <label class="form-check-label" for="">
                Ruang rapat
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Ruang konferensi', $c_bisnis) ? print 'checked' : ' ' ?>  value="Ruang konferensi">
                <label class="form-check-label" for="">
                Ruang konferensi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Mesin foto kopi', $c_bisnis) ? print 'checked' : ' ' ?>  value="Mesin foto kopi">
                <label class="form-check-label" for="">
                Mesin foto kopi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Unit komputer', $c_bisnis) ? print 'checked' : ' ' ?>  value="Unit komputer">
                <label class="form-check-label" for="">
                Unit komputer
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Ruang Komputer', $c_bisnis) ? print 'checked' : ' ' ?>  value="Ruang Komputer">
                <label class="form-check-label" for="">
                Ruang Komputer
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Layanan Sekertaris', $c_bisnis) ? print 'checked' : ' ' ?>  value="Layanan Sekertaris">
                <label class="form-check-label" for="">
                Layanan Sekertaris
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('teater / auditorium', $c_bisnis) ? print 'checked' : ' ' ?>  value="teater / auditorium">
                <label class="form-check-label" for="">
                    teater / auditorium
                </label>
            </div>
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" <?php in_array('Printer', $c_bisnis) ? print 'checked' : ' ' ?>  value="Printer">
                <label class="form-check-label" for="">
                    Printer
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
                <input class="form-check-input" type="checkbox" name="konektivitas[]" <?php in_array('Wi-Fi Gratis', $c_konektivitas) ? print 'checked' : ' ' ?> value="Wi-Fi Gratis">
                <label class="form-check-label" for="">
                Wi-Fi Gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="konektivitas[]" <?php in_array('biaya tambahan', $c_konektivitas) ? print 'checked' : ' ' ?> value="Wi-Fi (biaya tambahan)">
                <label class="form-check-label" for="">
                Wi-Fi (biaya tambahan)
                </label>
            </div>

      </div>
    </div>
  </div>

   <!-- INPUTAN MAKANAN DAN MINUMAN -->
   <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
        Makanan Dan Minuman
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Bar di atap', $c_makanan) ? print 'checked' : ' ' ?> value="Bar di atap">
                <label class="form-check-label" for="">
                    Bar di atap
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Ruang makan', $c_makanan) ? print 'checked' : ' ' ?> value="Ruang makan">
                <label class="form-check-label" for="">
                Ruang makan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Lemari es', $c_makanan) ? print 'checked' : ' ' ?> value="Lemari es">
                <label class="form-check-label" for="">
                Lemari es
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Kafe atau kedai kopi', $c_makanan) ? print 'checked' : ' ' ?> value="Kafe atau kedai kopi">
                <label class="form-check-label" for="">
                Kafe atau kedai kopi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Microwave', $c_makanan) ? print 'checked' : ' ' ?> value="Microwave">
                <label class="form-check-label" for="">
                Microwave
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Club Malam', $c_makanan) ? print 'checked' : ' ' ?> value="Club Malam">
                <label class="form-check-label" for="">
                Club Malam
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Bar tepi kolam renang', $c_makanan) ? print 'checked' : ' ' ?> value="Bar tepi kolam renang">
                <label class="form-check-label" for="">
               Bar tepi kolam renang
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Bar', $c_makanan) ? print 'checked' : ' ' ?> value="Bar">
                <label class="form-check-label" for="">
               Bar
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Sarapan', $c_makanan) ? print 'checked' : ' ' ?> value="Sarapan">
                <label class="form-check-label" for="">
               Sarapan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Sarapan (biaya tambahan', $c_makanan) ? print 'checked' : ' ' ?> value="Sarapan (biaya tambahan)">
                <label class="form-check-label" for="">
               Sarapan (biaya tambahan)
                </label>
            </div>
            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('Bar pantai', $c_makanan) ? print 'checked' : ' ' ?> value="Bar pantai">
                <label class="form-check-label" for="">
                    Bar pantai
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" <?php in_array('yanan makan pribadi', $c_makanan) ? print 'checked' : ' ' ?> value="Layanan makan pribadi">
                <label class="form-check-label" for="">
                Layanan makan pribadi
                </label>
            </div>
      </div>
    </div>
  </div>

     <!-- INPUTAN Transportasi -->
     <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingSix">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
        Transportasi
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" <?php in_array('Antar /Jemput Bandara (biaya tambahan)', $c_transportasi) ? print 'checked' : ' ' ?> value="Antar /Jemput Bandara (biaya tambahan)">
                <label class="form-check-label" for="">
                Antar /Jemput Bandara (biaya tambahan)
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" <?php in_array('Penyewaan mobil', $c_transportasi) ? print 'checked' : ' ' ?> value="Penyewaan mobil">
                <label class="form-check-label" for="">
                Penyewaan mobil
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" <?php in_array('Penyewaan motor', $c_transportasi) ? print 'checked' : ' ' ?> value="Penyewaan motor">
                <label class="form-check-label" for="">
                Penyewaan motor
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" <?php in_array('Layanan taksi', $c_transportasi) ? print 'checked' : ' ' ?> value="Layanan taksi">
                <label class="form-check-label" for="">
                Layanan taksi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" <?php in_array('Parkir valet gratis', $c_transportasi) ? print 'checked' : ' ' ?> value="Parkir valet gratis">
                <label class="form-check-label" for="">
                Parkir valet gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" <?php in_array('Parkir mobil', $c_transportasi) ? print 'checked' : ' ' ?> value="Parkir mobil">
                <label class="form-check-label" for="">
                Parkir mobil
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" <?php in_array('Parkir bus', $c_transportasi) ? print 'checked' : ' ' ?> value="Parkir bus">
                <label class="form-check-label" for="">
                Parkir bus
                </label>
            </div>

      </div>
    </div>
  </div>

     <!-- INPUTAN Olahraga ,Spa , Rekreasi -->
     <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
        Olahraga ,Spa , Rekreasi
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSeven">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Board game', $c_olahraga) ? print 'checked' : ' ' ?> value="Board game">
                <label class="form-check-label" for="">
                Board game
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Tenis meja', $c_olahraga) ? print 'checked' : ' ' ?> value="Tenis meja">
                <label class="form-check-label" for="">
                Tenis meja
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Biliar', $c_olahraga) ? print 'checked' : ' ' ?> value="Biliar">
                <label class="form-check-label" for="">
                Biliar
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Fitness', $c_olahraga) ? print 'checked' : ' ' ?> value="Fitness">
                <label class="form-check-label" for="">
                Fitness
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Tenis', $c_olahraga) ? print 'checked' : ' ' ?> value="Tenis">
                <label class="form-check-label" for="">
                Tenis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Ruang game', $c_olahraga) ? print 'checked' : ' ' ?> value="Ruang game">
                <label class="form-check-label" for="">
                Ruang game
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Kolam renang pribadi', $c_olahraga) ? print 'checked' : ' ' ?> value="Kolam renang pribadi">
                <label class="form-check-label" for="">
                Kolam renang pribadi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Golf', $c_olahraga) ? print 'checked' : ' ' ?> value="Golf">
                <label class="form-check-label" for="">
               Golf
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Grill barbekyu', $c_olahraga) ? print 'checked' : ' ' ?> value="Grill barbekyu">
                <label class="form-check-label" for="">
                Grill barbekyu
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('lapangan sepak bola', $c_olahraga) ? print 'checked' : ' ' ?> value="lapangan sepak bola">
                <label class="form-check-label" for="">
               lapangan sepak bola
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Pijat ++ (awkoawk)', $c_olahraga) ? print 'checked' : ' ' ?> value="Pijat ++ (awkoawk)">
                <label class="form-check-label" for="">
               Pijat ++ (awkoawk)
                </label>
            </div>
            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" <?php in_array('Spa', $c_olahraga) ? print 'checked' : ' ' ?> value="Spa">
                <label class="form-check-label" for="">
                    Spa
                </label>
            </div>
      </div>
    </div>
  </div>

      
     <!-- INPUTAN Fasilitas anak -->
     <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingEight">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
       Fasilitas anak
      </button>
    </h2>
    <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingEight">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" <?php in_array('Klub anak', $c_anak) ? print 'checked' : ' ' ?> value="Klub anak">
                <label class="form-check-label" for="">
                Klub anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" <?php in_array('Tempat tidur bayi', $c_anak) ? print 'checked' : ' ' ?> value="Tempat tidur bayi">
                <label class="form-check-label" for="">
                Tempat tidur bayi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" <?php in_array('Kolam anak', $c_anak) ? print 'checked' : ' ' ?> value="Kolam anak">
                <label class="form-check-label" for="">
                Kolam anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" <?php in_array('Penitipan bayi atau anak', $c_anak) ? print 'checked' : ' ' ?> value="Penitipan bayi atau anak">
                <label class="form-check-label" for="">
                Penitipan bayi atau anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" <?php in_array('Kolam anak', $c_anak) ? print 'checked' : ' ' ?> value="Kolam anak">
                <label class="form-check-label" for="">
                Kolam anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" <?php in_array('Area bermain anak-anak', $c_anak) ? print 'checked' : ' ' ?> value="Area bermain anak-anak">
                <label class="form-check-label" for="">
                Area bermain anak-anak
                </label>
            </div>

      </div>
    </div>
  </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px; border:1px solid; padding:5px; margin-bottom:10px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/hotel/<?= $a->foto_1 ?>" alt="">
        <input type="hidden" name="gambar1" value="<?= $a->foto_1?>">
        <input class="form-control" name="gambar-update1" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px; border:1px solid; padding:5px; margin-bottom:10px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/hotel/<?= $a->foto_2 ?>" alt="">
        <input type="hidden" name="gambar2" value="<?= $a->foto_2?>">
        <input class="form-control" name="gambar-update2" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px; border:1px solid; padding:5px; margin-bottom:10px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/hotel/<?= $a->foto_3 ?>" alt="">
        <input type="hidden" name="gambar3" value="<?= $a->foto_3?>">
        <input class="form-control" name="gambar-update3" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px; border:1px solid; padding:5px; margin-bottom:10px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/hotel/<?= $a->foto_4 ?>" alt="">
        <input type="hidden" name="gambar4" value="<?= $a->foto_4?>">
        <input class="form-control" name="gambar-update4" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
        <img style="width: 200px; border:1px solid; padding:5px; margin-bottom:10px; margin-left:40px; border-radius:7px;  box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.2);" src="../uploads/hotel/<?= $a->foto_5 ?>" alt="">
        <input type="hidden" name="gambar5" value="<?= $a->foto_5?>">
        <input class="form-control" name="gambar-update5" type="file" id="formFile">
    </div>


    <input type="submit" name="submit" class="btn-check" id="btn-check-outlined" autocomplete="off">
    <label class="btn btn-outline-primary" for="btn-check-outlined">Update</label><br>
    </form>
    </div>
    <?php
            if(isset($_POST['submit'])){
                // SIMPAN INPUTAN HOTEL

                $nama = $_POST['nama-hotel'];
                $lokasi = $_POST['lokasi'];
                $bintang = $_POST['bintang'];
                $start = $_POST['start'];
                $alamat = $_POST['alamat-lokasi'];
                $gmaps = $_POST['google-maps'];
                
                // SIMPAN INPUTAN FASILITAS

                $umum = implode(' • ',  $_POST['umum']) ;
                $layanan = implode(' • ',  $_POST['layanan']) ;
                $bisnis = implode(' • ',  $_POST['bisnis']) ;
                $konektivitas = implode(' • ',  $_POST['konektivitas']) ;
                $makanan = implode(' • ',  $_POST['makanan']) ;
                $transportasi = implode(' • ',  $_POST['transportasi']) ;
                $olahraga = implode(' • ',  $_POST['olahraga']) ;
                $anak = implode(' • ',  $_POST['anak']) ;


             //menampung dan validasi update1

             if($_FILES['gambar-update1']['name']!= ''){
                $filename_update1  = $_FILES['gambar-update1']['name'];
                $tmpname_update1   = $_FILES['gambar-update1']['tmp_name'];
                $filesize_update1  = $_FILES['gambar-update1']['size'];

                $formatfile_update1    = pathinfo($filename_update1, PATHINFO_EXTENSION);
                $rename_update1        = 'hotel6'.time().'.'.$formatfile_update1;
                $allowedtype_update1   = array('png','jpeg','jpg','gif');

                if(!in_array($formatfile_update1,$allowedtype_update1)){
                    echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                    return false;
                }elseif($filesize_update1 > 1000000){
                    echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                    return false;
                    ;
                }else{
                    if(file_exists("../uploads/hotel/" .$_POST['gambar1'])){
                        unlink("../uploads/hotel/" .$_POST['gambar1']);
                    }
                }
                

                move_uploaded_file($tmpname_update1, "../uploads/hotel/" .$rename_update1);
            }else{

                $rename_update1 = $_POST['gambar1'];
            }

            //menampung dan validasi update2

            if($_FILES['gambar-update2']['name']!= ''){
                $filename_update2  = $_FILES['gambar-update2']['name'];
                $tmpname_update2   = $_FILES['gambar-update2']['tmp_name'];
                $filesize_update2  = $_FILES['gambar-update2']['size'];

                $formatfile_update2    = pathinfo($filename_update2, PATHINFO_EXTENSION);
                $rename_update2        = 'hotel7'.time().'.'.$formatfile_update2;
                $allowedtype_update2   = array('png','jpeg','jpg','gif');

                if(!in_array($formatfile_update2,$allowedtype_update2)){
                    echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                    return false;
                }elseif($filesize_update2 > 1000000){
                    echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                    return false;
                    ;
                }else{
                    if(file_exists("../uploads/hotel/" .$_POST['gambar2'])){
                        unlink("../uploads/hotel/" .$_POST['gambar2']);
                    }
                }
                

                move_uploaded_file($tmpname_update2, "../uploads/hotel/" .$rename_update2);
            }else{

                $rename_update2 = $_POST['gambar2'];
            }

            //menampung dan validasi update3

            if($_FILES['gambar-update3']['name']!= ''){
                $filename_update3  = $_FILES['gambar-update3']['name'];
                $tmpname_update3   = $_FILES['gambar-update3']['tmp_name'];
                $filesize_update3  = $_FILES['gambar-update3']['size'];

                $formatfile_update3    = pathinfo($filename_update3, PATHINFO_EXTENSION);
                $rename_update3        = 'hotel8'.time().'.'.$formatfile_update3;
                $allowedtype_update3   = array('png','jpeg','jpg','gif');

                if(!in_array($formatfile_update3,$allowedtype_update3)){
                    echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                    return false;
                }elseif($filesize_update3 > 1000000){
                    echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                    return false;
                    ;
                }else{
                    if(file_exists("../uploads/hotel/" .$_POST['gambar3'])){
                        unlink("../uploads/hotel/" .$_POST['gambar3']);
                    }
                }
                

                move_uploaded_file($tmpname_update3, "../uploads/hotel/" .$rename_update3);
            }else{

                $rename_update3 = $_POST['gambar3'];
            }

            //menampung dan validasi update4

            if($_FILES['gambar-update4']['name']!= ''){
                $filename_update4  = $_FILES['gambar-update4']['name'];
                $tmpname_update4   = $_FILES['gambar-update4']['tmp_name'];
                $filesize_update4  = $_FILES['gambar-update4']['size'];

                $formatfile_update4    = pathinfo($filename_update4, PATHINFO_EXTENSION);
                $rename_update4        = 'hotel9'.time().'.'.$formatfile_update4;
                $allowedtype_update4   = array('png','jpeg','jpg','gif');

                if(!in_array($formatfile_update4,$allowedtype_update4)){
                    echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                    return false;
                }elseif($filesize_update4 > 1000000){
                    echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                    return false;
                    ;
                }else{
                    if(file_exists("../uploads/hotel/" .$_POST['gambar4'])){
                        unlink("../uploads/hotel/" .$_POST['gambar4']);
                    }
                }
                

                move_uploaded_file($tmpname_update4, "../uploads/hotel/" .$rename_update4);
            }else{

                $rename_update4 = $_POST['gambar4'];
            }

            //menampung dan validasi update5

            if($_FILES['gambar-update5']['name']!= ''){
                $filename_update5  = $_FILES['gambar-update5']['name'];
                $tmpname_update5   = $_FILES['gambar-update5']['tmp_name'];
                $filesize_update5  = $_FILES['gambar-update5']['size'];

                $formatfile_update5    = pathinfo($filename_update5, PATHINFO_EXTENSION);
                $rename_update5        = 'hotel10'.time().'.'.$formatfile_update5;
                $allowedtype_update5   = array('png','jpeg','jpg','gif');

                if(!in_array($formatfile_update5,$allowedtype_update5)){
                    echo "<div class='alert alert-eror'>file update tidak di izinkan</div>";
                    return false;
                }elseif($filesize_update5 > 1000000){
                    echo '<div class="alert alert-eror">ukuraan file foto tidak boleh lebih dari 1mb</div>';
                    return false;
                    ;
                }else{
                    if(file_exists("../uploads/hotel/" .$_POST['gambar5'])){
                        unlink("../uploads/hotel/" .$_POST['gambar5']);
                    }
                }
                

                move_uploaded_file($tmpname_update5, "../uploads/hotel/" .$rename_update5);
            }else{

                $rename_update5 = $_POST['gambar5'];
            }


            $tambah = mysqli_query($conn, "UPDATE hotel SET
                nama_hotel =    '".$nama."',
                lokasi =    '".$lokasi."',
                alamat =    '".$alamat."',
                google_maps =  '".$gmaps."',
                bintang =    '".$bintang."',
                start_harga =    '".$start."'
                WHERE id = '".$_SESSION['uid']."'
            ");

            $tambah = mysqli_query($conn, "UPDATE fasilitas SET
                fasilitas_umum =    '".$umum."',
                layanan_hotel =    '".$layanan."',
                fasilitas_anak =    '".$anak."',
                fasilitas_bisnis =    '".$bisnis."',
                konektivitas =   '".$konektivitas."',
                transportasi =   '".$transportasi."',
                makanan_minuman =   '".$makanan."',
                olahraga_rekreasi =   '".$olahraga."'
                WHERE id = '".$_SESSION['uid']."'
            ");

            $tambah = mysqli_query($conn, "UPDATE foto_hotel SET
                foto_1 =    '".$rename_update1."',
                foto_2 =    '".$rename_update2."',
                foto_3 =    '".$rename_update3."',
                foto_4 =    '".$rename_update4."',
                foto_5 =    '".$rename_update5."'
                WHERE id = '".$_SESSION['uid']."'
            ");

            if($tambah){
                echo "<script>window.location = 'data-hotel.php?mssg=data sudah diupdate'</script>";
            }else{
                echo '<script>alert("data gagal di update") </script>',mysqli_error($conn);
                echo "kontol";
            }
        }
    
      ?>
    <?php
        include 'footer.php';
    ?>
    