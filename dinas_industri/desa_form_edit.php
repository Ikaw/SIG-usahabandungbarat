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
        <a href="kecamatan_view.php" class="list-group-item ">Data Kecamatan</a>
        <a href="desa_view.php" class="list-group-item active">Data Desa</a>
        <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
        <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
        <a href="logout.php" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
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
                      <?php tambah_desa();?>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
        </div>
      </div>
      <div class="row show-grid">
        <div class="col-md-12">
          <?php
          $link = koneksi_db();

          if (isset($_GET['id_desa'])) {
            $id_desa = $_GET['id_desa'];
            $sql = "SELECT * FROM desa WHERE id_desa='$id_desa'";
            $result=mysql_query($sql, $link);
            $banyakrecord=mysql_num_rows($result);
            if ($banyakrecord==1) {
              $data = mysql_fetch_array($result);
              $id_desa = $data['id_desa'];
              ?>

              <form method="POST" action="desa_proses_edit.php?id_desa=<?=$id_desa?>&&id_kec=<?=$data['id_kec']?>" class="form-horizontal">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Edit Data Desa</h3>
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_desa" class="col-sm-4 control-label">ID Desa </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="id_desa" name="id_desa" value="<?=$data['id_desa']?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_desa" class="col-sm-4 control-label">Nama Desa </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="nama_desa" name="nama_desa" value="<?=$data['nama_desa']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="kecamatan" class="col-sm-4 control-label">Nama Kecamatan</label>
                  <div class="col-sm-6">
                    <select name="kecamatan" class="form-control">
                    <?php
                    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                    $link = koneksi_db();
                    $sql1="SELECT * FROM kecamatan where dihapus='T'";
                    $kec = mysql_query($sql1, $link);
                    while ($keca=mysql_fetch_array($kec)) {
                    ?>
                      <option value="<?=$keca['id_kec'];?>" <?php if ($keca['id_kec']==$data['id_kec']) {echo "selected";}?>>
                      <?=$keca['nama_kec'];?>
                      </option>
                    <?php }?>
                    </select>
                  </div>
                </div>
                <div class="form-group" align="center">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
                  </div>
                </div>
              </form>


            <?php
            } else {
              echo "Data tidak ditemukan";
            }
          
          }?>
        </div>
      </div>
    </div>
  </div>
</div>
        
          <!-- MULAI KODING DISINI -->
          
          
          <p>&nbsp;</p>
        </td> 
      </tr>
      <tr>
        <td colspan=2>
          <?php footer_web();?>
        </td>
      </tr>
    </table>

<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
  </body>
</html>
