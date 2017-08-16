<?php 
	include "../../librari/koneksi.php";
	$page		= $_GET['page'];
	$olah		= $_GET['olah'];

	if ($page=='artikel' AND $olah=='input'){	
    $id_artikel        = $_POST['id_artikel']
    $judul_artikel     = $_POST['judul_artikel'];
    $isi_artikel       = $_POST['isi_artikel'];
   
    $input = "INSERT INTO tb_artikel (id_artikel,judul_artikel,isi_artikel) VALUES ('$id_artikel ','$judul_artikel','$isi_artikel')";
    mysqli_query($koneksi, $input);
   	header("location:../home.php?page=artikel");
  	}

  	elseif ($page=='artikel' AND $olah=='edit'){	
    $id_artikel        = $_POST['id_artikel']
    $judul_artikel     = $_POST['judul_artikel'];
    $isi_artikel       = $_POST['isi_artikel'];
       
    $input ="UPDATE tb_artikel SET judul_artikel = '$judul_artikel',isi_artikel='$isi_artikel' WHERE id_artikel='$id'";
    mysqli_query($koneksi, $input);
   	header("location:../home.php?page=artikel");
 	  }

  	elseif($page=='artikel' AND $olah=='hapus'){	
  		mysqli_query($koneksi,"DELETE FROM tb_artikel WHERE id_artikel='$_GET[id]'");
  		header("location:../home.php?page=artikel");
  	}
 ?>
