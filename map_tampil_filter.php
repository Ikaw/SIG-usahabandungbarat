<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>SIG | Potensi Usaha Bandung Barat </title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">
		<script type="text/javascript" src="jquery/jquery-ui.min.js"></script>
		<script type="text/javascript" src="jquery/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="jquery/jquery-ui.min.css">

		<style type="text/css">
			.fontHitam{
				color: black;
			}
		</style>

		<!-- Begin Maps -->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAqhJ6sg9DMHKhLvWrzUs96NDMemaDXriw&sensor
    =false"></script>
    	<?php include("lib/lib_func.php"); ?>
		<style>
	      #map {
	      width: auto;
	      height: 600px;
	      }
	    </style>
	    <!-- Custom Icon di Folder images/icons-->
	    <script type="text/javascript" src="js/customicon.js"></script>

	    
		<!-- Load Maps -->
		<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function(e) {
	         //meload map
	          var map = new google.maps.Map(document.getElementById("map"), {
	            center: new google.maps.LatLng(-6.913785, 107.407542),
	            zoom: 12, //tingkat zoom map, sesuaikan kebutuhan
	            mapTypeId: 'roadmap'
	          });
	          var infoWindow = new google.maps.InfoWindow;

	          // download XML dokumen
	          downloadUrl("filter_map.xml", function(data) {
	            var xml = data.responseXML;
	            var markers = xml.documentElement.getElementsByTagName("marker");
	            for (var i = 0; i < markers.length; i++) {
	              var name = markers[i].getAttribute("name");
	              var address = markers[i].getAttribute("address");
	              var type = markers[i].getAttribute("category");
	              var point = new google.maps.LatLng(
	                  parseFloat(markers[i].getAttribute("lat")),
	                  parseFloat(markers[i].getAttribute("lng")));
	              var html = "<font color='black'><b>" + name + "</b></font><br/><font color='black'>" + address + "</font>";
	              var icon = customIcons[type] || {};
	              var marker = new google.maps.Marker({
	                map: map,
	                position: point,
	                icon: icon.icon //ganti icon
	              });
	              bindInfoWindow(marker, map, infoWindow, html);
	            }
	          });
	        

	        function bindInfoWindow(marker, map, infoWindow, html) {
	          google.maps.event.addListener(marker, 'click', function() {
	            infoWindow.setContent(html);
	            infoWindow.open(map, marker);
	          });
	        }

	        function downloadUrl(url, callback) {
	          var request = window.ActiveXObject ?
	              new ActiveXObject('Microsoft.XMLHTTP') :
	              new XMLHttpRequest;

	          request.onreadystatechange = function() {
	            if (request.readyState == 4) {
	              request.onreadystatechange = doNothing;
	              callback(request, request.status);
	            }
	          };
	          request.open('GET', url, true);
	          request.send(null);
	        }
	        function doNothing() {}
	        
	    $("#desa").hide();
		$("#sektor").hide();
		$("#kecamatan").show();
		
		var keyword = "";
		var kategori = "";
		
		$("#kategori").change(function(){
			$("#kategori option:selected").each(function() {
                if($(this).attr("value")=="kecamatan")
				{
					$("#desa").hide();
					$("#sektor").hide();
					$("#kecamatan").show();
				}
				if($(this).attr("value")=="desa")
				{
					$("#kecamatan").hide();
					$("#sektor").hide();
					$("#desa").show();
				}
				if($(this).attr("value")=="Sektor Usaha")
				{
					$("#kecamatan").hide();
					$("#sektor").show();
					$("#desa").hide();
				}
				
            });
		});
		
		$("#filter_map").click(function(){
			if($("#kecamatan").is(":visible"))
			{
				kategori = "kec";
				keyword = $("#kecamatan").val();
			}
			if($("#desa").is(":visible"))
			{
				kategori = "desa";
				keyword = $("#desa").val();
			}
			if($("#sektor").is(":visible"))
			{
				kategori = "sektor";
				keyword = $("#sektor").val();
			}
			
			window.location = "map_filter.php?kategori="+kategori+"&keyword="+keyword+"&search=null";
		});
	});
	        //]]>
	      </script>
    	<!-- End Maps-->
    

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="images/KBB_logo.ico">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

		<!-- Bootstrap core CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="css/animations.css" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="css/style.css" rel="stylesheet">

		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
	</head>

	<body class="no-trans" >
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
								<a href="#banner"><img id="logo" src="images/KBB_logo_header.png" alt="Worthy"></a>
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
												<li class="active"><a href="#banner">Home</a></li>
												<li><a href="#about">About</a></li>
												<li><a href="#peta">Peta</a></li>
												<li><a href="#info">Info</a></li>
												<li><a href="#daftar">Daftar</a></li>
												<li><a href="#login">Login</a></li>
												<li><a href="#kontak">Hubungi Kami</a></li>
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

		<!-- banner start -->
		<!-- ================ -->
		<div id="banner" class="banner">
			<div class="banner-image"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
							<h1 class="text-center">Selamat <span>Datang</span></h1>
							<p class="lead text-center">
								Anda memiliki Usaha di Kabupaten Bandung Barat?
							</p> 
							<p class="lead text-center">
								Segera Daftarkan pada Kami !
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 id="about" class="title text-center">Website <span>SIG</span> Potensi Usaha Kabupaten Bandung Barat</h1>
						<p class="lead text-center">Website Sistem Informasi Geografis data usaha di Kabupaten Bandung Barat</p>
						<div class="space"></div>
						<div class="row">
							<div class="col-md-6">
								<img src="images/section-image-1.png" alt="">
								<div class="space"></div>
							</div>
							<div class="col-md-6">
								<p>Sistem Informasi Geografis (SIG) Potensi Usaha Kabupaten Bandung Barat merupakan website yang menampilkan data usaha yang ada di Kabupaten Bandung Barat yang disajikan dalam Maps dengan data-data usaha yang telah terintegrasi pada database kami.</p>
								<p>Pengunjung dapat mendaftarkan diri sebagai pengusaha untuk menampilkan data usaha yang dimiliki (berupa marker pada maps) sehingga diharpakan setelah dipublikasikan pada website ini, data usaha yang didaftarkan akan dengan mudah dilihat oleh orang banyak.</p>
								<p>Pada Website Ini terdapat beberapa konten diantaranya :  </p>
								<ul class="list-unstyled">
									<li><i class="fa fa-caret-right pr-10 text-colored"></i><a href="index.php#peta"> Lihat Peta Usaha Kabupaten Bandung Barat</a></li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i><a href="index.php#info">Info Statistik Data Usaha Kabupaten Bandung Barat</a></li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i><a href="index.php#daftar"> Pendaftaran Usaha</a></li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i><a href="index.php#login"> Login (Untuk yang sudah daftar)</a></li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i><a href="index.php#kontak"> Hubungi Kami</a></li>
								</ul>
							</div>
						</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section translucent-bg bg-image-1 blue">
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="peta"  class="text-center title">Peta Data Usaha</h1>
				<div class="space"></div>
				<div class="row">
					<div id="map"></div>
					<div>
						<div>
							<div>
								<br> <br>
								<h1 id="peta"  class="text-center title">Filter Data Usaha</h1>
							</div>
							<div>
								<p class="lead text-center">Filter Data Usaha Berdasarkan:</p>
								<br>
							<table align="center">
							<tr>
								<td>
									<select name="kategori" id="kategori" class="fontHitam selectpicker" align="center">
										<option value="Kecamatan" class="fontHitam">Kecamatan</option>
										<option value="desa" class="fontHitam">Desa</option>
										<option value="Sektor Usaha" class="fontHitam">Sektor Usaha</option>
									</select>
									<br>
								</td>
							</tr>
							<tr>
								<td>
									<br>
								</td>
							<tr>
							<tr>
								<td>
									<select name="desa" id="desa" class="selectpicker">
										<?php
											koneksi_db();
											$sql = "SELECT id_desa, nama_desa FROM desa ORDER BY nama_desa";
											$query = mysql_query($sql);
											if(!$query)
											{
												echo 'Error : '.mysql_error();
											}
											while($row = mysql_fetch_array($query))
											{
												?>
													<option class="fontHitam" value="<?=$row['id_desa']?>"><?=$row['nama_desa']?></option>
												<?php
											}
										?>
									</select>
									<select name="kecamatan" id="kecamatan" class="fontHitam selectpicker">
										<?php
											koneksi_db();
											$sql = "SELECT id_kec, nama_kec FROM kecamatan ORDER BY nama_kec";
											$query = mysql_query($sql);
											if(!$query)
											{
												echo 'Error : '.mysql_error();
											}
											while($row = mysql_fetch_array($query))
											{
												?>
													<option class="fontHitam" value="<?=$row['id_kec']?>"><?=$row['nama_kec']?></option>
												<?php
											}
										?>
									</select>
									<select name="sektor" id="sektor" class="fontHitam">
										<?php
											koneksi_db();
											$sql = "SELECT id_sektor, nama_sektor FROM sektor_usaha ORDER BY nama_sektor";
											$query = mysql_query($sql);
											if(!$query)
											{
												echo 'Error : '.mysql_error();
											}
											while($row = mysql_fetch_array($query))
											{
												?>
													<option class="fontHitam" value="<?=$row['id_sektor']?>"><?=$row['nama_sektor']?></option>
												<?php
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>
								<br><br>
								</td>
							</tr>
							<tr>
								<td>	
								<div align="left">
									<button class="btn btn-primary" id="filter_map"> Filter Map</button>
								</div>
								</td>
							</tr>
							<tr>
								<td>
									<br>
								</td>
							</tr>
							<tr>
								<td>	
								<div align="center">
									<a href="index.php#peta"> Tampilkan Semua</button>
								</div>
								</td>
							</tr>
							</table>
							</div>
						</div>
					</div>
				</div> <!-- Row End -->
			</div> <!-- Container End --> 
		</div> <!-- section end -->

		

		<!-- section end -->
		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 id="info" class="title text-center"><span>Daftar Usaha</span> Kabupaten Bandung Barat</h1>
						<div class="space"></div>
						<div class="row">
							<div class="col-md-6">
								<!-- Content -->

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section translucent-bg bg-image-2 pb-clear">
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="daftar" class="title text-center">Pendaftaran Data Pengusaha</h1>
				<h3 class="text-center">Sebelum mendaftarkan usaha, terlebih dahulu daftarkan diri anda sebagai pengusaha. Kami akan mengecek validasi data anda terlebih dahulu sebelum anda dapat mendaftarkan usaha anda pada website kami.</h3>
				<div class="space"></div>
				<div class="row">
				<form method="POST" action="pengusaha_proses_tambah.php" enctype="multipart/form-data" class="form-horizontal">
	            <table align="center" width="50%">
	              <tr>
	                <td colspan=2>
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
	                        <textarea type="text" class="form-control" id="alamat" name="alamat"  placeholder="Alamat Tinggal"></textarea>
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
	                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon">
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
	                    <div class="form-group" align="center">
	                      <div class="col-sm-offset-2 col-sm-10">
	                        <button type="submit" class="btn btn-primary" id="Simpan">Simpan</button>
	                      </div>
	                    </div>
	                </td>
	              </tr>
	            </table>
	          </form>
			</div>				
		</div>
	</div>

		<!-- Section Login -->
		<div class="section">
		    <div class="container" data-animation-effect="fadeIn">
			    <h1 id="login" class="title text-center">Login Pengusaha</h1>
		        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		            <div style="padding-top:30px" class="panel-body" >
		            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
			            <form action="cek_login.php" id="loginform" class="form-horizontal" role="form" method="post">	
			            	<div style="margin-bottom: 25px" class="input-group">
			                	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			                    <input id="login-username" type="text" class="form-control" name="email" placeholder="Email" data-error="Bruh, that email address is invalid" required>                                        
			                </div>
			                <div style="margin-bottom: 25px" class="input-group">
			                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			                    <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
			                </div>
			                <div style="margin-top:10px" class="form-group">
			                <!-- Button -->
				                <div class="col-sm-12 controls">
				                	<button type="submit" class="btn btn-success" id="btn-login">Login</button>
				                </div>
			                </div>
			                <div class="form-group">
			                    <div class="col-md-12 control">
			                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
			                        	Lupa Password?  
			                            <a href="lupa_password.php">
			                                Klik Disini
			                            </a>
			                        </div>
			                    </div>
			                </div>    
			            </form>     
					</div>                     
		        </div>  
	        </div> <!-- End Container-->
        </div> <!-- End Section-->
                    
    

			

		<!-- footer start -->
		<!-- ================ -->
		<footer id="footer">

			<!-- .footer start -->
			<!-- ================ -->
			<div class="footer section translucent-bg bg-image-3 pb-clear">
				<div class="container">
					<h1 class="title text-center" id="kontak">Hubungi Kami</h1>
					<div class="space"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer-content">
								<p class="large">Apabila ada pertanyaan seputar website ini, dengan senang hati kami akan layani. Silahkan tulis pertanyaan anda pada form yang kami sediakan</p>
								<ul class="list-icons">
									<li><i class="fa fa-map-marker pr-10"></i> Jalan Dipatiukur, Coblong, Kota Bandung</li>
									<li><i class="fa fa-phone pr-10"></i> +62 812345678910</li>
									<li><i class="fa fa-envelope-o pr-10"></i> mail@sigbb.com</li>
								</ul>
								<ul class="social-links">
									<li class="facebook"><a target="_blank" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a target="_blank" href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
									<li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
									<li class="skype"><a target="_blank" href="http://www.skype.com"><i class="fa fa-skype"></i></a></li>
									<li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
									<li class="youtube"><a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube"></i></a></li>
									<li class="flickr"><a target="_blank" href="http://www.flickr.com"><i class="fa fa-flickr"></i></a></li>
									<li class="pinterest"><a target="_blank" href="http://www.pinterest.com"><i class="fa fa-pinterest"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="footer-content">
								<form role="form" id="footer-form">
									<div class="form-group has-feedback">
										<label class="sr-only" for="nama2">Nama</label>
										<input type="text" class="form-control" id="name2" placeholder="Nama" name="name2" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="email2">Alamat Email</label>
										<input type="email" class="form-control" id="email2" placeholder="Alamat Email" name="email2" required>
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="pesan2">Pesan atau Pertanyaan</label>
										<textarea class="form-control" rows="8" id="message2" placeholder="Pesan atau Pertanyaan" name="message2" required></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<input type="submit" value="Kirim" class="btn btn-default">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .footer end -->

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
		<script type="text/javascript" src="plugins/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-datepicker.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="plugins/jquery.appear.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>
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