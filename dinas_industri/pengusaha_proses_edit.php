<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("lib_func.php"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

    <!-- Bootstrap -->
    <link href="../dinas_industri/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../dinas_industri/css/css.css">

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
        <h4><b><a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  DASHBOARD</a></b></h4>
        <a href="pengusaha_view.php" class="list-group-item active">Data Pengusaha</a>
        <a href="sektor_view.php" class="list-group-item ">Data Sektor Usaha</a>
        <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
        <a href="desa_view.php" class="list-group-item">Data Desa</a>
        <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
        <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
        <a href="logout.php" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
      </div>
    </div>
      <div align="right" class="col-md-4">
        <div class="list-group" align="center">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Pencarian...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Cari</button>
            </span>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <?php
          $link = koneksi_db();
          
          $no_ktp    = $_POST['no_ktp'];
          $nama      = $_POST['nama'];
          $alamat    = $_POST['alamat'];
          $tpt_lahir = $_POST['tpt_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $no_telp   = $_POST['no_telp'];
          $email     = $_POST['email'];
          $password  = $_POST['password'];
          
          $sql = "UPDATE pemilik_usaha SET nama='$nama', alamat='$alamat', tpt_lahir='$tpt_lahir', tgl_lahir='$tgl_lahir',
                  no_telp='$no_telp', email='$email', password='$password' WHERE no_ktp='$no_ktp';";
          $result = mysql_query($sql, $link);
          if ($result) {?>
            <div class="alert alert-success" role="alert">Data Pengusaha Berhasil Diubah !!</div>
          <?php
          }
          else {?>
            <div class="alert alert-danger" role="alert">Pengubahan Data Pengusaha Gagal!!</div>
          <?php
          }
                       
        ?>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <?php footer_web();?>
  </div>
<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../dinas_industri/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dinas_industri/js/bootstrap.min.js"></script>
  
</body>
</html>
