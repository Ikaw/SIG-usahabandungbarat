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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
    <table width="100%" align="center" border=0> 
      <tr>
        <td colspan=2 align="center" >
          <?php header_web();?>
        </td>
      </tr>
      <tr> 
        <td width="250px" valign="top">
          <?php menu();?>
        </td> 
        <td valign="top"> 
          <!-- MULAI KODING DISINI -->
          <?php       
            $link = koneksi_db();
            $nama_usaha = $_POST['nama_usaha'];
            $produk_utama = $_POST['produk_utama'];
            $deskripsi_usaha = $_POST['deskripsi_usaha'];
            $skala = $_POST['skala'];
            $id_sektor = $_POST['id_sektor'];
            $alamat = $_POST['alamat'];
            $id_kec = $_POST['kecamatan'];
            $id_desa = $_POST['desa'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];


              $sql = "INSERT INTO data_usaha (nama_usaha, produk_utama, alamat_usaha, deskripsi_usaha, lat, lng, id_kec, id_desa, id_sektor, skala) 
              VALUES
              ('$nama_usaha','$produk_utama','$alamat','$deskripsi_usaha','$lat','$lng','$id_kec','$id_desa','$id_sektor','$skala')";
              $result = mysql_query($sql, $link);
              if ($result) {
                echo "Data Berhasil disimpan";
              }
              else {
                echo "Gagal Broh !!!";
              }
            ?>
        </td> 
      </tr>
      <tr>
        <td colspan=2>
          <?php footer_web();?>
        </td>
      </tr>
    </table>

<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
