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
    <script>
        
            $(document).ready(function(){

            $('#modal-konfirmasi').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
            var id_kec = div.data('id')

            var modal = $(this)

            // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
            modal.find('#hapus-true').attr("href","kecamatan_hapus.php?id_kec="+id_kec);

            })

            });

        
    </script>
  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
  <div class="container-fluid header">
    <?php header_web();?>
  </div>
  <!--div class="container-fluid">
    <?php //navbar();?>
  </div-->
  
  <div class="container-fluid">
    <div class="row show-grid">
      <div class="col-md-3">
        <div class="list-group" align="center">
          <h4><b><a href="dashboard.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  DASHBOARD</a></b></h4>
          <a href="pengusaha_view.php" class="list-group-item active">Data Pengusaha</a>
          <a href="sektor_view.php" class="list-group-item">Data Sektor Usaha</a>
          <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
          <a href="desa_view.php" class="list-group-item">Data Desa</a>
          <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
          <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
          <a href="logout.php" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row show-grid">
          <div class="col-md-5">
            <!div class="panel panel-default">
              <!div class="panel-body">
              <!-- Button trigger modal -->
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button>
                <!-- Modal<span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?php tambah_pengusaha();?>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              <!/div>
              <!-- .panel-body -->
            <!/div>
          </div>
          <form id="pencarian" method="POST" action="pengusaha_view.php">
          <div class="col-md-7">
            <div class="input-group">
                  <input type="text" class="form-control" name="filter" placeholder="Pencarian...">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onclick="$('#pencarian').submit();" name="cari">
                      <span class="glyphicon glyphicon-search" aria-hidden="true">  Cari</span>
                    </button>
                  </span>
            </div>
          </div>
          </form>
        </div>
        <div class="row show-grid">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <h3 class="text-center">Data Pengusaha</h3>
                <hr width="100%" color="black" />
                <div class="table-responsive">
                  <?php
                  $link=koneksi_db();

                  if(isset($_POST['filter'])){
                  $cari = $_POST['filter'];
                  $where="WHERE no_ktp like '%$cari%' OR nama like '%$cari%' OR alamat like '%$cari%' OR tpt_lahir like '%$cari%' OR tgl_lahir like '%$cari%' OR no_telp like '%$cari%' OR email like '%$cari%'";
                  } else {
                  $where=''; }
                  
                  $sql="select * from pemilik_usaha $where order by nama";
                  $res=mysql_query($sql,$link);
                  $banyakrecord=mysql_num_rows($res);
                  if($banyakrecord>0){
                    ?>
                    
                    <table class="table table-hover">
                      <thead>
                        <tr>
                        <th>Nama</th>
                        <th>Nomor KTP</th>
                        <th>Alamat</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>File KTP</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>Kata Sandi</th>
                        <th>Dihapus</th>
                        <th>Aktivasi</th>
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
                              <?php echo $data['nama'];?>
                            </td>
                            <td>
                              <?php echo $data['no_ktp'];?>
                            </td>
                            <td>
                              <?php echo $data['alamat'];?>
                            </td>
                            <td>
                              <?php echo $data['tpt_lahir'];?>
                            </td>
                            <td>
                              <?php echo $data['tgl_lahir'];?>
                            </td>
                            <td>
                              <img src="../dinas_industri/gambar/<?php echo $data['foto_ktp'];?>" width="70px" height="70px">
                            </td>
                            <td>
                              <?php echo $data['no_telp'];?>
                            </td>
                            <td>
                              <?php echo $data['email'];?>
                            </td>
                            <td>
                              <?php echo $data['password'];?>
                            </td>
                            <td align="center">
                              <?php echo $data['dihapus'];?>
                            </td>
                            <td align="center">
                              <input type="hidden" name="aktivasi" id="aktivasi" value="<?php echo $data['aktivasi'];?>">
                              <?php
                              
                              if ($data['aktivasi']=="DEACTIVE") {
                                echo "<a href='pengusaha_aktivasi.php?no_ktp=".$data['no_ktp']."&& aktivasi=".$data['aktivasi']."'><button type='button' class='btn btn-primary' data-toggle='tooltip' data-placement='right' title='Aktivasi'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button></a>";
                              } else {
                                echo "<a href='pengusaha_aktivasi.php?no_ktp=".$data['no_ktp']."&& aktivasi=".$data['aktivasi']."'><button type='button' class='btn btn-danger' data-toggle='tooltip' data-placement='right' title='Aktivasi'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a>";
                              }
                              ?>
                              
                            </td>
                            <td>
                              <!--Hapus Data-->
                            <a href="javascript:;" data-id="<?php echo $data['no_ktp']; ?>" data-toggle="modal" data-target="#modal-konfirmasi">
                              <button class="btn btn-primary">
                                <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
                              </button>
                            </a>
                              <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title" id="myModalLabel">Hapus Data Pengusaha</h4>
                                    </div>
                                    <div class="modal-body">
                                      Apakah anda yakin akan menghapus seluruh data dengan nama <?php echo $data['nama'];?> ??
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

                              <!--Ubah Data-->
                              <a href="pengusaha_form_edit.php?no_ktp=<?php echo $data['no_ktp'];?>"><button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                            </td>
                          </tr>
                          </tbody>
                          
                          
                          <?php
                        }?>
                  </table>
                  
                  <?php
              }else{
                ?>
                <div class="alert alert-warning" role="alert">Data Pemilik Usaha tidak ditemukan !!</div>
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
    <script src="../dinas_industri/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dinas_industri/js/bootstrap.min.js"></script>
    <script>
        
            $(document).ready(function(){

            $('#modal-konfirmasi').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
            var no_ktp = div.data('id')
            //var nama_kec = div.data('id')

            var modal = $(this)

            // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
            modal.find('#hapus-true').attr("href","pengusaha_hapus.php?no_ktp="+no_ktp);

            })

            });

        
    </script>
  </body>
</html>
