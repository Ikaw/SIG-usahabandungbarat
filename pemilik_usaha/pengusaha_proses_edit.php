<?php
include("lib_func.php");
          $link = koneksi_db();
          
          $no_ktp    = $_POST['no_ktp'];
          $nama      = $_POST['nama'];
          $alamat    = $_POST['alamat'];
          $tpt_lahir = $_POST['tpt_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $no_telp   = $_POST['no_telp'];
          $email     = $_POST['email'];
          $password  = $_POST['password'];
          
          $sql = "UPDATE pemilik_usaha SET nama='$nama', alamat='$alamat', tpt_lahir='$tpt_lahir', tgl_lahir='$tgl_lahir',
                  no_telp='$no_telp', email='$email', password='$password' WHERE no_ktp='$no_ktp';";
          $result = mysql_query($sql, $link);
          if ($result) {
            header("Location:../pemilik_usaha/index.php");
          }
          else {
            header("Location:../pemilik_usaha/pengusaha_edit_gagal.php");
          }
                       
        ?>