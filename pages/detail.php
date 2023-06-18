<?php
// memanggil file koneksi.php untuk membuat koneksi
include '../database/config.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id_artikel'])) {
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id_artikel = ($_GET["id_artikel"]);

  // menampilkan data dari database yang mempunyai id=$id
  $query = "SELECT artikel_jwp.*, komentar_jwp.nama, komentar_jwp.komentar, komentar_jwp.email 
    FROM artikel_jwp
    LEFT JOIN komentar_jwp ON artikel_jwp.id_artikel = komentar_jwp.id_artikel
    WHERE artikel_jwp.id_artikel = $id_artikel";

  $result = mysqli_query($link, $query);
  // jika data gagal diambil maka akan tampil error berikut
  if (!$result) {
    die("Query Error: " . mysqli_errno($link) .
      " - " . mysqli_error($link));
  }
  // mengambil data dari database
  $data = null; // inisialisasi $data dengan null
  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
  }
  // apabila data tidak ada pada database maka akan dijalankan perintah ini
  if (!$data) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='../home.php';</script>";
  }
} else {
  // apabila tidak ada data GET id pada akan di redirect ke index.php
  echo "<script>alert('Masukkan data id.');window.location='../home.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Mading</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style.css" />
  </head>
    <main>
        <nav class="navbar navbar-color navbar-expand-lg">
            <div class="container-fluid">
              <div class="name">
                <h1 class="navbar-brand" href="#">Sekolah Tinggi</h1>
                <h5>JeWePe</h5>
              </div>
              <br />
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../home.php"
                      ><h6>Home</h6></a
                    >
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input
                    class="form-control me-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                  <button class="btn btn-outline-success" type="submit">
                    Search
                  </button>
                </form>
              </div>
            </div>
          </nav>
          <div class="detail">
            <center>
              <h2><?php echo $data['nama_artikel']; ?></h2>
              <img src="../komentar/gambar/<?php echo $data['gambar_artikel']; ?>" alt="">
            </center>
            <h5>Detail Acara</h5>
            <p><?php echo $data['detail_isi_artikel']; ?></p>
            <h5>Komentar</h5>
            <h6>Nama</h6>
            <p><?php echo $comment['nama']; ?></p>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#9AC5F4" fill-opacity="1" d="M0,288L40,288C80,288,160,288,240,272C320,256,400,224,480,192C560,160,640,128,720,149.3C800,171,880,245,960,245.3C1040,245,1120,171,1200,144C1280,117,1360,139,1400,149.3L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>    
    </main>
</body>
</html>