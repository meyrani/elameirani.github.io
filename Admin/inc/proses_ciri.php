<?php 
	include "../../librari/koneksi.php";
	$page		= $_GET['page'];
	$olah		= $_GET['olah'];

	if ($page=='ciri' AND $olah=='input'){	
    $kd_ciri     = $_POST['kd_ciri'];
    $ciri        = $_POST['ciri'];
   
    $input = "INSERT INTO tb_ciri(kd_ciri,ciri) VALUES ('$kd_ciri ','$ciri')";
    mysqli_query($koneksi, $input);
   	header("location:../home.php?page=ciri");
  	}

  	elseif ($page=='ciri' AND $olah=='edit'){	
    $kd_ciri     = $_POST['kd_ciri'];
    $ciri        = $_POST['ciri'];
       
    $input ="UPDATE tb_ciri SET kd_ciri = '$kd_ciri',ciri='$ciri'WHERE kd_ciri='$kd_ciri'";
    mysqli_query($koneksi, $input);
   	header("location:../home.php?page=ciri");
 	  }

  	elseif($page=='kecerdasan' AND $olah=='hapus'){	
  		mysqli_query($koneksi,"DELETE FROM tb_ciri WHERE kd_ciri='$_GET[id]'");
  		header("location:../home.php?page=ciri");
  	}
 ?>
