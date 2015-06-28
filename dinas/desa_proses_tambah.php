<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("lib_func.php"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
  <div class="container-fluid header">
    <?php header_web();?>
  </div>
  <div class="container-fluid">
    <div class="row show-grid">
      <div class="col-md-3">
        <div class="list-group" align="center">
          <h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span>   ADMINISTRATOR</h3>
          <a href="pengusaha_view.php" class="list-group-item ">Data Pengusaha</a>
          <a href="sektor_view.php" class="list-group-item ">Data Sektor Usaha</a>
          <a href="kecamatan_view.php" class="list-group-item ">Data Kecamatan</a>
          <a href="desa_view.php" class="list-group-item active">Data Desa</a>
          <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
          <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
          <a href="#" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row show-grid">
          <div class="col-md-5">
              <!-- Button trigger modal -->
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button>
                <!-- Modal<span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?php tambah_sektor();?>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
          </div>
          <div class="col-md-7">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pencarian...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>   Cari</button>
              </span>
            </div>
          </div>
        </div>
        <div class="row show-grid">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <h3 class="text-center">Data Desa</h3>
                <div class="table-responsive">
                  <?php
                  $link = koneksi_db();
                    $id_kec = $_POST['id_kec'];
                    $nama_desa = $_POST['nama_desa'];
                      $sql = "INSERT INTO desa (nama_desa, id_kec) 
                      VALUES
                      ('$nama_desa','$id_kec')";
                      $result = mysql_query($sql, $link);
                      if ($result) {
                        echo "Data Berhasil disimpan";
                      }
                      else {
                        echo "Gagal Broh !!!";
                      }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <?php footer_web();?>
  </div>
<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
</body>
</html>
