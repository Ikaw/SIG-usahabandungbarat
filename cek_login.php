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
	$email = $_GET['email'];
	$password = $_GET['password'];
	$sql = "select * from pemilik_usaha where email='$email' and password='$password'";
	$res=mysql_query($sql,$link);
	if(mysql_num_rows($res)==1) // apabila username dan userpass benar
	{
		header("Location:pemilik_usaha/index.php"); // pindah ke halaman index.php
	}
	else
	{
		echo "Gagal Login";
		//header("Location:gagallogin.php"); // pindah ke halaman gagallogin.php
	}
?>