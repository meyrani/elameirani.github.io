<?php
session_start();
$id_user = $_SESSION['id_user'];
//koneksi ke database
include "../../librari/koneksi.php";
//mengambil data dari tabel
 $query="SELECT tb_kecerdasan.*,tb_analisa.*,tb_user.* FROM tb_kecerdasan,tb_analisa,tb_user 
  WHERE tb_kecerdasan.kd_kecerdasan=tb_analisa.kd_kecerdasan AND tb_user.id_user=tb_analisa.id_user ";
  $tampil = mysqli_query($koneksi, $query);
echo "<html xmlns='http://www.w3.org/1999/xhtml'> 
<head>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
<title> Laporan Hasil Analisa </title>
</head>
<body>";
 echo "
    <p align='center'><b>Laporan Hasil Analisa Pakar</b></p>
        <td><table border='1'>
          <thead>
          <tr>
      <th width='50px'>No</th>
      <th width='150px'>Tgl Konsultasi</th>
      <th width='150px'>Nama Anak</th>
      <th width='150px'>Alamat</th>
      <th width='150px'>Tgl Lahir</th>
      <th width='150px'>Nama Orang Tua</th>
      <th width='150px'>Pekerjaan Orang Tua</th>
      <th width='150px'>Hasil Analisa</th>
      </tr>
          </thead>
            <tbody>"; 
          $no = 1; 
          while ($data=mysqli_fetch_array($tampil)){
        echo "<tr>
             <td>$no</td>
             <td>$data[tgl_daftar]</td>
         <td>$data[Nama_anak]</td>
         <td>$data[alamat]</td>  
         <td>$data[tgl_lahir]</td>         
         <td>$data[nama_ortu]</td>
         <td>$data[pekerjaan_ortu]</td>
         <td>$data[nm_kecerdasan]</td>
              </tr>";
        $no++;
      }

echo "</table> <br><br>";
$tgl = date('d-m-Y');
echo "<p align ='right'> Medan, $tgl </p>";
?>
</body>
</html>
