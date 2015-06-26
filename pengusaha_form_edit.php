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
          <h3>ADMINISTRATOR</h3>
          <a href="pengusaha_view.php" class="list-group-item active">Data Pengusaha</a>
          <a href="sektor_view.php" class="list-group-item">Data Sektor Usaha</a>
          <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
          <a href="desa_view.php" class="list-group-item">Data Desa</a>
          <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
          <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
          <a href="#" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row show-grid ">
          <div class="col-md-12">
            <?php
            if (isset($_GET['no_ktp'])) {
              $no_ktp = $_GET['no_ktp'];
              $link = koneksi_db();
              $sql = "SELECT * FROM pemilik_usaha WHERE no_ktp='$no_ktp'";
              $result=mysql_query($sql, $link);
              $banyakrecord=mysql_num_rows($result);
              if ($banyakrecord==1) {
                $data = mysql_fetch_array($result);
                $no_ktp = $data['no_ktp'];?>

                <form method="POST" action="pengusaha_proses_edit.php?no_ktp=<?=$no_ktp?>" class="form-horizontal">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Edit Data Pengusaha</h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama" class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_ktp" class="col-sm-4 control-label">Nomor KTP</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="<?=$data['no_ktp']?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" id="alamat" name="alamat" value="<?=$data['alamat']?>"><?=$data['alamat']?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tpt_lahir" class="col-sm-4 control-label">Tempat Lahir</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" value="<?=$data['tpt_lahir']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir" class="col-sm-4 control-label">Tanggal Lahir</label>
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                      <img src="../admin/gambar/<?php echo $data['foto_ktp'];?>" width="70px" height="70px">
                      <input type='hidden' class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?=$data['tgl_lahir']?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="no_telp" class="col-sm-4 control-label">Nomor Telepon</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?=$data['no_telp']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="email" name="email" value="<?=$data['email']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Kata Sandi</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="password" name="password" value="<?=$data['password']?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="ulang_password" class="col-sm-4 control-label">Ulangi Kata Sandi</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="ulang_password" name="ulang_password" value="<?=$data['password']?>">
                    </div>
                  </div>
                  <div class="form-group" align="center">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" id="Simpan" name="Simpan" value="Simpan">Simpan</button>
                    </div>
                  </div>
                </form>


              <?php
              } else {
                echo "Data tidak ditemukan";
              }
            
            }
          ?>
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
