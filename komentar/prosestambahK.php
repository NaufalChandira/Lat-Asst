<?php
// Include config file
require_once "../database/config.php";

// membuat variabel untuk menampung data dari form
$nama = $_POST['nama'];
$email = $_POST['email'];
$komentar = $_POST['komentar'];
$id_artikel = $_POST['id_artikel']; // Menambahkan variabel untuk id_artikel

// jalankan query INSERT untuk menambah data ke database
$query = "INSERT INTO komentar_jwp (nama, email, komentar, id_artikel) VALUES (?, ?, ?, ?)";

// Prepare the statement
$stmt = mysqli_prepare($link, $query);

// Bind the parameters with the values
mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $komentar, $id_artikel);

if (mysqli_stmt_execute($stmt)) {
    // Data berhasil ditambahkan, redirect ke halaman artikel.php
    header("Location: ../pages/detail.php?id_artikel=" . $id_artikel);
    exit();
} else {
    // Query gagal dijalankan, tampilkan pesan error
    $error = "Query gagal dijalankan: " . mysqli_error($link);
    echo $error;
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($link);
?>