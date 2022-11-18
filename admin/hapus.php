<?php
    include '../koneksi.php';

    if(isset($_GET['id_kamar'])){

        $kamar = mysqli_query($conn, "SELECT foto,foto1,foto2,foto3,foto4,foto5 FROM kamar WHERE id_kamar = '".$_GET['id_kamar']."' ");
        
        
            $p = mysqli_fetch_object($kamar);
            if(file_exists("../uploads/kamar/".$p->foto)){
                unlink("../uploads/kamar/".$p->foto);
            }
        
            if(file_exists("../uploads/kamar/".$p->foto1)){
                unlink("../uploads/kamar/".$p->foto1);
            }
        
            if(file_exists("../uploads/kamar/".$p->foto2)){
                unlink("../uploads/kamar/".$p->foto2);
            }
        
            if(file_exists("../uploads/kamar/".$p->foto3)){
                unlink("../uploads/kamar/".$p->foto3);
            }
        
            if(file_exists("../uploads/kamar/".$p->foto4)){
                unlink("../uploads/kamar/".$p->foto4);
            }
        
            if(file_exists("../uploads/kamar/".$p->foto5)){
                unlink("../uploads/kamar/".$p->foto5);
            }

        $delete = mysqli_query($conn, "DELETE FROM kamar WHERE id_kamar = '".$_GET['id_kamar']."' ");
        echo "<script>window.location = 'data-kamar.php'</script>";
    }
    // $id = (int) $_GET['id'];

    // $hotel = mysqli_query($conn, "SELECT foto FROM hotel WHERE id_hotel = '{$id}'");
        
           

    //    if($id){
    //     if(mysqli_num_rows($hotel) > 0){
    //         $p = mysqli_fetch_object($hotel);
    //         if(file_exists("../uploads/hotel/".$p->foto)){
    //             unlink("../uploads/hotel/".$p->foto);
    //         }
    //     }
    //        $delete = mysqli_query($conn, "DELETE FROM hotel WHERE id_hotel = '{$id}'") ;
    //        $delete = mysqli_query($conn, "DELETE FROM fasilitas WHERE id_fasilitas = '{$id}'") ;
           
    // }
    //    header("Location: hotel.php");
    //    exit;

    if(isset($_GET['id_admin'])){

        $file_hotel = mysqli_query($conn, "SELECT foto_1,foto_2,foto_3,foto_4,foto_5 FROM foto_hotel WHERE id = '".$_GET['id_admin']."' ");

            $h = mysqli_fetch_object($file_hotel);
        
            if(file_exists("../uploads/hotel/".$h->foto_1)){
                unlink("../uploads/hotel/".$h->foto_1);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_2)){
                unlink("../uploads/hotel/".$h->foto_2);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_3)){
                unlink("../uploads/hotel/".$h->foto_3);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_4)){
                unlink("../uploads/hotel/".$h->foto_4);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_5)){
                unlink("../uploads/hotel/".$h->foto_5);
            }

        $file_kamar = mysqli_query($conn, "SELECT foto,foto1,foto2,foto3,foto4,foto5 FROM kamar WHERE id = '".$_GET['id_admin']."' ");

            $f = mysqli_fetch_object($file_kamar);
            if(file_exists("../uploads/kamar/".$f->foto)){
                unlink("../uploads/kamar/".$f->foto);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto1)){
                unlink("../uploads/kamar/".$f->foto1);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto2)){
                unlink("../uploads/kamar/".$f->foto2);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto3)){
                unlink("../uploads/kamar/".$f->foto3);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto4)){
                unlink("../uploads/kamar/".$f->foto4);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto5)){
                unlink("../uploads/kamar/".$f->foto5);
            }

        $delete = mysqli_query($conn, "DELETE FROM admin WHERE id = '".$_GET['id_admin']."' ");
        echo "<script>window.location = 'hotel-admin.php'</script>";
    }

    if(isset($_GET['id_pelanggan'])){
        $delete = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan = '".$_GET['id_pelanggan']."' ");
        echo "<script>window.location = 'user.php'</script>";
    }


    // HAPUS DARI AKUN
    if(isset($_GET['id'])){

        $file_hotel = mysqli_query($conn, "SELECT foto_1,foto_2,foto_3,foto_4,foto_5 FROM foto_hotel WHERE id = '".$_GET['id']."' ");

            $h = mysqli_fetch_object($file_hotel);
        
            if(file_exists("../uploads/hotel/".$h->foto_1)){
                unlink("../uploads/hotel/".$h->foto_1);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_2)){
                unlink("../uploads/hotel/".$h->foto_2);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_3)){
                unlink("../uploads/hotel/".$h->foto_3);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_4)){
                unlink("../uploads/hotel/".$h->foto_4);
            }
        
            if(file_exists("../uploads/hotel/".$h->foto_5)){
                unlink("../uploads/hotel/".$h->foto_5);
            }

        $file_kamar = mysqli_query($conn, "SELECT foto,foto1,foto2,foto3,foto4,foto5 FROM kamar WHERE id = '".$_GET['id']."' ");

            $f = mysqli_fetch_object($file_kamar);
            if(file_exists("../uploads/kamar/".$f->foto)){
                unlink("../uploads/kamar/".$f->foto);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto1)){
                unlink("../uploads/kamar/".$f->foto1);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto2)){
                unlink("../uploads/kamar/".$f->foto2);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto3)){
                unlink("../uploads/kamar/".$f->foto3);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto4)){
                unlink("../uploads/kamar/".$f->foto4);
            }
        
            if(file_exists("../uploads/kamar/".$f->foto5)){
                unlink("../uploads/kamar/".$f->foto5);
            }

        $delete = mysqli_query($conn, "DELETE FROM admin WHERE id = '".$_GET['id']."' ");
        echo "<script>window.location = 'login.php'</script>";
    }

?>