<?php
	include("lib/lib_func.php");

	$response = new stdClass();
	$response->label = array();
	$response->data = array();
	$link = koneksi_db();
	$sql = "
		select a.*,b.nama_sektor from 
		(SELECT id_sektor, COUNT(id_sektor) as jml FROM data_usaha group by id_sektor) as a
		inner join sektor_usaha b on a.id_sektor = b.id_sektor
	";
	$res=mysql_query($sql,$link);
	if(mysql_num_rows($res)>0){

		while($data=mysql_fetch_assoc($res)){
			$response->label[]=$data["nama_sektor"];
			$response->data[]=(int) $data["jml"];
		}
	}
	header("Content-Type: application/json");
	echo json_encode($response);
?>