<?php
  include('../database/config.php'); //agar index terhubung dengan database, maka link sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Mading</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="../style.css" />
  </head>
<body>
    <main>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                    <div class="head-admin">
      <h1>Admin E-Mading Artikel</h1>
      <h1>Sekolah Tinggi JeWePe</h1>
                    </div>
                    <a href="tambahartikel.php" class="btn btn-success pull-right button-add">Tambah Baru</a>
                    <?php
                    // Include config file
                    // Attempt select query execution
                    $sql = "SELECT * FROM artikel_jwp";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>No</th>";
                                        echo "<th>Nama Artikel</th>";
                                        echo "<th>Gambar</th>";
                                        echo "<th>Detail Artikel</th>";
                                        echo "<th>Detail Isi Artikel</th>";
                                        echo "<th>Pengaturan</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                  ?>
                                    <tr>
          <td><?php echo $row['id_artikel']; ?></td>
          <td><?php echo $row['nama_artikel']; ?></td>
          <td><img src="gambar/<?php echo $row['gambar_artikel']; ?>" style="width: 120px;"></td>
          <td><?php echo $row['detail_artikel']; ?></td>
          <td><?php echo $row['detail_isi_artikel']; ?></td>
          <?php
          echo "<td>";
     echo "<a href='editartikel.php?id_artikel=". $row['id_artikel'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
     echo "<a href='proses_hapus_artikel.php?id_artikel=". $row['id_artikel'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash table-icon'></span></a>";
     echo "</td>";

    ?>
      </tr>
      <?php
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <center>
    <p>
        <a href="dashboard.php" class="btn btn-warning">Komentar</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </p>
    </center>
</main>
</body>
</html>