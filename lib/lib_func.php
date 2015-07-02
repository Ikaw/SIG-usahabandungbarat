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
  function parseToXML($htmlStr)
    {
        $xmlStr = str_replace('<', '<', $htmlStr);
        $xmlStr = str_replace('>', '>', $htmlStr);
        $xmlStr = str_replace('"', '"', $xmlStr);
        $xmlStr = str_replace("'", "'", $xmlStr);
        $xmlStr = str_replace('&', '&', $xmlStr);
        return $xmlStr;
    }
  function filter_map($kategori, $keyword)
    {
        koneksi_db();
        $query = "SELECT * FROM data_usaha WHERE id_$kategori = '$keyword' ";
        $result = mysql_query($query);
        if(!$result)
        {
            echo 'Error : '. mysql_error();
        }
        
        $file = fopen("filter_map.xml","wb");
        $xml = "";
        
        $xml .= fwrite($file, '<markers>');
        while($row = mysql_fetch_assoc($result))
        {
            $xml.=fwrite($file, '<marker ');
            $xml.=fwrite($file,'id_usaha = "'.parseToXML($row['id_usaha']). '" ');
            $xml.=fwrite($file, 'name = "'.parseToXML($row['nama_usaha']). '" ');
            $xml.=fwrite($file, 'lat = "'.parseToXML($row['lat']). '" ');
            $xml.=fwrite($file,'lng = "'.parseToXML($row['lng']). '" ');
            $xml.=fwrite($file,'address = "'.parseToXML($row['alamat_usaha']). '" ');
            $xml.=fwrite($file,'category = "'.parseToXML($row['keyword_sektor']). '" ');
            $xml.=fwrite($file,'/>');
        }
        $xml.=fwrite($file, '</markers>');
        fclose($file);
        header("Location: map_tampil_filter.php#peta");
    }
?>