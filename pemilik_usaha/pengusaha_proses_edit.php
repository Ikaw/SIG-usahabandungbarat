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
    <table width="100%" align="center" border=0 > 
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
          if($_FILES['foto_ktp']['error']==0){
            $link = koneksi_db();
            $nama = $_POST['nama'];
            $no_ktp = $_POST['no_ktp'];
            $alamat = $_POST['alamat'];
            $tpt_lahir = $_POST['tpt_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $foto_ktp = $_FILES['foto_ktp']['name'];
            $no_telp = $_POST['no_telp'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $namafilebaru="../pengusaha/gambar/".$foto_ktp;
            if(move_uploaded_file($_FILES['foto_ktp']['tmp_name'], $namafilebaru)==true)
            {
              $sql = "UPDATE pemilik_usaha SET nama='$nama', alamat='$alamat', tpt_lahir='$tpt_lahir', tgl_lahir='$tgl_lahir', foto_ktp='$foto_ktp',
			  		  no_telp='$no_telp', email='$email', password='$password' WHERE no_ktp='$no_ktp'";
              $result = mysql_query($sql, $link);
              if ($result) {
                echo "Data Berhasil dirubah";
              }
              else {
                echo "Gagal Broh !!!";
              }
            }
          }
          else {
            echo "Perubahan data pengusaha gagal karena upload file gambar gagal";
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
