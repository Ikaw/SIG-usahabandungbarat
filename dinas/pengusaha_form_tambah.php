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
          <form method="POST" action="pengusaha_proses_tambah.php" enctype="multipart/form-data" class="form-horizontal">
            <table align="center" width="50%"
              <tr>
                <td align="center" colspan=2>
                  <br>
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Tambah Data Pengusaha</h3>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan=2>
                    <div class="form-group">
                      <label for="nama" class="col-sm-4 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="no_ktp" class="col-sm-4 control-label">Nomor KTP</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Nomor KTP">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" id="alamat" name="alamat"  placeholder="Alamat Tinggal"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tpt_lahir" class="col-sm-4 control-label">Tempat Lahir</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" placeholder="Tempat Lahir">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir" class="col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                          <div class='input-group date' id='datepicker'>
                              <input type='text' class="form-control" id="tgl_lahir" name="tgl_lahir"/>
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="foto_ktp" class="col-sm-4 control-label">File KTP</label>
                      <div class="col-sm-8">
                        <input type="file" name="foto_ktp">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <p class="help-block">Telusuri...</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="no_telp" class="col-sm-4 control-label">Nomor Telepon</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_telp" name="no_telp">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-sm-4 control-label">Email</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-sm-4 control-label">Kata Sandi</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ulang_password" class="col-sm-4 control-label">Ulangi Kata Sandi</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="ulang_password" name="ulang_password" placeholder="Ulangi Kata Sandi">
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
