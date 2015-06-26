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
          $link = koneksi_db();

          if (isset($_POST['id_desa'])) 
          {
            $id_desa = $_POST['id_desa'];
            $nama_desa = $_POST['nama_desa'];
            $id_kec = $_POST['id_kec'];
            $sql = "UPDATE desa SET nama_desa='$nama_desa', id_kec='$id_kec' WHERE id_desa='$id_desa'";
            $res=mysql_query($sql,$link);
            if ($res) {
            } 
            else {
              echo "Gagal Broh !!!";
            }
          }

          if (isset($_GET['id_desa'])) {
            $id_desa = $_GET['id_desa'];
            $sql = "SELECT * FROM desa WHERE id_desa='$id_desa'";
            $result=mysql_query($sql, $link);
            $banyakrecord=mysql_num_rows($result);
            if ($banyakrecord==1) {
              $data = mysql_fetch_array($result)?>

              <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-horizontal">
              <table align="center" width="50%">
                <tr>
                  <td align="center" colspan=2>
                    <br>
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Desa</h3>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan=2>
                      <div class="form-group">
                        <label for="id_desa" class="col-sm-4 control-label">ID Desa</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="id_desa" name="id_desa" value="<?=$data['id_desa']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_desa" class="col-sm-4 control-label">Nama Desa</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama_desa" name="nama_desa" value="<?=$data['nama_desa']?>">
                        </div>
                      </div>
                      <div class="form-group">
                      <label for="nama_kec" class="col-sm-4 control-label">Nama Kecamatan</label>
                      <div class="col-sm-8">
                        <select name="id_kec" class="form-control">
                          <?php
                          $link = koneksi_db();
                          $sql="SELECT id_kec, nama_kec FROM kecamatan where dihapus='T'";
                          $result = mysql_query($sql, $link);
                          while ($keca=mysql_fetch_array($result)) {
                            ?>
                              <option value="<?php echo "$keca[id_kec]";?>" <?php if ($keca['id_kec']==$data['id_kec']) { echo "selected";}?>>
                                <?php echo "$keca[nama_kec]";?>
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
