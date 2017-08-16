<?php
include "librari/koneksi.php";
	

		$username     	= $_POST['username'];
	    $password       = md5($_POST['password']);
	    $email	        = $_POST['email'];
	    $nama_anak		= $_POST['nama'];
	    $jenis_kelamin	= $_POST['jenis_kelamin'];
	    $tgl_lahir		= $_POST['tgl'];
	    $nama_ortu		= $_POST['nm_ortu'];
	    $alamat			= $_POST['alamat'];
	    $pekerjaan_ortu	= $_POST['pekerjaan_ortu'];
		$tgl_daftar=date('Y-d-m');



    $inputuser = "INSERT INTO tb_user SET username='$username',password='$password',email='$email',
    level='2',Nama_anak='$nama_anak', tgl_lahir='$tgl_lahir',nama_ortu='$nama_ortu', alamat='$alamat', tgl_daftar=$tgl_daftar, jenis_kelamin='$jenis_kelamin', pekerjaan_ortu='$pekerjaan_ortu'";
    $daftar =mysqli_query($koneksi, $inputuser);
    
    echo "Selamat anda telah berhasil melakukan pendaftaran dengan nama anak <b> $nama_anak </b> <br>
    	  Untuk memulai konsultasi silahkan login terlebih dahulu";
?>