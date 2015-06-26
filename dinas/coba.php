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
    <link rel="stylesheet" type="text/css" href="css/css.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
<div class="container-fluid header">
  <?php header_web();?>
</div>
<div class="container-fluid">
  <div class="row show-grid">
    <div class="col-md-4 col-md-offset-4" align="center">
      <div class="mylogin header">
        <h2>GIS - LOGIN</h2>
      </div>
    </div>
  </div>
  <div class="row show-grid">
    <div class="col-md-4 col-md-offset-4" align="center">
      <div class="mylogin">
        <div class="form-group">
          <div class="col-md-8 col-md-offset-2">
            <h3>Username</h3>
          </div>
          <div class="col-md-8 col-md-offset-2">
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-8 col-md-offset-2">
            <h3>Password</h3>
          </div>
          <div class="col-md-8 col-md-offset-2">
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Password">
          </div>
        </div>
        <div class="form-group" align="center">
          <div class="col-md-offset-2 col-md-8">
            <br><br>
            <button type="submit" class="btn btn-primary" id="Login">Login</button>
            <a href="#"><p>Lupa Password</p></a>
          </div>
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
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
