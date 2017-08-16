<?php 
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='http://localhost/Pakar_kecerdasan/index.php?page=home'><button>Silahkan Login</button></a></div>";  
}

else{
	$proses = "inc/prosesrelasi.php";

	$olah = @$_GET['olah'] ? $_GET['olah'] : ''; 

	switch($olah){

    default:
	echo "<h3>Halaman Kecerdasan</h3>";
	echo "<p><input type='button' class='btn btn-primary' value='Tambah Kecerdasan' onclick=window.location.href='?page=kecerdasan&olah=tambahkecerdasan'></p>";
	$data = array(); //variabel data adalah array 0
	$query="SELECT * FROM tb_relasi ORDER BY kd_kecerdasan";
	$tampil = mysqli_query($koneksi, $query);
	  echo "<div class='table-responsive'>
		  	<table class='table table-striped table-bordered'>
	          <thead>
	          <tr>
			  <th>No</th>
			  <th>Kode Kecerdasan</th>
			  <th>Jenis Kecerdasan</th>		 
			  <th>Aksi</th>
			  </tr>
	          </thead>
	            <tbody>"; 
	            $no = 1;

	while ($r = mysql_fetch_array($tampil)){ // data akan di ulang
    $data[]=$r['kd_ciri'];
  }
