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
              <!-- Button trigger modal -->
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button>
                <!-- Modal<span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?php tambah_gambar();?>
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
                <h3 class="text-center">Data Gambar</h3>
                <div class="table-responsive">
                  <?php
                  $link=koneksi_db();
                  $sql="select * from galeri";
                  $res=mysql_query($sql,$link);
                  $banyakrecord=mysql_num_rows($res);
                  if($banyakrecord>0){
                    ?>
                    <table class="table table-hover" align="center">
                      <thead align="center">
                        <tr>
                          <td>ID Gambar</td>
                          <td>Gambar</td>
                          <td>ID Usaha</td>
                          <td>Dihapus</td>
                          <td>Aksi</td>
                        </tr>
                      </thead>                      
                      <?php
                        $i=0;
                        while($data=mysql_fetch_array($res)){
                          $i++;
                          ?>
                          <tbody align="center">
                            <tr>
                            <td>
                              <?php echo $data['id_gambar'];?>
                            </td>
                            <td>
                              <img src="../dinas_industri/user_data/<?php echo $data['nama_gambar'];?>" width="70px" height="70px">
                            </td>
                            <td>
                              <?php echo $data['id_usaha'];?>
                            </td>
                            <td align="center">
                              <?php echo $data['dihapus'];?>
                            </td>
                            <td>
                              <!--Hapus Data-->
                            <a href="javascript:;" data-id="<?php echo $data['id_gambar']; ?>" data-toggle="modal" data-target="#modal-konfirmasi">
                              <button class="btn btn-primary" >
                                <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
                              </button>
                            </a>
                              <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title" id="myModalLabel">Hapus Gambar</h4>
                                    </div>
                                    <div class="modal-body">
                                      Apakah anda yakin akan menghapus gambar dengan ID <?php echo $data['id_gambar'];?> ??
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                      <a href="javascript:;" id="hapus-true" class="btn btn-danger">Ya, Hapus</a>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                            </td>
                          </tr>
                          </tbody>
                          
                          <?php
                        }?>
                  </table>
                  <?php
              }else{
                ?>
                <div class="alert alert-warning" role="alert">Data Galeri tidak ditemukan !!</div>
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
    <script src="../dinas_industri/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dinas_industri/js/bootstrap.min.js"></script>
    <script>
        
            $(document).ready(function(){

            $('#modal-konfirmasi').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
            var id_gambar = div.data('id')
            //var nama_kec = div.data('id')

            var modal = $(this)

            // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
            modal.find('#hapus-true').attr("href","galeri_hapus.php?id_gambar="+id_gambar);

            })

            });

        
    </script>
  
</body>
</html>
