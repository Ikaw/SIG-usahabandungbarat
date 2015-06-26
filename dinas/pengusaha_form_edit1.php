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
          if (isset($_GET['no_ktp'])) {
            $no_ktp = $_GET['no_ktp'];
            $link = koneksi_db();
            $sql = "SELECT * FROM pemilik_usaha WHERE no_ktp='$no_ktp'";
            $result=mysql_query($sql, $link);
            $banyakrecord=mysql_num_rows($result);
            if ($banyakrecord==1) {
              $data = mysql_fetch_array($result)?>

              <form method="POST" action="pengusaha_proses_edit.php" class="form-horizontal">
              <table align="center" width="50%">
                <tr>
                  <td align="center" colspan=2>
                    <br>
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Pengusaha</h3>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan=2>
                      <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="no_ktp" class="col-sm-4 control-label">Nomor KTP</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?=$data['no_ktp']?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-8">
                          <textarea class="form-control" id="alamat" name="alamat" value="<?=$data['alamat']?>"><?=$data['alamat']?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tpt_lahir" class="col-sm-4 control-label">Tempat Lahir</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" value="<?=$data['tpt_lahir']?>">
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="tgl_lahir" class="col-sm-4 control-label">Tanggal Lahir</label>
                          <div class="col-sm-8">
                            <div class='input-group date' id='datepicker'>
                                <input type='text' class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?=$data['tgl_lahir']?>"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="foto_ktp" class="col-sm-4 control-label">File KTP</label>
                        <div class="col-sm-8">
                          <img src="../admin/gambar/<?php echo $data['foto_ktp'];?>" width="70px" height="70px">
                          <input type='hidden' class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?=$data['tgl_lahir']?>"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="no_telp" class="col-sm-4 control-label">Nomor Telepon</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?=$data['no_telp']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="email" name="email" value="<?=$data['email']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Kata Sandi</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="password" name="password" value="<?=$data['password']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ulang_password" class="col-sm-4 control-label">Ulangi Kata Sandi</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control" id="ulang_password" name="ulang_password" value="<?=$data['password']?>">
                        </div>
                      </div>
                      <div class="form-group" align="center">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary" id="Simpan" name="Simpan" value="Simpan">Simpan</button>
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
          
          }

          /*if (isset($_GET['Simpan']) && ($_POST['Simpan']=="Simpan")) {
            if (isset($_GET['no_ktp'])) {
            $link = koneksi_db();
            //$no_ktp = isset($_GET['no_ktp']);
            $no_ktp = $_GET['no_ktp'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $tpt_lahir = $_POST['tpt_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $no_telp = $_POST['no_telp'];
            $email = $_POST['email'];
            $password = $_POST['password'];
                
            $ubah = "UPDATE pemilik_usaha SET nama='$nama', alamat='$alamat', tpt_lahir='$tpt_lahir', tgl_lahir='$tgl_lahir', no_telp='$no_telp', email='$email', password='$password' WHERE no_ktp='$no_ktp')";
            $res = mysql_query($ubah, $link);
            if ($res) {?>
              <div class="alert alert-success" role="alert">Data Pengusaha Berhasil Diubah !!</div>
            <?php
            }
            else {?>
              <div class="alert alert-danger" role="alert">Gagal di Ubah !!</div>
            <?php
            }
          }      
          }*/?>
          
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
