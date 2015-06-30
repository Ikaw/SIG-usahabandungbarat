<?php
	include("lib/lib_func.php");	
	$link = koneksi_db();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "select * from pemilik_usaha where email='$email' and password='$password' and aktivasi='active'";
	$res=mysql_query($sql,$link);
	if(mysql_num_rows($res)==1) // apabila username dan userpass benar
	{
		$data=mysql_fetch_array($res);
		session_start();
		$_SESSION['no_ktp']=$data['no_ktp']; // isi vareiabel nama
		$_SESSION['sudahlogin']=true; // variabel status sudah login
		header("Location:pemilik_usaha/index.php"); // pindah ke halaman index.php
	}
	else
	{
		header("Location:gagallogin.php"); // pindah ke halaman gagallogin.php
	}
?>