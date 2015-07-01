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
				  	  <div class="alert alert-success" role="alert">
	                    <strong>Perubahan Data Usaha Sudah Tersimpan !! </strong><br><br>
	                     
	                      	<a href="../pemilik_usaha/index.php">
                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Tambah">
                            	<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>  Kembali ke Beranda
                            </button>
                        	</a>
	                      </div>
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