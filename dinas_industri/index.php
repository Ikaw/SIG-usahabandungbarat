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

<div class="container" data-animation-effect="fadeIn">
          <h1 id="login" class="title text-center">Login Admin Dinas</h1>
            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                  <form action="cek_login.php" id="loginform" class="form-horizontal" role="form" method="post">  
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="login-username" type="text" class="form-control" name="nip" placeholder="N I P" data-error="Bruh, that email address is invalid" required>                                        
                      </div>
                      <div style="margin-bottom: 25px" class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                          <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div style="margin-top:10px" class="form-group">
                      <!-- Button -->
                        <div class="col-sm-12 controls" align="center">
                          <button type="submit" class="btn btn-success" id="btn-login">Login</button>
                        </div>
                      </div>

                  </form>     
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
