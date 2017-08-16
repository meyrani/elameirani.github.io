<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='../index.php?page=home'><button>Silahkan Login</button></a></div>";  
}
else
{
include "../librari/koneksi.php";
$id_user = $_SESSION['id_user'];
	// Ambil data Analisa
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
?>

<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>Hasil Konsultasi</title>
  <script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print(){
window.open('lappengunjung.php','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
}
</script>
</head>
<body>
	<h3 class="text-center"> <?php echo $data['nm_kecerdasan'] ?> </h3>
	<table class="table table-striped">
    <thead>
      <tr>
        <th>Data Anak</th>
      </tr>
    </thead>
    <tbody>
       <tr><td width="250px">Nama </td>
       <td>: <?php echo $datap['Nama_anak'] ?></td></tr>
       <tr><td>Nama Orang Tua</td>
       <td>: <?php echo $datap['nama_ortu'] ?></td></tr>
       <tr><td>Pekerjaan Orang Tua</td>
       	<td>: <?php echo $datap['pekerjaan_ortu'] ?></td></tr>
       <tr><td>Jenis Kelamin</td>
       	<td>: <?php echo $kelamin ?></td></tr>
       <tr><td>Tanggal Lahir</td>
       	<td>: <?php echo $datap['tgl_lahir'] ?></td></tr>
       <tr><td>Alamat</td>
       <td>: <?php echo $datap['alamat'] ?></td></tr>
    </tbody>
  </table>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Hasil Analisa</th>
      </tr>
    </thead>
    <tbody>
       <tr><td width="250px">Jenis Kecerdasan </td>
       <td><?php echo $data['nm_kecerdasan'] ?></td></tr>
       <tr><td>Keterangan</td>
       <td><?php echo $data['definisi'] ?></td></tr>
       <tr><td>Riwayat Ciri Anak</td>
        <td>
       	<?php
       $sqlciri = "SELECT tb_ciri.*,tmp_ciri.* FROM tb_ciri,tmp_ciri
        WHERE tb_ciri.kd_ciri=tmp_ciri.kd_ciri
        AND tmp_ciri.id_user=$id_user ORDER BY tmp_ciri.id_user DESC";
    $qryciri = mysqli_query($koneksi, $sqlciri);
    $i=0;
    while ($hslciri = mysqli_fetch_array($qryciri)) {
      $i++;
      echo "$i. $hslciri[ciri] <br> ";
    }
       	?>
       </td></tr>
        <tr><td>Saran Sekolah</td>
       <td><?php echo $data['saran_sekolah'] ?></td></tr>
       <tr><td>Pilihan Karir</td>
       <td><?php echo $data['pilihan_karir'] ?></td></tr>
    </tbody>
  </table>	
  <center><a href="lappengunjung.php" target="output" class="btn btn-success btn-lg">
        <span class="glyphicon glyphicon-print"></span> Cetak
      </a>
	</div>

  
	
</body>
</html>
<?php } ?>