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
      <?php menu_admin(); ?>
      <div class="col-md-9">
        <div class="row show-grid">
          <div class="col-md-5">
              <a href="usaha_form_tambah.php">
                <button class="btn btn-primary btn-md">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button>
              </a>
                <!-- Modal<span class="glyphicon glyphicon-search" aria-hidden="true"></span> 
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"-->
                  <!div class="modal-dialog">
                    <!div class="modal-content">
                      <?php //tambah_usaha();?>
                    <!/div>
                    <!-- /.modal-content -->
                  <!/div>
                  <!-- /.modal-dialog -->
                <!/div>
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
                <h3 class="text-center">Data Usaha</h3>
                <div class="table-responsive">
                  <?php
                  $link = koneksi_db();
                  $nama_usaha = $_POST['nama_usaha'];
                  $produk_utama = $_POST['produk_utama'];
                  $deskripsi_usaha = $_POST['deskripsi_usaha'];
                  $skala = $_POST['skala'];
                  $id_sektor = $_POST['id_sektor'];
                  $alamat = $_POST['address'];
                  $id_kec = $_POST['kecamatan'];
                  $id_desa = $_POST['desa'];
                  $lat = $_POST['Lat'];
                  $lng = $_POST['Lng'];
                  $no_ktp = $_POST['no_ktp'];
                
                    $sql = "UPDATE data_usaha SET (nama_usaha='$nama_usaha', produk_utama='$produk_utama', alamat_usaha='$alamat', deskripsi_usaha='$deskripsi_usaha', lat='$lat', lng='$lng', id_kec='$id_kec', id_desa='$id_desa', id_sektor='$id_sektor', skala='$skala',no_ktp='$no_ktp');";
                    $result = mysql_query($sql, $link);
                    if ($result) {
                      echo "Data Berhasil disimpan";
                    }
                    else {
                      echo "Pengeditan Data Gagal!!!";
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
