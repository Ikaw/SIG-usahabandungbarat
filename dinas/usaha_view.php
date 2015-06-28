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
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

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
          <a href="pengusaha_view.php" class="list-group-item">Data Pengusaha</a>
          <a href="sektor_view.php" class="list-group-item">Data Sektor Usaha</a>
          <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
          <a href="desa_view.php" class="list-group-item">Data Desa</a>
          <a href="usaha_view.php" class="list-group-item active">Data Usaha</a>
          <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
          <a href="#" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
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
              <!-- Button trigger modal -->
                <!--button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button-->
                <!-- Modal<span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
                <!--div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content"-->
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
                  $link=koneksi_db();
                        $sql="select * from data_usaha order by nama_usaha";
                        $res=mysql_query($sql,$link);
                        $banyakrecord=mysql_num_rows($res);
                        if($banyakrecord>0){
                          ?>
                          <table class="table table-striped" align="center">
                            <tr>
                              <td colspan=11 align="center" valign="middle"><font></font><h3>Data Usaha</h3></td>
                            </tr>
                            <tr>
                              <td>ID Usaha</td>
                              <td>Nama Usaha</td>
                              <td>Produk Utama</td>
                              <td>Skala Usaha</td>
                              <td>Alamat</td>
                              <td>Deskripsi Usaha</td>
                              <td>Latitude</td>
                              <td>Longitude</td>
                              <td>ID Kecamatan</td>
                              <td>ID Desa</td>
                              <td>ID Sektor</td>
                              <td>Dihapus</td>
                            </tr>
                            <?php
                              $i=0;
                              while($data=mysql_fetch_array($res)){
                                $i++;
                                ?>
                                <tr>
                                  <td>
                                    <?php echo $data['id_usaha'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['nama_usaha'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['produk_utama'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['skala'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['alamat_usaha'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['deskripsi_usaha'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['lat'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['lng'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['id_kec'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['id_desa'];?>
                                  </td>
                                  <td>
                                    <?php echo $data['id_sektor'];?>
                                  </td>
                                  <td align="center">
                                    <?php echo $data['dihapus'];?>
                                  </td>
                                </tr>
                                <?php
                              }?>
                        </table>
                        <?php
                    }else{
                      ?>
                      <div class="alert alert-warning" role="alert">Data Usaha tidak ditemukan !!</div>
                      <?php
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
