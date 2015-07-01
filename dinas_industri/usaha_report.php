<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("lib_func.php"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

    <!-- Report -->
    <script type="text/javascript" src="../jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../jquery/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-ui.min.css">
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
  <script type="text/javascript">
    $(document).ready(function(e) {
      
      $("#desa").hide();
      $("#sektor_usaha").hide();
      $("#kecamatan").hide();
    
      var keyword = "";
      var kategori = "";
    
      $("#kategori").change(function(){
        $("#kategori option:selected").each(function() {
          if($(this).attr("value")=="Kecamatan")
          {
            $("#desa").hide();
            $("#sektor_usaha").hide();
            $("#kecamatan").show();
          }
          if($(this).attr("value")=="Semua Data")
          {
            $("#desa").hide();
            $("#sektor_usaha").hide();
            $("#kecamatan").hide();
          }
          if($(this).attr("value")=="Desa")
          {
            $("#kecamatan").hide();
            $("#sektor_usaha").hide();
            $("#desa").show();
          }
          if($(this).attr("value")=="Sektor Usaha")
          {
            $("#kecamatan").hide();
            $("#sektor_usaha").show();
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
        if($("#sektor_usaha").is(":visible"))
        {
          kategori = "sektor_usaha";
          keyword = $("#sektor_usaha").val();
        }
        window.location = "usaha_report_proses.php?kategori="+kategori+"&keyword="+keyword;
      });
    }); 
  </script>
<body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
  <div class="container-fluid header">
    <?php header_web();?>
  </div>
  <div class="container-fluid">
    <div class="row show-grid">
      <div class="col-md-3">
      <div class="list-group" align="center">
        <h4><b><a href="dashboard.php" class="list-group-item"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>  DASHBOARD</a></b></h4>
        <a href="pengusaha_view.php" class="list-group-item ">Data Pengusaha</a>
        <a href="sektor_view.php" class="list-group-item ">Data Sektor Usaha</a>
        <a href="kecamatan_view.php" class="list-group-item">Data Kecamatan</a>
        <a href="desa_view.php" class="list-group-item">Data Desa</a>
        <a href="usaha_view.php" class="list-group-item active">Data Usaha</a>
        <a href="galeri_view.php" class="list-group-item">Data Galeri</a>
        <a href="logout.php" class="list-group-item"><font color="blue"><b>LOGOUT</b></font></a>
      </div>
      </div>
      <div class="col-md-9">
        <div class="row show-grid">
        </div>
        <div class="row show-grid">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <h3 class="text-center">Laporan Data Usaha</h3>
                <h4 class="text-left">Filter Laporan Data Usaha Berdasarkan:</h4>
                <div class="table-responsive">
                  <select name="kategori" id="kategori">
                    <option value="Semua Data">Semua Data</option>
                    <option value="Kecamatan">Kecamatan</option>
                    <option value="Desa">Desa</option>
                    <option value="Sektor Usaha">Sektor Usaha</option>
                  </select>
                  <br>
                  <select name="desa" id="desa">
                    <?php
                      $link = koneksi_db();
                      $sql = "SELECT id_desa, nama_desa FROM desa ORDER BY nama_desa";
                      $result = mysql_query($sql, $link);
                      if(!$result)
                      {
                        echo 'Error : '.mysql_error();
                      }
                      while($data = mysql_fetch_array($result))
                      {
                        ?>
                          <option value="<?=$data['id_desa']?>"><?=$data['nama_desa']?></option>
                        <?php
                      }
                    ?>
                  </select>
                  <select name="kec" id="kecamatan">
                    <?php
                      $link = koneksi_db();
                      $sql = "SELECT id_kec, nama_kec FROM kecamatan ORDER BY nama_kec";
                      $result = mysql_query($sql, $link);
                      if(!$result)
                      {
                        echo 'Error : '.mysql_error();
                      }
                      while($data = mysql_fetch_array($result))
                      {
                        ?>
                          <option value="<?=$data['id_kec']?>"><?=$data['nama_kec']?></option>
                        <?php
                      }
                    ?>
                  </select>
                  <select name="sektor_usaha" id="sektor_usaha">
                    <?php
                      $link = koneksi_db();
                      $sql = "SELECT id_sektor, nama_sektor FROM sektor_usaha ORDER BY nama_sektor";
                      $result = mysql_query($sql, $link);
                      if(!$result)
                      {
                        echo 'Error : '.mysql_error();
                      }
                      while($data = mysql_fetch_array($result))
                      {
                        ?>
                          <option value="<?=$data['id_sektor']?>"><?=$data['nama_sektor']?></option>
                        <?php
                      }
                    ?>
                  </select>  
                </div>
                <br><br>
                <div align="right">
                    <button class="btn btn-primary btn-md" id="filter_map">
                      <span class="glyphicon glyphicon-filter" aria-hidden="true">  Filter Laporan</span>
                    </button>
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
    <script>
        
            $(document).ready(function(){

            $('#modal-konfirmasi').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
            var id_usaha = div.data('id')
            //var nama_kec = div.data('id')

            var modal = $(this)

            // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
            modal.find('#hapus-true').attr("href","usaha_hapus.php?id_usaha="+id_usaha);

            })

            });

        
    </script>
  
</body>
</html>
