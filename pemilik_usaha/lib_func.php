<?php 
$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/SIG-usahabandungbarat/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'home_index';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIG | Potensi Usaha Bandung Barat </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
		<style type="text/css">
      html, body {
        height: 100%;
        width: 100%;
        padding: 0;
        margin: 0;
      }

      #full-screen-background-image {
        z-index: -999;
        min-height: 100%;
        min-width: 1024px;
        width: 100%;
        height: auto;
        position: fixed;
        top: 0;
        left: 0;
      }

      #wrapper {
  	  width: 1000px;
      margin: auto;
      background-color:rgba(255,255,255,0.9);
      }

      a:link, a:visited{
        color: blue;
      }

      a.to-top:link,
      a.to-top:visited{
        margin-top: 1000px;
        display: block;
        font-weight: bold;
        padding-bottom: 30px;
        font-size: 30px;
      }

</style>
<style type="text/css">

.font1 {
    font-family: "Arial";
	color : black;
	font-size : 35pt;
}
.font2 {
    font-family: "Comic Sans MS";
	color : orange;
	font-size : 13pt;
}
.font3 {
    font-family: "Palace Script MT";
	color : red;
	font-size : 30pt;
}
.font4 {
    font-family: "Kristen ITC";
	color : blue;
	font-size : 13pt;
}
</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
<?php

function header_web()
{ ?>
	<div class="page-header" align="center">
		<img src="gambar/KBB_logo.png" height="90" width="90" />
		<h1>Sistem Informasi Geografis<br> Potensi Usaha Bandung Barat</h1>
	</div>
	<ul class="nav nav-tabs">
		<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  Beranda</a></li>
		<li><a href="index.php?app=about"><span class="glyphicon glyphicon-book" aria-hidden="true"></span>  About</a></li>
		<li class="dropdown pull-right"><a href="logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
	</ul>
<?php } 

function footer_web()
{ ?> 
  <div class="panel-footer" align="center">
    <h4><small><a>Developed By&nbsp;</a> Kelompok 4 Aplikasi Teknologi Online Universitas Komputer Indonesia&nbsp; &nbsp;</small></h4>
  </div>
<?php } ?>

<?php
function menu(){
  $noktp=$_SESSION['no_ktp'];
  $link=koneksi_db();
  $sql="select * from pemilik_usaha where no_ktp='$noktp'";
  $res=mysql_query($sql,$link);
  $data=mysql_fetch_array($res);
  $nama=$data['nama'];

  ?>
<div class="list-group" align="center">
  <div align="center" class="font1"><h5>Selamat Datang</h5></div>
  <div align="center"><font color="navy"><h3><?php echo "$nama";?></h3></font></div>
  <a href="index.php" class="list-group-item">Data Diri</a>
  <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
  <a href="#.php" class="list-group-item">Galery</a>
</div>

<?php }
function koneksi_db(){ 
  $host = "localhost"; 
  $database = "db_sigbb"; 
  $user = "root"; 
  $password = ""; 
  $link = mysql_connect($host,$user,$password); 
  mysql_select_db($database,$link); 
  
  if(!$link) 
    echo "Error :".mysql_error(); 
    return $link; 
}

function tampil_usaha(){?>
  <?php
            $noktp = $_SESSION['no_ktp'];
            $link=koneksi_db();
            $sql="select * from data_usaha where no_ktp = '$noktp' order by nama_usaha";
            $res=mysql_query($sql,$link);
            $banyakrecord=mysql_num_rows($res);
            if($banyakrecord>0){
              $i=0;
              while($data=mysql_fetch_array($res)){
                    $i++;
                    ?>

              <div class="row show-grid">
                <div class="container">
                  <div class="col-md-6 col-md-offset-3" data-animation-effect="fadeIn">
                    <div class="table-responsive">
                      <h3>Usaha ke - <span><?=$i;?></span></h3>
                      <table class="table">
                        <tr>
                          <td>ID Usaha</td>
                          <td><?=$data['id_usaha']?></td>
                        </tr>
                        <tr>
                          <td>Nama Usaha</td>
                          <td><?=$data['nama_usaha']?></td>
                        </tr>
                        <tr>
                          <td>Produk Utama</td>
                          <td><?=$data['produk_utama']?></td>
                        </tr>
                        <tr>
                          <td>Deskripsi Usaha</td>
                          <td><?=$data['deskripsi_usaha']?></td>
                        </tr>
                        <tr>
                          <td>Alamat Usaha</td>
                          <td><?=$data['alamat_usaha']?></td>
                        </tr>
                        <tr>
                          <td>Latitude</td>
                          <td><?=$data['lat']?></td>
                        </tr>
                        <tr>
                          <td>Longitude</td>
                          <td><?=$data['lng']?></td>
                        </tr>
                        <tr>
                          <td>Kecamatan</td>
                          <td><?=$data['id_kec']?></td>
                        </tr>
                        <tr>
                          <td>Desa</td>
                          <td><?=$data['id_desa']?></td>
                        </tr>
                        <tr>
                          <td>Sektor</td>
                          <td><?=$data['id_sektor']?></td>
                        </tr>
                        <tr>
                          <td>Skala</td>
                          <td><?=$data['skala']?></td>
                        </tr>
                        <tr>
                          <td>Status</td>
                          <td><?=$data['aktivasi']?></td>
                        </tr>
                        <tr align="center">
                          <td colspan="2">
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
                                      Apakah anda yakin akan menghapus Usaha <?php echo $data['nama_usaha'];?> ??
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
                            
                            
                              <a href="usaha_form_edit.php?id_usaha=<?php echo $data['id_usaha'];?>">
                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah">
                                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                              </a>
                            </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="space"></div>  
                    <?php
                    }?>
            <?php
            }else{
              ?>
              <div class="alert alert-warning" role="alert">Data Usaha tidak ditemukan !!</div>
              <?php
            }
}
function tampil_nama(){
  $noktp = $_SESSION['no_ktp'];
  $link=koneksi_db();
  $sql="select * from pemilik_usaha where no_ktp = '$noktp'";
  $res=mysql_query($sql,$link);
  $data=mysql_fetch_array($res);
  echo $data['nama'];
}

