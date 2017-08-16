<?php 
	include "../../librari/koneksi.php";
	$page		= $_GET['page'];
	$olah		= $_GET['olah'];

	if ($page=='kecerdasan' AND $olah=='input'){	
    $kode_kecerdasan     = $_POST['kd_kecerdasan'];
    $nama_kecerdasan     = $_POST['nm_kecerdasan'];
    $definisi            = $_POST['definisi'];
    $saran_sekolah       = $_POST['saran_sekolah'];
    $pilihan_karir       = $_POST['pilihan_karir'];
       
    $input = "INSERT INTO tb_kecerdasan(kd_kecerdasan,nm_kecerdasan,definisi,saran_sekolah,pilihan_karir) 
    VALUES ('$kd_kecerdasan ','$nm_kecerdasan','$definisi','$saran_sekolah','$pilihan_karir')";
    mysqli_query($koneksi, $input);
   	header("location:../home.php?page=kecerdasan");
  	}

  	elseif ($page=='kecerdasan' AND $olah=='edit'){	
    $kode_kecerdasan     = $_POST['kd_kecerdasan'];
    $nama_kecerdasan     = $_POST['nm_kecerdasan'];
    $definisi            = $_POST['definisi'];
    $saran_sekolah       = $_POST['saran_sekolah'];
    $pilihan_karir       = $_POST['pilihan_karir'];
       
    $input ="UPDATE tb_kecerdasan SET kd_kecerdasan = '$kode_kecerdasan',nm_kecerdasan='$nama_kecerdasan',definisi='$definisi'
    ,saran_sekolah='$saran_sekolah',pilihan_karir='$pilihan_karir' WHERE kd_kecerdasan='$kode_kecerdasan'";
    mysqli_query($koneksi, $input);
   	header("location:../home.php?page=kecerdasan");
 	  }

  	elseif($page=='kecerdasan' AND $olah=='hapus'){	
  		mysqli_query($koneksi,"DELETE FROM tb_kecerdasan WHERE kd_kecerdasan='$_GET[id]'");
  		header("location:../home.php?page=kecerdasan");
  	}
 ?>
