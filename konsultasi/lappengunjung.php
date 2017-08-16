<?php
session_start();
$id_user = $_SESSION['id_user'];
//koneksi ke database
include "../librari/koneksi.php";
//mengambil data dari tabel
$sql = "SELECT tb_analisa.*, tb_kecerdasan.* FROM tb_analisa,tb_kecerdasan 
	WHERE tb_kecerdasan.kd_kecerdasan=tb_analisa.kd_kecerdasan AND tb_analisa.id_user=$id_user 
	ORDER BY tb_analisa.id_user=$id_user DESC LIMIT 1";
	$qry = mysqli_query($koneksi, $sql);
	$data = mysqli_fetch_array($qry);
	// Ambil data pengunjung
	$sql = "SELECT tb_analisa.*, tb_user.* FROM tb_analisa,tb_user
	WHERE tb_user.id_user=tb_analisa.id_user AND tb_analisa.id_user=$id_user 
	ORDER BY tb_analisa.id_user";
	$qry = mysqli_query($koneksi, $sql);
	$datap = mysqli_fetch_array($qry);
	//membuat jenis kelamin
	if ($datap['jenis_kelamin']=="P") {
		$kelamin = "Perempuan";
	} else { 
		$kelamin = "Laki-laki";
	}
	$anak= $datap['Nama_anak'];
echo "<html xmlns='http://www.w3.org/1999/xhtml'> 
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title> Laporan Hasil Analisa </title>
</head>
<body>";

echo "<h3 align='center'>Laporan Hasil Analisa Pengunjung</h3>"; 
echo " Tanggal Konsultasi : $datap[tgl_daftar] <br><br>
<table border='0'>
<b>Data Anak</b>

    <tr><td width='250px'>Nama </td>
       <td>: $datap[Nama_anak]</td></tr>
       <tr><td>Nama Orang Tua</td>
       <td>: $datap[nama_ortu]</td></tr>
       <tr><td>Pekerjaan Orang Tua</td>
       	<td>: $datap[pekerjaan_ortu] </td></tr>
       <tr><td>Jenis Kelamin</td>
       	<td>: $kelamin</td></tr>
       <tr><td>Tanggal Lahir</td>
       	<td>: $datap[tgl_lahir] </td></tr>
       <tr><td>Alamat</td>
       <td>: $datap[alamat] </td></tr>
</table>";

echo "<table border='1'>
<p align='center'><b>Data Analisa</b></p>

    <tr><td width='250px'>Jenis Kecerdasan </td>
       <td>$data[nm_kecerdasan] </td></tr>
       <tr><td>Keterangan</td>
       <td>$data[definisi]</td></tr>
       <tr><td>Riwayat Ciri Anak</td>
        <td>";

       $sqlciri = "SELECT tb_ciri.*,tmp_ciri.* FROM tb_ciri,tmp_ciri
        WHERE tb_ciri.kd_ciri=tmp_ciri.kd_ciri
        AND tmp_ciri.id_user=$id_user ORDER BY tmp_ciri.id_user DESC";
    $qryciri = mysqli_query($koneksi, $sqlciri);
    $i=0;
    while ($hslciri = mysqli_fetch_array($qryciri)) {
      $i++;
      echo "$i. $hslciri[ciri] <br> ";
    }
       	
       echo "</td></tr>
        <tr><td>Saran Sekolah</td>
       <td>$data[saran_sekolah] </td></tr>
       <tr><td>Pilihan Karir</td>
       <td> $data[pilihan_karir] </td></tr>
</table> <br><br>";
$tgl = date('d-m-Y');
echo "<p align ='right'> Medan, $tgl </p>";
?>
</body>
</html>
