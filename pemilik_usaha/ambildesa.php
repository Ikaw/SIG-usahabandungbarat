<?php
mysql_connect("localhost","root","");
mysql_select_db("db_sigbb");
$kecamatan = $_GET['kecamatan'];
$desa = mysql_query("SELECT id_desa,nama_desa FROM desa WHERE id_kec='$kecamatan' order by nama_desa");
echo "<option>--Pilih Desa--</option>";
while($k = mysql_fetch_array($desa)){
    echo "<option value=\"".$k['id_desa']."\">".$k['nama_desa']."</option>\n";
}
?>
