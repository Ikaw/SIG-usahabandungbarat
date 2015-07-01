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
      <?php menu_admin(); ?>
      <div class="col-md-9">
        <div class="row show-grid">
          <div class="col-md-5">
              <a href="usaha_form_tambah.php">
                <button class="btn btn-primary btn-md">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button>
              </a>
              &nbsp;&nbsp;&nbsp;
              <a href="usaha_report.php">
                <button class="btn btn-primary btn-md">
                  <span class="glyphicon glyphicon-file" aria-hidden="true"> Buat Laporan</span>
                </button>
              </a>
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
                <hr width="100%" color="black" />
                <div class="table-responsive">
                  <?php
                  $link=koneksi_db();
                        $sql="select * from data_usaha order by nama_usaha";
                        $res=mysql_query($sql,$link);
                        $banyakrecord=mysql_num_rows($res);
                        if($banyakrecord>0){
                          ?>
                          <table class="table table-hover" align="center">
                            <thead>
                              <tr>
                                <td>No KTP</td>
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
                                <td>Aktivasi</td>
                                <td>Aksi</td>
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
                                    <?php echo $data['no_ktp'];?>
                                  </td>
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
                                  <td align="center">
                                    <input type="hidden" name="aktivasi" id="aktivasi" value="<?php echo $data['aktivasi'];?>">
                                    <?php
                                    
                                    if ($data['aktivasi']=="DEACTIVE") {
                                      echo "<a href='usaha_aktivasi.php?id_usaha=".$data['id_usaha']."&& aktivasi=".$data['aktivasi']."'><button type='button' class='btn btn-primary' data-toggle='tooltip' data-placement='right' title='Aktivasi'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button></a>";
                                    } else {
                                      echo "<a href='usaha_aktivasi.php?id_usaha=".$data['id_usaha']."&& aktivasi=".$data['aktivasi']."'><button type='button' class='btn btn-danger' data-toggle='tooltip' data-placement='right' title='Aktivasi'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button></a>";
                                    }
                                    ?>
                                    
                                  </td>
                                  <td>
                                      <!--Hapus Data-->
                                    <a href="javascript:;" data-id="<?php echo $data['id_usaha']; ?>" data-toggle="modal" data-target="#modal-konfirmasi">
                                      <button class="btn btn-primary">
                                        <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
                                      </button>
                                    </a>
                                      <div class="modal fade" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title" id="myModalLabel">Hapus Data Usaha</h4>
                                            </div>
                                            <div class="modal-body">
                                              Apakah anda yakin akan menghapus seluruh data dengan ID Usaha <?php echo $data['id_usaha'];?> ??
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
                                      <a href="usaha_form_edit.php?id_usaha=<?php echo $data['id_usaha'];?>"><button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                                    </td>

                                </tr>
                                </tbody>
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
    <script src="../dinas_industri/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dinas_industri/js/bootstrap.min.js"></script>
    <script>
        
            $(document).ready(function(){

            $('#modal-konfirmasi').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
            var id_usaha = div.data('id')
            //var nama_kec = div.data('id')

            var modal = $(this)

            // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
            modal.find('#hapus-true').attr("href","usaha_hapus.php?id_usaha="+id_usaha);

            })

            });

        
    </script>
  
</body>
</html>
