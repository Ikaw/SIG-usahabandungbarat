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
?>