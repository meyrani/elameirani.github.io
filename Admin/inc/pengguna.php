<?php 
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='http://localhost/Pakar_kecerdasan/index.php?page=home'><button>Silahkan Login</button></a></div>";  
}

else{

	$proses = "inc/prosespenggunjung.php";
	$olah = @($_GET['olah']); 	

	switch($olah){

    default:
	echo "<h3>Halaman Data Pengguna</h3>";
	 $query="SELECT * FROM tb_user ORDER BY id_user";
	  $tampil = mysqli_query($koneksi, $query);
	  echo "<table class='table table-striped table-bordered'>
          <thead>
          <tr>
		  <th>No</th>
		  <th>Nama Lengkap</th>
		  <th>Tanggal Lahir</th>
		  <th>Nama Orang Tua</th>
		  <th>Alamat</th>
		  <th>Aksi</th>
		  </tr>
          </thead>
            <tbody>"; 
           $no = 1;
      		while ($data=mysqli_fetch_array($tampil)){
        echo "<tr>
             <td>$no</td>
             <td>$data[Nama_anak]</td>
		     <td>$data[tgl_lahir]</td>
		     <td>$data[nama_ortu]</td>		     
		     <td>$data[alamat]</td>
		     <td><a href='$proses?page=Penggunjung&olah=hapus&id=$data[id_user]'>Hapus</td>
		          </tr>";
		          $no++;
		      }
      
      echo "</tbody>
        </table>
        ";
     
    }
  }
      
?>