function tampil_datadiri(){
  $noktp = $_SESSION['no_ktp'];
  $link=koneksi_db();
  $sql="select * from pemilik_usaha where no_ktp = '$noktp' && dihapus='T'";
  $res=mysql_query($sql,$link);
  $data=mysql_fetch_array($res);
  ?>
  <div class="row">
    <div class="col-md-6">
    <div class="row">
      <div class="col-md-3 col-md-offset-5">
        <p class="large">
          <span>Nomor KTP </span>
        </p>
      </div>
      <div class="col-md-4">
        <p class="large">
          <?=$data['no_ktp']?>
        </p>
        
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-md-offset-5">
        <p class="large">
          <span>Nama </span>
        </p>
      </div>
      <div class="col-md-4">
        <p class="large">
          <?=$data['nama']?>
        </p>
        
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-md-offset-5">
        <p class="large">
          <span>Tempat Lahir </span>
        </p>
      </div>
      <div class="col-md-4">
        <p class="large">
          <?=$data['tpt_lahir']?>
        </p>
        
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-md-offset-5">
        <p class="large">
          <span>Tanggal Lahir </span>
        </p>
      </div>
      <div class="col-md-4">
        <p class="large">
          <?=$data['tgl_lahir']?>
        </p>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        <p class="large">
          <span>Alamat </span>
        </p>
      </div>
      <div class="col-md-5">
        <p class="large">
          <?=$data['alamat']?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        <p class="large">
          <span>Telepon </span>
        </p>
      </div>
      <div class="col-md-5">
        <p class="large">
          <?=$data['no_telp']?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        <p class="large">
          <span>Email </span>
        </p>
      </div>
      <div class="col-md-5">
        <p class="large">
          <?=$data['email']?>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12" align="center">
    <a href="pengusaha_form_edit.php?no_ktp=<?php echo $data['no_ktp'];?>">
      <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Edit Data Diri
      </button>
    </a>
  </div>
</div>    
<?php
}

function filter_gambar(){
  $noktp = $_SESSION['no_ktp'];
  $link=koneksi_db();
  $sql="select * from data_usaha where no_ktp = '$noktp'";
  $res=mysql_query($sql,$link);
  $i=0;
  while($data=mysql_fetch_array($res)){
    $i++;
    ?>
    <li><a href="#" data-filter=".<?=$data['id_usaha']?>"><?=$data['nama_usaha']?></a></li>
<?php
  }
}

function galeri(){
  $noktp = $_SESSION['no_ktp'];
  $link=koneksi_db();
  $sql="select * from data_usaha where no_ktp = '$noktp'";
  $res=mysql_query($sql,$link);
  $i=0;
  while($data=mysql_fetch_array($res)){
    $i++;
    $id_usaha=$data['id_usaha'];
    $gambar = "select * from galeri where id_usaha='$id_usaha' && dihapus='T'";
    $result = mysql_query($gambar,$link);
    $i=0;
    while ($gam=mysql_fetch_array($result)) {
      $i++;
  ?>

  <div class="col-sm-6 col-md-3 isotope-item <?=$id_usaha?>">
    <div class="image-box">
      <div class="overlay-container">
        <img src="../dinas_industri/user_data/<?=$gam['nama_gambar']?>">
        <a class="overlay" data-toggle="modal" data-target="#<?=$gam['id_gambar']?>">
          <i class="fa fa-search-plus"></i>
          <span><?echo "$data=['nama_usaha']";?></span>
        </a>
      </div>
      <a class="btn btn-default btn-block" data-toggle="modal" data-target="#<?=$gam['id_gambar']?>"><?=$gam['id_gambar']?></a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="<?=$gam['id_gambar']?>" tabindex="-1" role="dialog" aria-labelledby="<?=$gam['id_gambar']?>-label" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="<?=$gam['id_gambar']?>-label"><?=$data['nama_usaha']?></h4>
          </div>
          <div class="modal-body">
            <h3><?=$data['nama_usaha']?></h3>
            <div class="row">
              <div class="col-md-6">
                <p><?=$data['deskripsi_usaha']?></p>
              </div>
              <div class="col-md-6">
                <img src="../dinas_industri/user_data/<?=$gam['nama_gambar']?>">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal end -->
  </div>
<?php
    }
  }
}?>

<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
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
