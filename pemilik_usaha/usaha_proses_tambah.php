<?php 
include("lib_func.php");

		
	                  $link             = koneksi_db();
	                  $nama_usaha       = $_POST['nama_usaha'];
	                  $produk_utama     = $_POST['produk_utama'];
	                  $deskripsi_usaha  = $_POST['deskripsi_usaha'];
	                  $skala            = $_POST['skala'];
	                  $id_sektor        = $_POST['id_sektor'];
	                  $alamat           = $_POST['address'];
	                  $id_kec           = $_POST['kecamatan'];
	                  $id_desa          = $_POST['desa'];
	                  $lat              = $_POST['Lat'];
	                  $lng              = $_POST['Lng'];
	                  $no_ktp           = $_POST['no_ktp'];

	                    $sql = "INSERT INTO data_usaha(nama_usaha, produk_utama, alamat_usaha, deskripsi_usaha, lat, lng, id_kec, id_desa, id_sektor, skala,no_ktp) 
	                    VALUES
	                    ('$nama_usaha','$produk_utama','$alamat','$deskripsi_usaha','$lat','$lng','$id_kec','$id_desa','$id_sektor','$skala','$no_ktp')";
	                    $result = mysql_query($sql, $link);
	                    
	                    $id_usaha = mysql_insert_id();
	                    $sql2 = "INSERT INTO notifikasi(tipe, id_lain, waktu) VALUES
	                            ('usaha','$id_usaha', now())";
	                    $res = mysql_query($sql2, $link);
	                 
	                 if ($result) {
	                 	header("Location:../pemilik_usaha/usaha_tambah_berhasil.php?no_ktp='$no_ktp'");
	                 } else { 
	                 	header("Location:../pemilik_usaha/usaha_tambah_gagal.php");
	                 }?>
	            
			      