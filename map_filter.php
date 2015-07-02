<?php
	include("lib/lib_func.php");
	$kategori = $_GET['kategori'];
	$keyword = $_GET['keyword'];
	filter_map($kategori, $keyword);	
?>