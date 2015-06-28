<?php	
	function koneksi_db(){ 
    $host = "localhost"; 
    $database = "db_sigbb"; 
    $user = "root"; 
    $password = ""; 
    $link = mysql_connect($host,$user,$password); 
    mysql_select_db($database,$link); 
      if(!$link) 
        echo "Error :".mysql_error(); 
        return $link; 
  }
	$link = koneksi_db();
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "select * from pemilik_usaha where email='$email' and password='$password'";
	$res=mysql_query($sql,$link);
	if(mysql_num_rows($res)==1) // apabila username dan userpass benar
	{
		$data=mysql_fetch_array($res);
		session_start();
		$_SESSION['nama']=$data['nama']; // isi vareiabel nama
		$_SESSION['sudahlogin']=true; // variabel status sudah login
		header("Location:pemilik_usaha/index.php"); // pindah ke halaman index.php
	}
	else
	{
		header("Location:gagallogin.php"); // pindah ke halaman gagallogin.php
	}
?>