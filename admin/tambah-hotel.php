<?php
        include 'header.php';

        $gabung   = mysqli_query($conn, "SELECT * FROM hotel INNER JOIN fasilitas USING(id) WHERE id = '".$_SESSION['uid']."'");
        if(mysqli_num_rows($gabung) > 0){
            echo "<script>window.location ='data-hotel.php'</script>";
        }
        
    ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Hotel</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">nama hotel</span>
        <input type="text" name="nama-hotel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">opsi</label>
    <select class="form-select" name="lokasi" id="inputGroupSelect01">
        <option selected>Pilih lokasi</option>
        <option value="Jawa Timur">Jawa Timur</option>
        <option value="Bali">Bali</option>
        <option value="Jawa Barat">Jawa Barat</option>
        <option value="Lombok">Lombok</option>
        <option value="Malang">malang</option>
        <option value="Surabaya">Surabaya</option>
        <option value="Jawa Tengah">Jawa Tengah</option>
        <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
        <option value="Jakarta">Jakarta</option>
        <option value="Denpasar">Denpasar</option>
    </select>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Alamat lokasi</span>
        <input type="text" name="alamat-lokasi" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">link gogle maps</span>
        <input type="text" name="google-maps" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect01">Bintang</label>
    <select class="form-select" name="bintang" id="inputGroupSelect01">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>

    </select>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">kontak</span>
        <input type="text" name="kontak" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">start harga</span>
        <input type="number" name="start-harga" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
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
                <input class="form-check-input"  type="checkbox" name="umum[]" value="Kolam renang">
                <label class="form-check-label" for="">
                    Kolam renang
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="AC">
                <label class="form-check-label" for="">
                    AC
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Teras">
                <label class="form-check-label" for="">
                    Teras
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Parkir">
                <label class="form-check-label" for="">
                    Parkir
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Restoran">
                <label class="form-check-label" for="">
                    Restoran
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Lift">
                <label class="form-check-label" for="">
                    Lift
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Akses kursi roda">
                <label class="form-check-label" for="">
                    Akses kursi roda
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Ruang santai">
                <label class="form-check-label" for="">
                    Ruang santai
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Tempat berjemur">
                <label class="form-check-label" for="">
                    Tempat berjemur
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Pantai">
                <label class="form-check-label" for="">
                    Pantai
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Kursi bayi">
                <label class="form-check-label" for="">
                    Kursi bayi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Ruang merokok">
                <label class="form-check-label" for="">
                    Ruang merokok
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Gazabo">
                <label class="form-check-label" for="">
                    Gazabo
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Fasilitas rapat">
                <label class="form-check-label" for="">
                    Fasilitas rapat
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Perpustakaan">
                <label class="form-check-label" for="">
                    Perpustakaan
                </label>
            </div>

            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="umum[]" value="Ruang tamu">
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
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Layanan pernikahan">
                <label class="form-check-label" for="">
                    Layanan pernikahan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Layanan concierge">
                <label class="form-check-label" for="">
                Layanan concierge
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Resepsionis 24 jam">
                <label class="form-check-label" for="">
                Resepsionis 24 jam
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Penitipan bagasi">
                <label class="form-check-label" for="">
                Penitipan bagasi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Staf multibahasa">
                <label class="form-check-label" for="">
                Staf multibahasa
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Layanan laundry/dry cleaning">
                <label class="form-check-label" for="">
                Layanan laundry/dry cleaning
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Penitipan bagasi">
                <label class="form-check-label" for="">
                Penitipan bagasi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Tour">
                <label class="form-check-label" for="">
                Tour
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Penukaran mata uang">
                <label class="form-check-label" for="">
                Penukaran mata uang
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="layanan[]" value="Rak koran">
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
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Pusat bisnis">
                <label class="form-check-label" for="">
                    Pusat bisnis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Proyektor">
                <label class="form-check-label" for="">
                Proyektor
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value=Ruang rapat"">
                <label class="form-check-label" for="">
                Ruang rapat
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Ruang konferensi">
                <label class="form-check-label" for="">
                Ruang konferensi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Mesin foto kopi">
                <label class="form-check-label" for="">
                Mesin foto kopi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Unit komputer">
                <label class="form-check-label" for="">
                Unit komputer
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Ruang Komputer">
                <label class="form-check-label" for="">
                Ruang Komputer
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Layanan Sekertaris">
                <label class="form-check-label" for="">
                Layanan Sekertaris
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="teater / auditorium">
                <label class="form-check-label" for="">
                    teater / auditorium
                </label>
            </div>
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="bisnis[]" value="Printer">
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
                <input class="form-check-input" type="checkbox" name="konektivitas[]" value="Televisi">
                <label class="form-check-label" for="">
                    Televisi
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
   <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
        Makanan Dan Minuman
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
      <div class="accordion-body">
          
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Bar di atap">
                <label class="form-check-label" for="">
                    Bar di atap
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Ruang makan">
                <label class="form-check-label" for="">
                Ruang makan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Lemari es">
                <label class="form-check-label" for="">
                Lemari es
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Kafe atau kedai kopi">
                <label class="form-check-label" for="">
                Kafe atau kedai kopi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Microwave">
                <label class="form-check-label" for="">
                Microwave
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Club Malam">
                <label class="form-check-label" for="">
                Club Malam
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Bar tepi kolam renang">
                <label class="form-check-label" for="">
               Bar tepi kolam renang
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Bar">
                <label class="form-check-label" for="">
               Bar
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Sarapan">
                <label class="form-check-label" for="">
               Sarapan
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Sarapan (biaya tambahan)">
                <label class="form-check-label" for="">
               Sarapan (biaya tambahan)
                </label>
            </div>
            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Bar pantai">
                <label class="form-check-label" for="">
                    Bar pantai
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="makanan[]" value="Layanan makan pribadi">
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
                <input class="form-check-input" type="checkbox" name="transportasi[]" value="Antar /Jemput Bandara (biaya tambahan)">
                <label class="form-check-label" for="">
                Antar /Jemput Bandara (biaya tambahan)
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" value="Penyewaan mobil">
                <label class="form-check-label" for="">
                Penyewaan mobil
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" value="Penyewaan motor">
                <label class="form-check-label" for="">
                Penyewaan motor
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" value="Layanan taksi">
                <label class="form-check-label" for="">
                Layanan taksi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" value="Parkir valet gratis">
                <label class="form-check-label" for="">
                Parkir valet gratis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" value="Parkir mobil">
                <label class="form-check-label" for="">
                Parkir mobil
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="transportasi[]" value="Parkir bus">
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
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Board game">
                <label class="form-check-label" for="">
                Board game
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Tenis meja">
                <label class="form-check-label" for="">
                Tenis meja
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Biliar">
                <label class="form-check-label" for="">
                Biliar
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Fitness">
                <label class="form-check-label" for="">
                Fitness
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Tenis">
                <label class="form-check-label" for="">
                Tenis
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Ruang game">
                <label class="form-check-label" for="">
                Ruang game
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Kolam renang pribadi">
                <label class="form-check-label" for="">
                Kolam renang pribadi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Golf">
                <label class="form-check-label" for="">
               Golf
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Grill barbekyu">
                <label class="form-check-label" for="">
                Grill barbekyu
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="lapangan sepak bola">
                <label class="form-check-label" for="">
               lapangan sepak bola
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Pijat ++ (awkoawk)">
                <label class="form-check-label" for="">
               Pijat ++ (awkoawk)
                </label>
            </div>
            
            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Spa">
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
                <input class="form-check-input" type="checkbox" name="anak[]" value="Klub anak">
                <label class="form-check-label" for="">
                Klub anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" value="Tempat tidur bayi">
                <label class="form-check-label" for="">
                Tempat tidur bayi
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" value="Kolam anak">
                <label class="form-check-label" for="">
                Kolam anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" value="Penitipan bayi atau anak">
                <label class="form-check-label" for="">
                Penitipan bayi atau anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" value="Kolam anak">
                <label class="form-check-label" for="">
                Kolam anak
                </label>
            </div>

            <div class="form-check" style="margin: 10px 15px;">
                <input class="form-check-input" type="checkbox" name="anak[]" value="Area bermain anak-anak">
                <label class="form-check-label" for="">
                Area bermain anak-anak
                </label>
            </div>

      </div>
    </div>
  </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">foto hotel</label>
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
    <?php
            if(isset($_POST['submit'])){
                $nama = $_POST['nama-hotel'];
                $lokasi = $_POST['lokasi'];
                $bintang = $_POST['bintang'];
                $kontak = $_POST['kontak'];
                $start = $_POST['start-harga'];
                $alamat = $_POST['alamat-lokasi'];
                $gmaps = $_POST['google-maps'];

                $umum = implode(' • ',  $_POST['umum']) ;
                $layanan = implode(' • ',  $_POST['layanan']) ;
                $bisnis = implode(' • ',  $_POST['bisnis']) ;
                $konektivitas = implode(' • ',  $_POST['konektivitas']) ;
                $makanan = implode(' • ',  $_POST['makanan']) ;
                $transportasi = implode(' • ',  $_POST['transportasi']) ;
                $olahraga = implode(' • ',  $_POST['olahraga']) ;
                $anak = implode(' • ',  $_POST['anak']) ;

                // file foto ke 1
                            $filename1 = $_FILES['gambar1']['name'];
                            $tmpname1 = $_FILES['gambar1']['tmp_name'];
                            $filesize1 = $_FILES['gambar1']['size'];

                            $formatfile1 = pathinfo($filename1, PATHINFO_EXTENSION);
                            $rename1 = 'hotel1'.time().'.'.$formatfile1;

                            $allowedtype1= array('png','jpeg','jpg','gif');

                            if(!in_array($formatfile1,$allowedtype1)){
                                echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                            }elseif($filesize1 > 1000000){
                                echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                            }else{
                                move_uploaded_file($tmpname1, "../uploads/hotel/" .$rename1);
                            }

                    // file foto ke 2
                            $filename2 = $_FILES['gambar2']['name'];
                            $tmpname2 = $_FILES['gambar2']['tmp_name'];
                            $filesize2 = $_FILES['gambar2']['size'];

                            $formatfile2 = pathinfo($filename2, PATHINFO_EXTENSION);
                            $rename2 = 'hotel2'.time().'.'.$formatfile2;

                            $allowedtype2= array('png','jpeg','jpg','gif');

                            if(!in_array($formatfile2,$allowedtype2)){
                                echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                            }elseif($filesize2 > 1000000){
                                echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                            }else{
                                move_uploaded_file($tmpname2, "../uploads/hotel/" .$rename2);
                            }

                                // file foto ke 3
                                $filename3 = $_FILES['gambar3']['name'];
                                $tmpname3 = $_FILES['gambar3']['tmp_name'];
                                $filesize3 = $_FILES['gambar3']['size'];

                                $formatfile3 = pathinfo($filename3, PATHINFO_EXTENSION);
                                $rename3 = 'hotel3'.time().'.'.$formatfile3;

                                $allowedtype3= array('png','jpeg','jpg','gif');

                                if(!in_array($formatfile3,$allowedtype3)){
                                    echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                                }elseif($filesize3 > 1000000){
                                    echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                                }else{
                                    move_uploaded_file($tmpname3, "../uploads/hotel/" .$rename3);
                                }
                    
                                // file foto ke 4
                                $filename4 = $_FILES['gambar4']['name'];
                                $tmpname4 = $_FILES['gambar4']['tmp_name'];
                                $filesize4 = $_FILES['gambar4']['size'];
    
                                $formatfile4 = pathinfo($filename4, PATHINFO_EXTENSION);
                                $rename4 = 'hotel4'.time().'.'.$formatfile4;
    
                                $allowedtype4= array('png','jpeg','jpg','gif');
    
                                if(!in_array($formatfile4,$allowedtype4)){
                                    echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                                }elseif($filesize4 > 1000000){
                                    echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                                }else{
                                    move_uploaded_file($tmpname4, "../uploads/hotel/" .$rename4);
                                }
            
                                // file foto ke 5
                            $filename5 = $_FILES['gambar5']['name'];
                            $tmpname5 = $_FILES['gambar5']['tmp_name'];
                            $filesize5 = $_FILES['gambar5']['size'];

                            $formatfile5 = pathinfo($filename5, PATHINFO_EXTENSION);
                            $rename5 = 'hotel5'.time().'.'.$formatfile5;

                            $allowedtype5= array('png','jpeg','jpg','gif');

                            if(!in_array($formatfile5,$allowedtype5)){
                                echo "<div class='alert alert-eror'>file tidak di izinkan</div>";
                            }elseif($filesize5 > 1000000){
                                echo '<div class="alert alert-eror">ukuraan file tidak boleh lebih dari 1mb</div>';
                            }else{
                                move_uploaded_file($tmpname5, "../uploads/hotel/" .$rename5);
                            }

                          
            $tambah = mysqli_query($conn, "INSERT INTO hotel VALUES(
                NULL,
                '".$_SESSION['uid']."',
                '".$nama."',
                '".$lokasi."',
                '".$alamat."',
                '".$gmaps."',
                '".$bintang."',
                '".$kontak."',
                '".$start."'
            )");

            $tambah = mysqli_query($conn, "INSERT INTO fasilitas VALUES(
                NULL,
                '".$_SESSION['uid']."',
                '".$umum."',
                '".$layanan."',
                '".$anak."',
                '".$bisnis."',
                '".$konektivitas."',
                '".$transportasi."',
                '".$makanan."',
                '".$olahraga."'
            )");
            
            $tambah = mysqli_query($conn, "INSERT INTO foto_hotel VALUES(
                NULL,
                '".$_SESSION['uid']."',
                '".$rename1."',
                '".$rename2."',
                '".$rename3."',
                '".$rename4."',
                '".$rename5."'
            )");

            if($tambah){
                echo "<script>window.location = 'data-hotel.php'</script>";
            }else{
                echo '<script>alert("data gagal di tambahkan") </script>',mysqli_error($conn);
            }
        }
      ?>
    </div>

    <?php
        include 'footer.php';
    ?>
    