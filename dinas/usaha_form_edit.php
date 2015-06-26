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
    <script type="text/javascript">

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
          <?php
          $link = koneksi_db();

          if (isset($_POST['id_usaha'])) 
          {
            $id_usaha = $_POST['id_usaha'];
            $nama_usaha = $_POST['nama_usaha'];
            $sql = "UPDATE data_usaha SET nama_usaha='$nama_usaha' WHERE id_usaha='$id_usaha'";
            $res=mysql_query($sql,$link);
            if ($res) {
            } 
            else {
              echo "Gagal Broh !!!";
            }
          }

          if (isset($_GET['id_usaha'])) {
            $id_usaha = $_GET['id_usaha'];
            $sql = "SELECT * FROM data_usaha WHERE id_usaha='$id_usaha'";
            $result=mysql_query($sql, $link);
            $banyakrecord=mysql_num_rows($result);
            if ($banyakrecord==1) {
              $data = mysql_fetch_array($result)?>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data" class="form-horizontal">
              <table align="center" width="50%"
                <tr>
                  <td align="center" colspan=2>
                    <br>
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Edit Data Usaha</h3>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td colspan=2>
                      <div class="form-group">
                        <label for="id_usaha" class="col-sm-4 control-label">ID Usaha</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="id_usaha" name="id_usaha" value="<?=$data['id_usaha']?>" readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama_usaha" class="col-sm-4 control-label">Nama Usaha</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="<?=$data['nama_usaha']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="produk_utama" class="col-sm-4 control-label">Produk Utama</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="produk_utama" name="produk_utama" value="<?=$data['produk_utama']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi_usaha" class="col-sm-4 control-label">Deskripsi Usaha</label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" value="<?=$data['deskripsi_usaha']?>"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="skala" class="col-sm-4 control-label">Skala Usaha</label>
                        <div class="col-sm-8">
                          <select name="skala" class="form-control">
                            <option>--Pilih Skala--</option>
                            <option value="Mikro" <?php if ($_POST['skala']=="Mikro") echo "checked";?>>Mikro</option>
                            <option value="Kecil" <?php if ($_POST['skala']=="Kecil") echo "checked";?>>Kecil</option>
                            <option value="Menengah" <?php if ($_POST['skala']=="Menengah") echo "checked";?>>Menengah</option>
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
                                <option value="<?php echo "$data[id_sektor]";?>" <?php if ($_POST[id_sektor]=="$data[id_sektor]") echo "checked";?>>
                                  <?php echo "$data[nama_sektor]";?>
                                </option>
                              <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat Usaha</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Usaha" value="<?=$data['alamat_usaha']?>">
                        </div>
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
                            while($p=mysql_fetch_array($kecamatan)){?>
                              <option value="<?=$p[id_kec]?>" <?php if ($_POST[kecamatan]=="$p[id_kec]") echo "checked";?>><?=$p[nama_kec]?></option>\n";
                            <?php}
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
                            while($p=mysql_fetch_array($kecamatan)){ ?>
                              <option value="<?=$p[id_desa]?>" <?php if ($_POST['desa']==$p['id_desa']) echo "checked";?>><?=$p[nama_desa]?></option>\n";
                            <?php }
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
          <?php
            } else {
              echo "Data tidak ditemukan";
            }
          }?>
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
