<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

    <!-- Bootstrap -->
    <link href="../dinas_industri/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../dinas_industri/css/css.css">
    <link rel="stylesheet" href="../dinas_industri/css/peta.css">
    <!--link rel="stylesheet" href="../dinas_industri/css/maps.css"-->

    
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>

    <script type="text/javascript" >
 
    (function() {
 
    // Mendefinisikan variabel global
    var map, geocoder, marker, infowindow;
 
    window.onload = function() {
 
      // Membuat map baru
      var options = {  
        zoom: 11,  
        center: new google.maps.LatLng(-6.913785, 107.407542),  
        mapTypeId: google.maps.MapTypeId.ROADMAP  
      };  
 
      map = new google.maps.Map(document.getElementById('map'), options);
 
      // Mengambil referensi ke form HTML
      var form = document.getElementById('addressForm');
 
      // Menangkap event submit form
      /*form.onsubmit = function() {
        // Mendapatkan alamat dari input teks
        var address = document.getElementById('address').value;
 
        // Membuat panggilan Geocoder 
        getCoordinates(address);
 
        // Menghindari form dari page submit
        return false;
 
      }*/
 
    }
 
    // Membuat sebuah fungsi yang mengembalikan koordinat alamat
    function getCoordinates() {
      var address = document.getElementById('alamat').value;
      // Mengecek apakah terdapat 'geocoded object'. Jika tidak maka buat satu.
      if(!geocoder) {
        geocoder = new google.maps.Geocoder();  
      }
 
      // Membuat objek GeocoderRequest
      var geocoderRequest = {
        address: address
      }
 
      // Membuat rekues Geocode 
      geocoder.geocode(geocoderRequest, function(results, status) {
 
        // Mengecek apakah ststus OK sebelum proses
        if (status == google.maps.GeocoderStatus.OK) {

          document.getElementById('Lat').value = results[0].geometry.location.A;
          document.getElementById('Lng').value = results[0].geometry.location.F;

          // Menengahkan peta pada lokasi 
          map.setCenter(results[0].geometry.location);
 
          // Mengecek apakah terdapat objek marker
          if (!marker) {
            // Membuat objek marker dan menambahkan ke peta
            marker = new google.maps.Marker({
              map: map
            });
          }
 
          // Menentukan posisi marker ke lokasi returned location
          marker.setPosition(results[0].geometry.location);
 
          // Mengecek apakah terdapat InfoWindow object
          if (!infowindow) {
            // Membuat InfoWindow baru
            infowindow = new google.maps.InfoWindow();
          }
 
          // membuat konten InfoWindow ke alamat
          // dan posisi yang ditemukan
          var content = '<strong>' + results[0].formatted_address + '</strong><br />';
          content += 'Lat: ' + results[0].geometry.location.lat() + '<br />';
          content += 'Lng: ' + results[0].geometry.location.lng();
 
          // Menambahkan konten ke InfoWindow
          infowindow.setContent(content);
 
          // Membuka InfoWindow
          infowindow.open(map, marker);
 
        } 
 
      });
 
    }
 
  })();
 
  </script>

  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
<?php

function header_web()
{ ?>
  <div class="row">
    <div class="col-md-2 col-md-offset-2 text-center">
      <img src="../dinas_industri/img/logo.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="col-md-7">
      <h1>
        <div class="head">
          Sistem Informasi Geografis
        </div>
      </h1>
      <h1>
        <div class="head">Potensi Usaha</div>
      </h1>
    </div>
  </div>
<?php }

function navbar()
{ ?>
  <nav class="navbar navbar-default">
    <div class="cointainer-fluid">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Dropdown <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li>1</li>
              <li>2</li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php } 

function footer_web()
{ ?>
  <div class="row">
    <div class="myfooter" align="center">
      <h4>Copyright &copy; 2015</h4>
    </div>
  </div>
   
<?php } 

function form_login(){ ?> 
<form method=post action="login.php">
  Login disini
</form> 

<?php }

function dashboard(){?>
  <div class="col-md-3">
      <div class="list-group" align="center">
        <h4><b><a href="index.php" class="list-group-item active"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  DASHBOARD</a></b></h4>
        <a href="pengusaha_view.php" class="list-group-item">Data Pengusaha</a>
        <a href="sektor_view.php" class="list-group-item">Data Sektor Usaha</a>
        <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
        <a href="desa_view.php" class="list-group-item">Data Desa</a>
        <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
        <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
        <a href="#" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
      </div>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-3">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </div>
                <div class="col-xs-9">
                  <div class="huge">5</div>
                  <div>Data Pemilik Usaha <b>Baru</b> !!!</div>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <span>Lihat Selengkapnya</span>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="jumbotron view">
            <h3>Data Usaha <b>Baru</b> !!!</h3>
          </div>
        </div>
      </div>
    </div>
<?php}


<?php } 

function menu(){ 
$telahlogin=true; //Nanti di isi perintah pemeriksaan status login 
  if($telahlogin==false) 
    form_login(); 
  else 
    dashboard(); 
} 

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

function tambah_pengusaha() {?>
<form method="POST" action="pengusaha_proses_tambah.php" enctype="multipart/form-data" class="form-horizontal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah Data Pengusaha</h4>
  </div>
  <div class="modal-body">
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
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
  </div>
</form>
<?php

}

function tambah_sektor(){ ?>
  <form method="POST" action="sektor_proses_tambah.php" class="form-horizontal">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah Data Sektor</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="nama_sektor" class="col-sm-4 control-label">Nama Sektor Usaha</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="nama_sektor" name="nama_sektor" placeholder="Nama Sektor Usaha">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
  </div>
  </form>
<?php
}

