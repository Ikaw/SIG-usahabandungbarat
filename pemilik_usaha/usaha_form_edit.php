<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<?php include("lib_func.php"); ?>
		<meta charset="utf-8">
		<title>SIG | Potensi Usaha Bandung Barat </title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">
		
		
	    <!-- Custom Icon di Folder images/icons-->
	    <script type="text/javascript" src="../js/customicon.js"></script>
	    <link href="../dinas_industri/css/bootstrap.min.css" rel="stylesheet">
    	<link rel="stylesheet" type="text/css" href="../dinas_industri/css/css.css">

	    <!-- Begin Maps -->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

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
	  <script type="text/javascript">
	    var htmlobjek;
	    $(document).ready(function(){
	      //apabila terjadi event onchange terhadap object <select id=kecamatan>
	      $("#kecamatan").change(function(){
	        var kecamatan = $("#kecamatan").val();
	        $.ajax({
	            url: "../dinas_industri/ambildesa.php",
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
    

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="../images/KBB_logo.ico">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

		<!-- Bootstrap core CSS -->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="../fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="../css/animations.css" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="../css/style.css" rel="stylesheet">

		<!-- Custom css --> 
		<link href="../css/custom.css" rel="stylesheet">
	</head>

	<body class="no-trans" onLoad="load()">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ --> 
		<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">

							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="#banner"><img id="logo" src="../images/KBB_logo_header.png" alt="Worthy"></a>
							</div>

							<!-- name-and-slogan -->
							<div class="site-name-and-slogan smooth-scroll">
								<div class="site-name"><a href="#banner">SIG</a></div>
								<div class="site-slogan">Potensi Usaha Kabupaten <strong>Bandung Barat</strong></div>
							</div>

						</div>
						<!-- header-left end -->

					</div>
					<div class="col-md-8">

						<!-- header-right start -->
						<!-- ================ -->
						<div class="header-right clearfix">

							<!-- main-navigation start -->
							<!-- ================ -->
							<div class="main-navigation animated">

								<!-- navbar start -->
								<!-- ================ -->
								<nav class="navbar navbar-default" role="navigation">
									<div class="container-fluid">

										<!-- Toggle get grouped for better mobile display -->
										<div class="navbar-header">
											<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
										</div>

										<!-- Collect the nav links, forms, and other content for toggling -->
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li><a href="../pemilik_usaha/index.php">Home</a></li>
												<li class="active"><a href="#usahabaru">Usaha Baru</a></li>
												<li><a href="logout.php">Logout</a></li>
												
											</ul>
										</div>

									</div>
								</nav>
								<!-- navbar end -->

							</div>
							<!-- main-navigation end -->

						</div>
						<!-- header-right end -->

					</div>
				</div>
			</div>
		</header>
		<!-- header end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section translucent-bg bg-image-3">
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<br>
				<h1 id="usahabaru"  class="text-center title">Edit <span>Data Usaha</span></h1>
				<div class="space"></div>
				<div class="row">
					<div class="col-md-12">
			            <form id="addressForm" method="POST" action="usaha_proses_edit.php?id_usaha=<?=$id_usaha?>" class="form-horizontal">
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

			                  <div class="form-group">
			                    <div class="col-sm-6">
			                      <input type="hidden" class="form-control" id="id_usaha" name="id_usaha" value="<?php echo "$data[id_usaha]";?>">
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
			                          $kecamatan = mysql_query("SELECT * FROM kecamatan ORDER BY nama_kec;");
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
			                          $id_kec = $data['id_kec'];
			                          $desa = mysql_query("SELECT * FROM desa WHERE id_kec='$id_kec' ORDER BY nama_desa;");
			                          while($p=mysql_fetch_array($desa))
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
		<!-- section end -->            
   
		<!-- footer start -->
		<!-- ================ -->
		<footer id="footer">

			<!-- .subfooter start -->
			<!-- ================ -->
			<div class="subfooter">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="text-center">Developed by Kelompok 4 Aplikasi Teknologi Online <a href="http://www.unikom.ac.id">Unikom</a> 2015.</p>
						</div>
					</div>
				</div>
			</div>
			<!-- .subfooter end -->

		</footer>
		<!-- footer end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="../plugins/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap-datepicker.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="../plugins/modernizr.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="../plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="../plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="../plugins/jquery.appear.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="../js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="../js/custom.js"></script>
		<!-- Date Picker-->
		<script type="text/javascript">
            $(function () {
                $('#datepicker').datepicker({
                  format: 'yyyy-mm-dd'
                });
            });
    	</script>
	</body>
</html>