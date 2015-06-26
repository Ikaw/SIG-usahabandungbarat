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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
    <table width="100%" align="center" border=0 > 
      <tr>
        <td colspan=2 align="center" >
          <?php header_web();?>
        </td>
      </tr>
      <tr> 
        <td width="20%" valign="top" align="center">
          <?php menu();?>
        </td>
        <td valign="top" width="80%">
          <!-- MULAI KODING DISINI -->
          <?php
          if (isset($_GET['id_usaha'])) {
            $id_usaha = $_GET['id_usaha'];

            $link = koneksi_db();
            $sql = "SELECT * FROM data_usaha WHERE id_usaha='$id_usaha'";
            $result=mysql_query($sql, $link);
            $banyakrecord=mysql_num_rows($result);
            if ($banyakrecord==1) {
              $data = mysql_fetch_array($result)?>

              <form method="POST" action="usaha_proses_edit.php" enctype="multipart/form-data" class="form-horizontal">
              <table align="center" width="50%">
                <tr>
                  <td align="center" colspan=2>
                    <br>
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Usaha</h3>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan=2>
                      <div class="form-group">
                        <label for="id_usaha" class="col-sm-4 control-label">ID Usaha</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="id_usaha" name="id_usaha" value="<?=$data['id_usaha']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_usaha" class="col-sm-4 control-label">Nama Usaha</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="<?=$data['nama_usaha']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="produk_utama" class="col-sm-4 control-label">Produk Utama</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="produk_utama" name="produk_utama" value="<?=$data['produk_utama']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="alamat_usaha" class="col-sm-4 control-label">Alamat Usaha</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" value="<?=$data['alamat_usaha']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi_usaha" class="col-sm-4 control-label">Deskripsi Usaha</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" value="<?=$data['deskripsi_usaha']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lat" class="col-sm-4 control-label">Latitude</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="lat" name="lat" value="<?=$data['lat']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lng" class="col-sm-4 control-label">Longitude</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="lng" name="lng" value="<?=$data['lng']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="id_kec" class="col-sm-4 control-label">ID Kecamatan</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="id_kec" name="id_kec" value="<?=$data['id_kec']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="id_desa" class="col-sm-4 control-label">ID Desa</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="id_desa" name="id_desa" value="<?=$data['id_desa']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="id_sektor" class="col-sm-4 control-label">Sektor</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="id_sektor" name="id_sektor" value="<?=$data['id_sektor']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="skala" class="col-sm-4 control-label">Skala</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="skala" name="skala" value="<?=$data['skala']?>">
                        </div>
                      </div>
                      <div class="form-group" align="center">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" id="Edit">Edit</button>
                        </div>
                      </div>
                  </td>
                </tr>
              </table>
            </form>


            <?php
            } else {
              echo "Data tidak ditemukan";
            }
          
          }?>
          
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
    <!--<script>
      $('#datetimepicker').datetimepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        minView: 2
      });
    </script>-->
    <script type="text/javascript">
            $(function () {
                $('#datepicker').datepicker({
                  format: 'yyyy-mm-dd'
                });
            });
        </script>
  </body>
</html>
