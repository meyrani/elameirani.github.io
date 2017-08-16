<?php
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='http://localhost/Pakar_kecerdasan/index.php?page=home'><button>Silahkan Login</button></a></div>";  
}

else{

	$proses = "inc/proses_ciri.php";

	$olah = @$_GET['olah'] ? $_GET['olah'] : ''; 
	$batas = 10;
	$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
	if ( empty( $pg ) ) {
	$posisi = 0;
	$pg = 1;
	} else {
	$posisi = ( $pg - 1 ) * $batas;
	}

	switch($olah){

    default:
	echo "<h3>Halaman Relasi</h3>";
	echo "<p><input type='button' class='btn btn-primary' value='Tambah Relasi' onclick=window.location.href='?page=relasi&olah=tambahrelasi'></p>";
 	$query = "SELECT * FROM tb_relasi ORDER BY kd_ciri limit $posisi, $batas";
 	$tampil = mysqli_query($koneksi, $query);
	$no = 1+$posisi;
	  echo "<div class='table-responsive'>
		  	<table class='table table-striped table-bordered'>
	          <thead>
	          <tr>
			  <th>No</th>
			  <th>Kode Ciri</th>
			  <th>Ciri</th>		 
			  <th>Aksi</th>
			  </tr>
	          </thead>
	            <tbody>"; 
	            while ($data=mysqli_fetch_array($tampil)){
        echo "<tr>
             <td>$no</td>
             <td>$data[kd_kecerdasan]</td>
             <td>$data[kd_ciri]</td>
             <td><a href='?page=ciri&olah=editciri&id=$data[kd_ciri]'>Edit</a> | 
					<a href='$proses?page=ciri&olah=hapus&id=$data[kd_ciri]'>Hapus</td>
		          </tr>";
        $no++;
      	}
      	?>
      	<?php
      		//hitung jumlah data
      		$query1 ="SELECT * FROM tb_relasi";
      		$tampil1 = mysqli_query($koneksi, $query1);
			$jml_data = mysqli_num_rows($tampil1);
			//Jumlah halaman
			$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
			//Navigasi ke sebelumnya
			if ( $pg > 1 ) {
			$link = $pg - 1;
			$prev ="<a href='?page=relasi&pg=$link'>Sebelumnya </a>";
			} else {
			$prev = "Sebelumnya ";
			}
			 
			//Navigasi nomor
			$nmr = '';
			for ( $i = 1; $i<= $JmlHalaman; $i++ ){
			 
			if ( $i == $pg ) {
			$nmr .= $i . " ";
			} else {
			$nmr .= "<a href='?page=relasi&pg=$i'>$i</a> ";
			}
			}
			 
			//Navigasi ke selanjutnya
			if ( $pg < $JmlHalaman ) {
			$link = $pg + 1;
			$next = " <a href='?page=relasi&pg=$link'>Selanjutnya</a>";
			} else {
			$next = " Selanjutnya";
			}
			 
//Tampilkan navigasi

echo "total data Anda: $jml_data"; 

      echo "</tbody>
        </table>
        <ul class='pagination'>
        	  <li>$prev</li>
			  <li>$nmr</li>
			  <li>$next</li>
			</ul>
			        </div>";
        break;

        case "tambahrelasi":
          echo "<h3>Tambah Relasi</h3>
          <form class='form-horizontal' method='POST' action='$proses?page=relasi&olah=input'>
		  
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Kode Kecerdasan</label>
		  <div class='col-xs-10'>
		  <input type='text' class='form-control' id='inputText' name='kd_kecerdasan'>
		  </div>
		  </div>
		  
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Kode Ciri</label>
		  <div class='col-xs-10'>     
		  <input type='text' class='form-control' id='inputText' name='kd_ciri'>
		  </div>
		  </div>	

		  		    
          <div class='col-xs-offset-2'>
		  <input type='submit' class='btn btn-success' value='Simpan'> 
		  <input type='button' class='btn btn-default' value='Batal' onclick='self.history.back()'>
		  </div>
		  
          </div>
          </form>";
          break;
         case "editciri":
		      $query = "SELECT * FROM tb_relasi WHERE kd_ciri='$_GET[id]'";
		      $hasil = mysqli_query($koneksi, $query);
		      $data  = mysqli_fetch_array($hasil);

		  echo "<h3>Edit Ciri</h3>
          <form class='form-horizontal' method='POST' action='$proses?page=relasi&olah=edit'>		 
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Kode Kecerdasan</label>
		  <div class='col-xs-10'>
		  <input type='text' class='form-control' id='inputText' name='kd_kecerdasan' value='$data[kd_ciri]'>
		  </div>
		  </div>
		  
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Kode Ciri</label>
		  <div class='col-xs-10'>     
		  <input type='text' class='form-control' id='inputText' name='ciri' value='$data[ciri]'>
		  </div>
		  </div> 
		    
          <div class='col-xs-offset-2'>
		  <input type='submit' class='btn btn-success' value='Simpan'> 
		  <input type='button' class='btn btn-default' value='Batal' onclick='self.history.back()'>
		  </div>
		  
          </div>
          </form>";
    }
}
 ?>