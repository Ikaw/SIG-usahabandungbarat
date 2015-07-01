<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("lib_func.php"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

    <!-- Bootstrap -->
    <link href="../dinas_industri/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../dinas_industri/css/css.css">

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
      <?php menu_admin(); ?>
      <div class="col-md-9">
        <div class="row show-grid">
          <div class="col-md-5">
              <!-- Button trigger modal -->
                <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"> Tambah Data</span>
                </button>
                <!-- Modal<span class="glyphicon glyphicon-search" aria-hidden="true"></span> -->
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <?php tambah_gambar();?>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
          </div>
          <div class="col-md-7">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Pencarian...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>   Cari</button>
              </span>
            </div>
          </div>
        </div>
        <div class="row show-grid">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <h3 class="text-center">Data Galeri</h3>
                <div class="table-responsive">
                  <?php
                  $link = koneksi_db();
                  if(isset($_FILES['files'])){
                    $errors= array();
                    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
                      $file_name = $key.$_FILES['files']['name'][$key];
                      $file_size =$_FILES['files']['size'][$key];
                      $file_tmp =$_FILES['files']['tmp_name'][$key];
                      $file_type=$_FILES['files']['type'][$key];
                      $id_usaha = $_POST['id_usaha']; 
                      if($file_size > 2097152){
                        $errors[]='File size must be less than 2 MB';
                      }   
                      
                      $query="INSERT into galeri (id_usaha,nama_gambar,ukuran_gambar,tipe_gambar) VALUES('$id_usaha','$file_name','$file_size','$file_type'); ";
                      
                      $desired_dir="user_data";
                      
                      if(empty($errors)==true){
                        if(is_dir($desired_dir)==false){
                          mkdir("$desired_dir", 0700);    // Create directory if it does not exist
                        }
                        if(is_dir("$desired_dir/".$file_name)==false){
                          move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
                        }else{                  // rename the file if another one exist
                          $new_dir="$desired_dir/".$file_name.time();
                          rename($file_tmp,$new_dir) ;       
                        }
                       
                        mysql_query($query,$link);     
                      }else{
                        print_r($errors);
                      }
                    }
                    if(empty($error)){
                      echo "Success";
                    }
                  }
                  ?>
                </div>
              </div>
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
    <script src="../dinas_industri/js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../dinas_industri/js/bootstrap.min.js"></script>
  
</body>
</html>
