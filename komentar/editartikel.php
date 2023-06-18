<?php
  // memanggil file link.php untuk membuat link
include '../database/config.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_artikel'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id_artikel"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM artikel_jwp WHERE id_artikel='$id'";
    $result = mysqli_query($link, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='dashboardartikel.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='dashboardartikel.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Artikel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../style.css" />
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
  </head>
  <body>
     <main>
     <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Artikel</h2>
                    </div>
                    <form method="POST" action="proses_edit_artikel.php" enctype="multipart/form-data" >
                    <input name="id_artikel" value="<?php echo $data['id_artikel']; ?>"  hidden />
                    <p>Please edit the input values and submit to update the record.</p>
                        <div class="form-group">
                            <label>Nama Artikel</label>
                            <input type="text" name="nama_artikel" class="form-control" value="<?php echo $data['nama_artikel']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Gambar Artikel</label>
                            <img src="gambar/<?php echo $data['gambar_artikel']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                            <input type="file" name="gambar_artikel" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Detail Artikel</label>
                            <input type="text" name="detail_artikel" class="form-control" value="<?php echo $data['detail_artikel']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Detail Isi Artikel</label>
                            <input type="text" name="detail_isi_artikel" class="form-control" value="<?php echo $data['detail_isi_artikel']; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
     </main>
  </body>
</html>