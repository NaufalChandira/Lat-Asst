<?php
include '../database/config.php';
$id_artikel = $_GET["id_artikel"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM artikel_jwp WHERE id_artikel='$id_artikel' ";
    $hasil_query = mysqli_query($link, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($link).
       " - ".mysqli_error($link));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='dashboardartikel.php';</script>";
    }
    ?>