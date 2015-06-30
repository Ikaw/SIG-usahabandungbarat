<?php
  include("lib/lib_func.php");

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
            $namafilebaru=getcwd()."/dinas_industri/gambar/".$foto_ktp;       
            if(move_uploaded_file($_FILES['foto_ktp']['tmp_name'],$namafilebaru)==true)
            {
              $sql = "INSERT INTO pemilik_usaha(nama, no_ktp, alamat, tpt_lahir, tgl_lahir, foto_ktp, no_telp, email, password) 
              VALUES
              ('$nama','$no_ktp','$alamat','$tpt_lahir','$tgl_lahir','$foto_ktp','$no_telp','$email','$password')";
              $result = mysql_query($sql,$link);
              if ($result) {
                //select
                $sql2 = "select nama,email from pemilik_usaha where email='$email' and nama='$nama'";
                $res=mysql_query($sql2,$link);
                if(mysql_num_rows($res)==1) // apabila username dan userpass benar
                {
                  $data=mysql_fetch_array($res);
                  session_start();
                  $_SESSION['nama']=$data['nama']; // isi variabel email
                  $_SESSION['email']=$data['email']; // isi variabel email
                  header("Location:pengusaha_tambah_berhasil.php");}
              }
              else {
                header("Location:pengusaha_tambah_gagal.php");
              }
            }
          }
          else {
            header("Location:pengusaha_tambah_gagal.php");
          }
          
?>