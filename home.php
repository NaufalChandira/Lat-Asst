<?php
require_once "./database/config.php";

// Menerima dan memproses input search
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Jalankan query untuk menampilkan data yang sesuai dengan input search
    $query = "SELECT * FROM artikel_jwp WHERE nama_artikel LIKE '%$search%' ORDER BY id_artikel ASC";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
} else {
    // Jika input search tidak ada, jalankan query untuk menampilkan semua data
    $query = "SELECT * FROM artikel_jwp ORDER BY id_artikel ASC";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
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
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
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
              <a class="nav-link active" aria-current="page" href="#"
                ><h6>Home</h6></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#artikel"><h6>Artikel</h6></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus"><h6>About Us</h6></a>
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
      <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
          <div class="col-10 col-sm-8 col-lg-6">
            <img
              src="./img/university.jpg"
              class="d-block mx-lg-auto img-fluid"
              alt="Bootstrap Themes"
              width="700"
              height="500"
              loading="lazy"
            />
          </div>
          <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
              E-Mading
            </h1>
            <p class="lead">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod
              commodi nesciunt nam! Blanditiis optio officiis, explicabo dolorem
              id soluta magnam quam inventore pariatur, quis harum numquam, illo
              veniam totam commodi.
            </p>
          </div>
        </div>
      </div>
      <div class="title-menu" id="artikel">
      <h2>Artikel</h2>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php
      // buat perulangan untuk element tabel dari data artikel
      // hasil query akan disimpan dalam variabel $row dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col">
          <div class="card">
            <a href="detail.php?id_artikel=<?php echo $row['id_artikel']; ?>"><img src="./komentar/gambar/<?php echo $row['gambar_artikel']; ?>" class="card-img-top img-one" alt="..."></a>
            <div class="card-body">
              <h5 class="card-title">
              <?php echo $row['nama_artikel']; ?>
              </h5>
              <p class="card-text">
              <?php echo substr($row['detail_artikel'], 0, 500); ?> 
              </p>
              <a href="./pages/detail.php?id_artikel=<?php echo $row['id_artikel']; ?>" class="btn float-end">Baca Selengkapnya -></a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="title-menu" id="aboutus">
    <h2>About Us</h2>
    </div>
      <center>
        <img src="./img/guru.jpg" alt="" class="responsive-image">
        <style>
          .responsive-image {
            max-width: 100%;
            height: auto;
          }
        </style>
      </center>
      <div class="text-about">
        <center>
          <h3>Visi</h3>
          <p>Menjadi lembaga pendidikan tinggi yang unggul dan diakui secara nasional maupun internasional dalam memberikan pendidikan berkualitas, menghasilkan lulusan yang kompeten dan berdaya saing tinggi, serta berkontribusi nyata dalam pembangunan masyarakat.</p>
        </center>
      <center>
        <h3>Misi</h3>
        <p>
              <li>Menyelenggarakan pendidikan tinggi yang berorientasi pada keunggulan akademik, penelitian, dan pengabdian kepada masyarakat.</li>
              <li>Menghasilkan lulusan yang memiliki kompetensi tinggi dan keterampilan profesional yang relevan dengan kebutuhan dunia kerja.</li>
              <li>Mendorong dan mendukung kegiatan penelitian yang inovatif dan berkontribusi pada pengembangan ilmu pengetahuan dan teknologi.</li>
              <li>Menumbuhkan semangat kewirausahaan dan jiwa kepemimpinan pada mahasiswa.</li>
              <li>Membangun kerja sama yang kuat dengan mitra industri dan institusi lainnya untuk meningkatkan peluang kerja dan pengembangan karier mahasiswa.</li>
              <li>Membangun budaya akademik yang inklusif, kolaboratif, dan berorientasi pada pemberdayaan mahasiswa.</li>
              <li>Melaksanakan pengabdian kepada masyarakat melalui program-program yang memberikan solusi nyata terhadap permasalahan sosial, ekonomi, dan lingkungan.</li>
              <li>Menerapkan prinsip-prinsip etika dan integritas dalam setiap aspek kehidupan akademik dan organisasi sekolah tinggi.</li>
              <li>Terus melakukan evaluasi dan peningkatan berkelanjutan dalam semua bidang untuk menjaga kualitas dan relevansi pendidikan tinggi.</li>
        </p>
      </center>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#9AC5F4" fill-opacity="1" d="M0,288L40,288C80,288,160,288,240,272C320,256,400,224,480,192C560,160,640,128,720,149.3C800,171,880,245,960,245.3C1040,245,1120,171,1200,144C1280,117,1360,139,1400,149.3L1440,160L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>    
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
