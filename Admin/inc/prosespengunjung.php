<?php 
	include "../../librari/koneksi.php";
	$page		= $_GET['page'];
	$olah		= $_GET['olah'];

	if ($page=='ciri' AND $olah=='input'){	
  ($page=='pengunjung' AND $olah=='hapus'){	
  		mysqli_query($koneksi,"DELETE FROM tb_ciri WHERE kd_ciri='$_GET[id]'");
  		header("location:../home.php?page=penggguna");
  	}
 ?>
