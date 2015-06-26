<?php  
    //Sesuaikan username, password dan nama database
    $user="root";
    $password="";
    $database="db_sigbb";

    // Start XML file, create parent node
    $dom = new DOMDocument("1.0");
    $node = $dom->createElement("markers");
    $parnode = $dom->appendChild($node); 

    // Opens a connection to a MySQL server
    $connection=mysql_connect (localhost, $user, $password);
    if (!$connection) {  die('Not connected : ' . mysql_error());} 

    // Set the active MySQL database
    $db_selected = mysql_select_db($database, $connection);
    if (!$db_selected) {
      die ('Can\'t use db : ' . mysql_error());
    } 

    // Select all the rows in the markers table -> Sesuaikan tabel yang akan diambil datanya
    $query = "SELECT nama_usaha,alamat_usaha,lat,lng,id_sektor FROM data_usaha WHERE 1";
    $result = mysql_query($query);
    if (!$result) {  
      die('Invalid query: ' . mysql_error());
    } 

    header("Content-type: text/xml"); 

    // Iterate through the rows, adding XML nodes for each
    while ($row = @mysql_fetch_assoc($result)){  
      // ADD TO XML DOCUMENT NODE  
      $node = $dom->createElement("marker");  
      $newnode = $parnode->appendChild($node);   
      $newnode->setAttribute("name",$row['nama_usaha']);
      $newnode->setAttribute("address", $row['alamat_usaha']);  
      $newnode->setAttribute("lat", $row['lat']);  
      $newnode->setAttribute("lng", $row['lng']);
      $newnode->setAttribute("category", $row['id_sektor']);  
    } 

    echo $dom->saveXML();
?>