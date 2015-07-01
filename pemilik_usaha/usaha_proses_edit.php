
    <?php include("lib_func.php"); 
                  
                  $link = koneksi_db();
                  $id_usaha        = $_POST['id_usaha'];
                  $nama_usaha      = $_POST['nama_usaha'];
                  $produk_utama    = $_POST['produk_utama'];
                  $deskripsi_usaha = $_POST['deskripsi_usaha'];
                  $skala           = $_POST['skala'];
                  $id_sektor       = $_POST['id_sektor'];
                  $alamat          = $_POST['address'];
                  $id_kec          = $_POST['kecamatan'];
                  $id_desa         = $_POST['desa'];
                  $lat             = $_POST['Lat'];
                  $lng             = $_POST['Lng'];
                  $no_ktp          = $_POST['no_ktp'];
                
                    $sql = "UPDATE data_usaha SET nama_usaha='$nama_usaha', produk_utama='$produk_utama', alamat_usaha='$alamat',
                            deskripsi_usaha='$deskripsi_usaha', lat='$lat', lng='$lng', id_kec='$id_kec', id_desa='$id_desa',
                            id_sektor='$id_sektor', skala='$skala' WHERE id_usaha='$id_usaha';";
                    $result = mysql_query($sql, $link);
                    if ($result) {
                      header("Location:../pemilik_usaha/usaha_edit_berhasil.php");
                    }
                    else {
                      header("Location:../pemilik_usaha/usaha_edit_gagal.php");
                    }
                  ?>
                