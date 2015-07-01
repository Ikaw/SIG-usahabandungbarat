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
    <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=kecamatan>
      $("#kecamatan").change(function(){
        var kecamatan = $("#kecamatan").val();
        $.ajax({
            url: "ambildesa.php",
            data: "kecamatan="+kecamatan,
            cache: false,
            success: function(msg){
                //jika data sukses diambil dari server kita tampilkan
                //di <select id=kota>
                $("#desa").html(msg);
            }
        });
      });
    });
    </script>
    <script type="text/javascript" >
 
    (function() {
 
    // Mendefinisikan variabel global
    var map, geocoder, marker, infowindow;
 
    window.onload = function() {
 
      // Membuat map baru
      var options = {  
        zoom: 12,  
        center: new google.maps.LatLng(-6.865221399999999, 107.49197670000001),  
        mapTypeId: google.maps.MapTypeId.ROADMAP  
      };  
 
      map = new google.maps.Map(document.getElementById('map'), options);
 
      // Mengambil referensi ke form HTML
      var form = document.getElementById('addressForm');
 
      // Menangkap event submit form
      form.onclick = function() {
        // Mendapatkan alamat dari input teks
        var address = document.getElementById('address').value;
 
        // Membuat panggilan Geocoder 
        getCoordinates(address);
 
        // Menghindari form dari page submit
        return false;
 
      }
 
    }
 
    // Membuat sebuah fungsi yang mengembalikan koordinat alamat
    function getCoordinates(address) {
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
  <script type="text/javascript">
    function submitForm(action)
    {
        document.getElementById('addressForm').action = action;
        document.getElementById('addressForm').submit();
    }
  </script>
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
                      <?php tambah_usaha();?>
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
              <button class="btn btn-primary" type="button">
                <span class="glyphicon glyphicon-search" aria-hidden="true">  Cari</span>
              </button>
            </span>
          </div>
        </div>
      </div>
      <div class="row show-grid">
        <div class="col-md-12">
          <?php
          $link = koneksi_db();

          if (isset($_GET['id_usaha'])) {
            $id_usaha = $_GET['id_usaha'];
            $sql = "SELECT * FROM data_usaha WHERE id_usaha='$id_usaha'";
            $result=mysql_query($sql, $link);
            $banyakrecord=mysql_num_rows($result);
            if ($banyakrecord==1) {
              $data = mysql_fetch_array($result);
              $id_usaha = $data['id_usaha'];
              ?>

              <form id="addressForm" method="POST" action="usaha_proses_edit.php?id_usaha=<?=$id_usaha?>" class="form-horizontal">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">Edit Data Usaha</h3>
                  </div>
                </div>
                <div class="form-group">
                    <label for="no_ktp" class="col-sm-4  control-label">No KTP</label>
                    <div class="col-sm-6">
                      <select name="no_ktp" class="form-control">
                      <?php
                      $link = koneksi_db();
                      $ktp="SELECT no_ktp, nama FROM pemilik_usaha where dihapus='T'";
                      $resktp = mysql_query($ktp, $link);
                      while ($dataktp=mysql_fetch_array($resktp)) {
                        ?>
                        <option value="<?php echo "$dataktp[no_ktp]";?>" <?php if ($dataktp['no_ktp']==$data['no_ktp']) echo "selected";?>>
                          <?php echo "$dataktp[no_ktp]";?> - <?php echo "$dataktp[nama]";?>
                        </option>
                      <?php 
                      }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama_usaha" class="col-sm-4  control-label">Nama Usaha</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha Anda" value="<?php echo "$data[nama_usaha]";?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="produk_utama" class="col-sm-4  control-label">Produk Utama</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="produk_utama" name="produk_utama" placeholder="Produk Utama" value="<?php echo "$data[produk_utama]";?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi_usaha" class="col-sm-4  control-label">Deskripsi Usaha</label>
                    <div class="col-sm-6">
                      <textarea type="text" class="form-control" id="deskripsi_usaha" name="deskripsi_usaha"  placeholder="Deskripsi Usaha" value="<?php echo "$data[deskripsi_usaha]";?>"><?php echo "$data[deskripsi_usaha]";?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="skala" class="col-sm-4  control-label">Skala Usaha</label>
                    <div class="col-sm-6">
                      <select name="skala" class="form-control">
                        
                        <option value="Mikro" selected>Mikro</option>
                        <option value="Kecil" selected>Kecil</option>
                        <option value="Menengah" selected>Menengah</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama_sektor" class="col-sm-4  control-label">Sektor</label>
                    <div class="col-sm-6">
                      <select name="id_sektor" class="form-control">
                      <?php
                      $link = koneksi_db();
                      $sektor="SELECT id_sektor, nama_sektor FROM sektor_usaha where dihapus='T'";
                      $ressektor = mysql_query($sektor, $link);
                      while ($datasektor=mysql_fetch_array($ressektor)) 
                      {
                        ?>
                        <option value="<?php echo "$datasektor[id_sektor]";?>" <?php if($datasektor['id_sektor']==$data['id_sektor']) echo "selected";?>>
                          <?php echo "$datasektor[nama_sektor]";?>
                        </option>
                      <?php 
                      }?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="kecamatan" class="col-sm-4  control-label">Kecamatan</label>
                    <div class="col-sm-6" >
                      <select name="kecamatan" id="kecamatan" class="form-control">
                        <option>--Pilih Kecamatan--</option>
                        <?php
                          mysql_connect("localhost","root","");
                          mysql_select_db("db_sigbb");
                          //mengambil nama-nama kecamatan yang ada di database
                          $kecamatan = mysql_query("SELECT * FROM kecamatan ORDER BY nama_kec");
                          while($p=mysql_fetch_array($kecamatan))
                            {?>
                            <option value="<?php echo "$p[id_kec]";?>" <?php if($p['id_kec']==$data['id_kec']) echo "selected";?>>
                              <?php echo "$p[nama_kec]";?></option>
                              <?php
                            }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="desa" class="col-sm-4  control-label">Desa</label>
                    <div class="col-sm-6">
                      <select name="desa" id="desa" class="form-control">
                        <option>--Pilih Desa--</option>
                          <?php
                          //mengambil nama-nama desa yang ada di database
                          $desa = mysql_query("SELECT * FROM desa ORDER BY nama_desa");
                          while($p=mysql_fetch_array($kecamatan))
                            {?>
                            <option value="<?php echo "$p[id_desa]";?>" <?php if ($p['id_desa']==$data['id_desa']) echo "selected";?>>
                              <?php echo "$p[nama_desa]";?></option>
                              <?php
                            }
                          ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-4  control-label">Lokasi:</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="address" id="address" value="<?php echo "$data[alamat_usaha]";?>">
                    </div>
                    <div class="col-sm-2">
                      <input type="button" id="addressButton" value="Cari Koordinat" onclick="getCoordinates(address)" />          
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Lat" class="col-sm-4  control-label">Latitude</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="Lat" name="Lat" value="<?php echo "$data[lat]";?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Lng" class="col-sm-4  control-label">Longitude</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="Lng" name="Lng" value="<?php echo "$data[lng]";?>">
                    </div>
                  </div>
                  <div class="col-sm-10  form-group">
                    <div id="map"></div>
                  </div>
                  <div class="col-sm-10  form-group" align="center">
                    <!a href="usaha_proses_tambah.php">
                      <button type="submit" class ="btn btn-primary" id="Simpan" onclick="submitForm('usaha_proses_edit.php')" value="Simpan">Simpan</button>
                    <!/a>
                  </div>
              </form>


            <?php
            } else {
              echo "Data tidak ditemukan";
            }
          
          }?>
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
  </body>
</html>