function tambah_kecamatan(){ ?>
  <form method="POST" action="kecamatan_proses_tambah.php" class="form-horizontal">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah Data Kecamatan</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="nama_kec" class="col-sm-4 control-label">Nama Kecamatan</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="nama_kec" name="nama_kec" placeholder="Nama Kecamatan">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
  </div>
  </form>
<?php }

function tambah_desa() {?>
<form method="POST" action="desa_proses_tambah.php" class="form-horizontal">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah Data Desa</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="nama_desa" class="col-sm-4 control-label">Nama Desa</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="nama_desa" name="nama_desa" placeholder="Nama Desa">
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
        while ($data=mysql_fetch_array($result)) {
        ?>
          <option value="<?php echo "$data[id_kec]";?>">
          <?php echo "$data[nama_kec]";?>
          </option>
        <?php }?>
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
  </div>
  </form>
<?php }

function tambah_usaha(){?>
  <form method="POST" action="usaha_proses_tambah.php" class="form-horizontal">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah Data Usaha</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="nama_usaha" class="col-sm-4 control-label">Nama Usaha</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha Anda">
      </div>
    </div>
    <div class="form-group">
      <label for="produk_utama" class="col-sm-4 control-label">Produk Utama</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="produk_utama" name="produk_utama" placeholder="Produk Utama">
      </div>
    </div>
    <div class="form-group">
      <label for="deskripsi_usaha" class="col-sm-4 control-label">Deskripsi Usaha</label>
      <div class="col-sm-8">
        <textarea type="text" class="form-control" id="deskripsi_usaha" name="deskripsi_usaha"  placeholder="Deskripsi Usaha"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="skala" class="col-sm-4 control-label">Skala Usaha</label>
      <div class="col-sm-8">
        <select name="skala" class="form-control">
          <option>--Pilih Skala--</option>
          <option value="Mikro">Mikro</option>
          <option value="Kecil">Kecil</option>
          <option value="Menengah">Menengah</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="nama_sektor" class="col-sm-4 control-label">Sektor</label>
      <div class="col-sm-8">
        <select name="id_sektor" class="form-control">
        <?php
        $link = koneksi_db();
        $sql="SELECT id_sektor, nama_sektor FROM sektor_usaha where dihapus='T'";
        $result = mysql_query($sql, $link);
        while ($data=mysql_fetch_array($result)) {
          ?>
          <option value="<?php echo "$data[id_sektor]";?>">
            <?php echo "$data[nama_sektor]";?>
          </option>
        <?php 
        }?>
        </select>
      </div>
    </div>
    <div>
        <label for="alamat">Lokasi:</label>
        <input type="text" name="alamat" id="alamat" />
        <input type="button" id="addressButton" value="Cari Koordinat" onclick="getCoordinates()"/>          
      </div>
    <div class="form-group">
      <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
      <div class="col-sm-8" >
        <select name="kecamatan" id="kecamatan" class="form-control">
          <option>--Pilih Kecamatan--</option>
          <?php
            mysql_connect("localhost","root","");
            mysql_select_db("db_sigbb");
            //mengambil nama-nama kecamatan yang ada di database
            $kecamatan = mysql_query("SELECT * FROM kecamatan ORDER BY nama_kec");
            while($p=mysql_fetch_array($kecamatan)){
              echo "<option value=\"$p[id_kec]\">$p[nama_kec]</option>\n";
            }
          ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="desa" class="col-sm-4 control-label">Desa</label>
      <div class="col-sm-8">
        <select name="desa" id="desa" class="form-control">
          <option>--Pilih Desa--</option>
            <?php
            //mengambil nama-nama desa yang ada di database
            $desa = mysql_query("SELECT * FROM desa ORDER BY nama_desa");
            while($p=mysql_fetch_array($kecamatan)){
              echo "<option value=\"$p[id_desa]\">$p[nama_desa]</option>\n";
            }
            ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="Lat" class="col-sm-4 control-label">Latitude</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="Lat" name="Lat">
      </div>
    </div>
    <div class="form-group">
      <label for="Lng" class="col-sm-4 control-label">Longitude</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="Lng" name="Lng">
      </div>
    </div>
    <div class="span8">
      <div id="map"></div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
  </div>
  </form>
<?php
}

function tambah_gambar(){?>
  <form method="POST" action="galeri_proses_tambah.php" class="form-horizontal" enctype="multipart/form-data">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah Gambar</h4>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="nama_kec" class="col-sm-4 control-label">ID Usaha</label>
      <div class="col-sm-8">
        <select name="id_usaha">
        <?php
          $link = koneksi_db();
          $sql="SELECT id_usaha FROM data_usaha where dihapus='T'";
          $result = mysql_query($sql, $link);
          while ($data=mysql_fetch_array($result)) {
            ?>
            <option value="<?php echo "$data[id_usaha]";?>">
                           <?php echo "$data[id_usaha]";?>
            </option>
          <?php 
          }?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="files" class="col-sm-4 control-label">Gambar</label>
      <div class="col-sm-8">
        <input type="file" name="files[]" multiple/>
        <p class="help-block">Telusuri...</p>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
  </div>
</form>

<?php
}
?>



<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../dinas_industri/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dinas_industri/js/bootstrap.min.js"></script>
    <script src="../dinas_industri/js/bootstrap-datepicker.js"></script>
    <!--<script>
      $('#datetimepicker').datetimepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        minView: 2
      });
    </script>
    <script type="text/javascript">
            $(function () {
                $('#datepicker').datepicker({
                  format: 'yyyy-mm-dd'
                });
            });
        </script>-->
    
  </body>
</html>
