<?php
session_start();
include("lib/lib_func.php");
$link = koneksi_db();
$no_ktp = $_GET["no_ktp"];
$sql2 = "select nama,email from pemilik_usaha where no_ktp='$no_ktp' ";
$res=mysql_query($sql2,$link);
$data=array();
if(mysql_num_rows($res)==1) $data=mysql_fetch_array($res);
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
	<body class="no-trans">

		<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 id="about" class="title text-center">Website <span>SIG</span> Potensi Usaha Kabupaten Bandung Barat</h1>
						<p class="lead text-center">Terimakasih Telah Melakukan Pendaftaran</p>
						<div class="space"></div>
						<div class="row">
							<div class="col-md-3">
								<img src="images/success.jpeg" alt="">
								<div class="space"></div>
							</div>
							<div class="col-md-6">
								<p>Selamat datang <strong><?php 
									echo $data['nama'];

								?></strong> data anda terdaftar dengan email<strong> <?php echo $data['email'];?> </strong>.</p>
								<p>Kami telah mengirimkan pemberitahuan untuk memastikan email yang anda masukkan benar. Silahkan Cek Email anda ! (termasuk di folder Spam)</p>
								<p>Petugas kami akan mengecek validasi antara data yang diinputkan dengan data yang tertera pada file KTP yang telah anda Upload untuk dilakukan aktivasi user.</p>
								<p>Apabila dalam waktu 2x24 jam akun anda belum teraktivasi dan belum dapat melakukan login hubungi kami pada link dibawah ini.</p> 
								<ul class="list-unstyled">
									<li><i class="fa fa-caret-right pr-10 text-colored"></i><a href="index.php#kontak"> Hubungi Kami</a></li>
									<li><i class="fa fa-caret-right pr-10 text-colored"></i><a href="index.php"> Kembali Ke Beranda</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!-- Footer-->
		<footer id="footer">
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
	<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
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
	</body>
</html>