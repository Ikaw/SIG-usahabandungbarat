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
          <a href="kecamatan_view.php" class="list-group-item active">Data Kecamatan</a>
          <a href="desa_view.php" class="list-group-item">Data Desa</a>
          <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
          <a href="#" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
        </div>
      </div>
      <div class="col-md-9">
        <?php

            $link=koneksi_db();
                    $id_kec = $_GET['id_kec'];
                    $hapus = "UPDATE kecamatan SET dihapus='Y' WHERE id_kec='$id_kec'";
                    $res=mysql_query($hapus,$link);
                    if ($res) {?>
                      <div class="alert alert-success" role="alert">Data Kecamatan Berhasil Dihapus !!</div>
                    <?php } 
                    else {
                      echo "Gagal Broh !!!";
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
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  
</body>
</html>
