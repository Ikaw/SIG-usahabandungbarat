<?php 
$base_url = 'http://'.$_SERVER['HTTP_HOST'].'/SIG-Potensi-Usaha/';

isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'home_index';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

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
		<li class="dropdown pull-right"><a href="#.php"><span class="glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
	</ul>
<?php } 

function footer_web()
{ ?> 
  <div class="panel-footer" align="center">
    <h4><small><a>Developed By&nbsp;</a> Kelompok 4 Aplikasi Teknologi Online Universitas Komputer Indonesia&nbsp; &nbsp;</small></h4>
  </div>
<?php } ?>

<?php
function menu(){ ?>
<div class="list-group" align="center">
  <h3>..........</h3>
  <a href="pengusaha_view.php" class="list-group-item">Data Diri</a>
  <a href="usaha_view.php" class="list-group-item">Data Usaha</a>
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
}?>

<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
