<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Mading</title>
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
                        <h2>Tambah Artikel</h2>
                    </div>
                    <p>Silahkan isi form di bawah ini kemudian submit untuk menambahkan artikel baru ke dalam database.</p>
                    <form method="POST" action="proses_tambah_artikel.php" enctype="multipart/form-data" >
                    <form>
                        <div class="form-group">
                            <label>Nama Artikel</label>
                            <input type="text" name="nama_artikel" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input name="gambar_artikel" type="file" class="form-control"></input>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Detail Artikel</label>
                            <input type="text" name="detail_artikel" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Detail Isi Artikel</label>
                            <input type="text" name="detail_isi_artikel" class="form-control">
                            <span class="help-block"></span>
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