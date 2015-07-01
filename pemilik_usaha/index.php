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
		<!-- Begin Maps -->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAqhJ6sg9DMHKhLvWrzUs96NDMemaDXriw&sensor
    =false"></script>
    
		<style>
	      #map {
	      width: auto;
	      height: 600px;
	      }
	    </style>
	    <!-- Custom Icon di Folder images/icons-->
	    <script type="text/javascript" src="../js/customicon.js"></script>

	    
		<!-- Load Maps -->
		<script type="text/javascript">
		//<![CDATA[
	        function load() { //meload map
	          var map = new google.maps.Map(document.getElementById("map"), {
	            center: new google.maps.LatLng(-6.913785, 107.407542),
	            zoom: 12, //tingkat zoom map, sesuaikan kebutuhan
	            mapTypeId: 'roadmap'
	          });
	          var infoWindow = new google.maps.InfoWindow;

	          // download XML dokumen
	          downloadUrl("../tampilmarker.php", function(data) {
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
	        }

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
	        
	        //]]>
	      </script>
    	<!-- End Maps-->
    

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
												<li class="active"><a href="#banner">Home</a></li>
												
												<li><a href="#peta">Peta</a></li>
												<li><a href="#usaha">Usaha Anda</a></li>
												<li><a href="#datadiri">Data Anda</a></li>
												<li><a href="#galeri">Galeri</a></li>
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

		<!-- banner start -->
		<!-- ================ -->
		<div id="banner" class="banner">
			<div class="banner-image"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 object-non-visible" data-animation-effect="fadeIn">
							<h1 class="text-center">Selamat Datang<span> <?php tampil_nama();?></span></h1>
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
		<div class="section translucent-bg bg-image-1 blue">
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="peta"  class="text-center title">Peta Data Usaha</h1>
				<div class="space"></div>
				<div class="row">
					<div id="map"></div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 id="usaha" class="title text-center">Usaha <span>ANDA</span>
						<div class="space"></div>
						<a href="usaha_form_tambah.php">
                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Tambah">
                            	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  DAFTAR USAHA BARU
                            </button>
                        </a>
						</h1>
						<div class="space"></div>
						<?php tampil_usaha();?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section translucent-bg bg-image-1">
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="datadiri"  class="text-center title">Data Anda</h1>
				<div class="space"></div>
				
					<?php tampil_datadiri();?>
				
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section">
			<div class="container">
				<h1 class="text-center title" id="galeri">Galeri <span>Usaha</span></h1>
				<div class="separator"></div>
				<br>
				<div class="text-center">
					<a href="galeri_form_tambah.php">
	                  <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Tambah">
	                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  TAMBAH GAMBAR
	                  </button>
	                </a>
				</div>
				<div class="space"></div>			
				<div class="row object-non-visible" data-animation-effect="fadeIn">
					<div class="col-md-12">

						<!-- isotope filters start -->
						<div class="filters text-center">
							<ul class="nav nav-pills">
								<li class="active"><a href="#" data-filter="*">All</a></li>
								<?php filter_gambar();?>
							</ul>
						</div>
						
						<!-- isotope filters end -->

						<!-- portfolio items start -->
						<div class="isotope-container row grid-space-20">
							<?php galeri();?>
						</div>
						<!-- portfolio items end -->
					
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->             
   
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