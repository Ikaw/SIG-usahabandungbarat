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
          <h4><b><a href="dashboard.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  DASHBOARD</a></b></h4>
          <a href="pengusaha_view.php" class="list-group-item ">Data Pengusaha</a>
          <a href="sektor_view.php" class="list-group-item ">Data Sektor Usaha</a>
          <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
          <a href="desa_view.php" class="list-group-item">Data Desa</a>
          <a href="usaha_view.php" class="list-group-item active">Data Usaha</a>
          <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
          <a href="logout.php" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row show-grid">
          <div class="col-md-5">
              <a href="usaha_form_tambah.php">
                <button class="btn btn-primary btn-md">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button>
              </a>
          </div>
        </div>
        <div class="row show-grid">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <h3 class="text-center">Data Usaha</h3>
                <div class="table-responsive">
                  <?php
                  $link             = koneksi_db();
                  $nama_usaha       = $_POST['nama_usaha'];
                  $produk_utama     = $_POST['produk_utama'];
                  $deskripsi_usaha  = $_POST['deskripsi_usaha'];
                  $skala            = $_POST['skala'];
                  $id_sektor        = $_POST['id_sektor'];
                  $alamat           = $_POST['address'];
                  $id_kec           = $_POST['kecamatan'];
                  $id_desa          = $_POST['desa'];
                  $lat              = $_POST['Lat'];
                  $lng              = $_POST['Lng'];
                  $no_ktp           = $_POST['no_ktp'];

                    $sql = "INSERT INTO data_usaha(nama_usaha, produk_utama, alamat_usaha, deskripsi_usaha, lat, lng, id_kec, id_desa, id_sektor, skala,no_ktp) 
                    VALUES
                    ('$nama_usaha','$produk_utama','$alamat','$deskripsi_usaha','$lat','$lng','$id_kec','$id_desa','$id_sektor','$skala','$no_ktp')";
                    $result = mysql_query($sql, $link);
                    
                    $id_usaha = mysql_insert_id();
                    $sql2 = "INSERT INTO notifikasi(tipe, id_lain, waktu) VALUES
                            ('usaha','$id_usaha', now())";
                    $res = mysql_query($sql2, $link);
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
    <script src="../dinas_industri/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dinas_industri/js/bootstrap.min.js"></script>
  
</body>
</html>
