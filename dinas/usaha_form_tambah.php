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
    <link rel="stylesheet" href="css/peta.css">
    <link rel="stylesheet" href="css/maps.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    
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
    <!--<script type="text/javascript">

    function updateMarkerPosition(latLng) {
    document.getElementById('lat').value = [latLng.lat()];
    document.getElementById('lng').value = [latLng.lng()];
    }

    //membuat map baru
    var myOptions = {
      zoom: 11,
      scaleControl: true,
      center:  new google.maps.LatLng(-6.913785, 107.407542),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map"), myOptions);
    //sampai sini

    //buat marker
    var marker1 = new google.maps.Marker({
      position : new google.maps.LatLng(-6.913785, 107.407542),
      title : 'lokasi',
      map : map,
      draggable : true
    });
    
    //updateMarkerPosition(latLng);
    google.maps.event.addListener(marker1, 'drag', function() {
      updateMarkerPosition(marker1.getPosition());
    });

    </script>-->
        <script type="text/javascript" >
 
    (function() {
 
    // Mendefinisikan variabel global
    var map, geocoder, marker, infowindow;
 
    window.onload = function() {
 
      // Membuat map baru
      var options = {  
        zoom: 5,  
        center: new google.maps.LatLng(-6.20810, 106.84571),  
        mapTypeId: google.maps.MapTypeId.ROADMAP  
      };  
 
      map = new google.maps.Map(document.getElementById('map'), options);
 
      // Mengambil referensi ke form HTML
      var form = document.getElementById('addressForm');
 
      // Menangkap event submit form
      form.onsubmit = function() {
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
          <form method="POST" action="usaha_proses_tambah.php" enctype="multipart/form-data" class="form-horizontal">
            <table align="center" width="50%"
              <tr>
                <td align="center" colspan=2>
                  <br>
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Tambah Data Usaha</h3>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan=2>
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
                            <?php }?>
                        </select>
                      </div>
                    </div>
                    <form id="addressForm" action="/">
                      <div>
                        <label for="alamat">Lokasi:</label>
                        <input type="text" name="alamat" id="alamat" />
                        <input type="submit" id="addressButton" value="Cari Koordinat" />          
                      </div>
                    </form>
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
                      <label for="lat" class="col-sm-4 control-label">Latitude</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="lat" name="lat">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lng" class="col-sm-4 control-label">Longitude</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="lng" name="lng">
                      </div>
                    </div>
                    <div class="span8">
                      <div id="map"></div>
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
    <script src="js/lokasi.js"></script>
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
