<?php
// memanggil file link.php untuk melakukan link database
include '../database/config.php';

	// membuat variabel untuk menampung data dari form
  $nama_artikel   = $_POST['nama_artikel'];
  $gambar_artikel = $_FILES['gambar_artikel']['name'];
  $detail_artikel    = $_POST['detail_artikel'];
  $detail_isi_artikel    = $_POST['detail_isi_artikel'];


//cek dulu jika ada gambar produk jalankan coding ini
if($gambar_artikel != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_artikel); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_artikel']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_artikel; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO artikel_jwp (nama_artikel, gambar_artikel, detail_artikel, detail_isi_artikel) VALUES ('$nama_artikel', '$nama_gambar_baru', '$detail_artikel', '$detail_isi_artikel')";
                  $result = mysqli_query($link, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($link).
                           " - ".mysqli_error($link));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    header("location: dashboardartikel.php");
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='dashboardartikel.php';</script>";
            }
} else {
    $query = "INSERT INTO artikel_jwp (nama_artikel, gambar_artikel, detail_artikel, detail_isi_artikel) VALUES ('$nama_artikel', '$nama_gambar_baru', '$detail_artikel', '$detail_isi_artikel')";
    $result = mysqli_query($link, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($link).
                           " - ".mysqli_error($link));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    header("location: dashboardartikel.php");
                  }
}
