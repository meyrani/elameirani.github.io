<?php 
session_start();

	include "../librari/koneksi.php";
	$page		= $_GET['page'];
	$olah		= $_GET['olah'];
	$id_user    = $_SESSION['id_user'];

		if ($page=='konsultasi' AND $olah=='konsulcek'){	
		//simpan ciri yg dipilih kedalam tmp_ciri
		$jumlah =count($_POST["cekciri"]);
		for($x=0;$x<$jumlah;$x++){
			$kd_ciri=$_POST["cekciri"][$x];
			$input="INSERT INTO tmp_ciri VALUES ('$id_user','$kd_ciri')";
			mysqli_query($koneksi, $input);
		}
		if ($input){
		   echo"Data Berhasil disimpan";
		  }
		  else
		  {
		   echo"Data Gagal Disimpan";
		  }
		//masukkan sumua data yang ambil semua data yang terdapat ditabel tb_relasi 
		//yang kode cirinya terdapat di tabel tmp_ciri masukkan kedlm tmp_analisa
	$tampilrelasi = $sql="INSERT INTO tmp_analisa SELECT tmp_ciri.id_user, tb_relasi.* FROM tmp_ciri,tb_relasi WHERE tmp_ciri.kd_ciri=tb_relasi.kd_ciri 
 					AND tmp_ciri.id_user=$id_user";
	mysqli_query($koneksi,$tampilrelasi);

	 //tampilkan data terbanyak tmp_analisa berdasarkan field kd_kecerdasan
		$sqlanalisa= "SELECT kd_kecerdasan, COUNT(kd_kecerdasan) AS num FROM tmp_analisa GROUP BY kd_kecerdasan
		ORDER BY num DESC LIMIT 1";
		$proses = mysqli_query($koneksi,$sqlanalisa);
				while ($hasil=mysqli_fetch_array($proses)){
					$jumlah=$hasil['num'];
					$kd_kecerdasan=$hasil['kd_kecerdasan'];
					echo "jumlah = $jumlah <br>";
					echo "kode kecerdasan adalah :$kd_kecerdasan";
				}
					
		// menginput kd_kecerdasan ke tb_analisa
		$sqlhasil = "INSERT INTO tb_analisa VALUES ('$id_user','$kd_kecerdasan')";
		mysqli_query($koneksi, $sqlhasil);	
		header("location:home.php?page=hasil");
		
 	  }	
		

?>	