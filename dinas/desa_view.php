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
          <a href="pengusaha_view.php" class="list-group-item">Data Pengusaha</a>
          <a href="sektor_view.php" class="list-group-item ">Data Sektor Usaha</a>
          <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
          <a href="desa_view.php" class="list-group-item active">Data Desa</a>
          <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
          <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
          <a href="#" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
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
                <h3 class="text-center">Data Desa</h3>
                <div class="table-responsive">
                  <?php
                    $link=koneksi_db();
                    
                    $sql="select * from desa order by id_desa";
                    $res=mysql_query($sql,$link);
                    $banyakrecord=mysql_num_rows($res);
                    if($banyakrecord>0){
                    ?>
                    <table class="table table-hover" align="center">
                    <thead>
                      <tr>
                      <th>ID Desa</th>
                      <th>Nama Desa</th>
                      <th>ID Kecamatan</th>
                      <th>Dihapus</th>
                      <th>Aksi</th>
                      </tr>
                    </thead>
                    <?php
                    $i=0;
                    while($data=mysql_fetch_array($res)){
                      $i++;
                      ?>
                      <tbody>
                        <tr>
                        <td>
                          <?php echo $data['id_desa'];?>
                        </td>
                        <td>
                          <?php echo $data['nama_desa'];?>
                        </td>
                        <td>
                        <?php echo $data['id_kec'];?>
                        </td>
                        <td align="center">
                          <?php echo $data['dihapus'];?>
                        </td>
                        <td>
                              <!--Hapus Data-->
                              <button class="btn btn-primary" data-toggle="modal" data-target="#hapus">
                                <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
                              </button>
                              <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title" id="myModalLabel">Hapus Data Sektor</h4>
                                    </div>
                                    <div class="modal-body">
                                      Apakah anda yakin akan menghapus desa <?php echo $data['nama_desa'];?> ??
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                      <a href="desa_hapus.php?id_desa=<?php echo $data['id_desa'];?>"><button type="submit" class="btn btn-primary" id="Simpan">Ya, Hapus</button></a>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>

                              <!--Ubah Data-->
                              <a href="desa_form_edit.php?id_desa=<?php echo $data['id_desa'];?>"><button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                            </td>
                      </tr>
                      </tbody>
                      <?php
                    }?>
                  </table>
                  <?php
                  }else{
                  ?>
                    <div class="alert alert-warning" role="alert">Data Desa tidak ditemukan !!</div>
                  <?php
                  }?>
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
