<?php
// memanggil file link.php untuk melakukan link database
include '../database/config.php';

	// membuat variabel untuk menampung data dari form
  $id_artikel= $_POST['id_artikel'];
  $nama_artikel   = $_POST['nama_artikel'];
  $gambar_artikel = $_FILES['gambar_artikel']['name'];
  $detail_artikel    = $_POST['detail_artikel'];
  $detail_isi_artikel    = $_POST['detail_isi_artikel'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar_artikel != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_artikel); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_artikel']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_artikel; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan id_artikelyang produknya kita edit
                   $query  = "UPDATE artikel_jwp SET nama_artikel = '$nama_artikel',gambar_artikel = '$nama_gambar_baru', detail_artikel = '$detail_artikel', detail_isi_artikel = '$detail_isi_artikel', harga_jual = '$harga_jual'";
                    $query .= "WHERE id_artikel= '$id'";
                    $result = mysqli_query($link, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($link).
                             " - ".mysqli_error($link));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='dashboardartikel.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan id_artikelyang produknya kita edit
      $query  = "UPDATE artikel_jwp SET nama_artikel = '$nama_artikel', detail_artikel = '$detail_artikel', detail_isi_artikel = '$detail_isi_artikel'";
      $query .= "WHERE id_artikel= '$id_artikel'";
      $result = mysqli_query($link, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($link).
                             " - ".mysqli_error($link));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='dashboardartikel.php';</script>";
      }
    }