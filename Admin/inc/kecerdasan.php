<?php 
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='http://localhost/Pakar_kecerdasan/index.php?page=home'><button>Silahkan Login</button></a></div>";  
}

else{
	$proses = "inc/proses_kecerdasan.php";

	$olah = @$_GET['olah'] ? $_GET['olah'] : ''; 

	switch($olah){

    default:
	echo "<h3>Halaman Kecerdasan</h3>";
	echo "<p><input type='button' class='btn btn-primary' value='Tambah Kecerdasan' onclick=window.location.href='?page=kecerdasan&olah=tambahkecerdasan'></p>";
 	$query="SELECT * FROM tb_kecerdasan ORDER BY kd_kecerdasan";
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
	      		while ($data=mysqli_fetch_array($tampil)){
        echo "<tr>
             <td>$no</td>
             <td>$data[kd_kecerdasan]</td>
             <td>$data[nm_kecerdasan]</td>
             <td><a href='?page=kecerdasan&olah=editkecerdasan&id=$data[kd_kecerdasan]'>Edit</a> | 
					<a href='$proses?page=kecerdasan&olah=hapus&id=$data[kd_kecerdasan]'>Hapus</td>
		          </tr>";
        $no++;
      }
      echo "</tbody>
        </table>
        </div>";
        break;

        case "tambahkecerdasan":
          echo "<h3>Tambah Kecerdasan</h3>
          <form class='form-horizontal' method='POST' action='$proses?page=kecerdasan&olah=input'>
		  
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Kode Kecerdasan</label>
		  <div class='col-xs-10'>
		  <input type='text' class='form-control' id='inputText' name='kd_kecerdasan'>
		  </div>
		  </div>
		  
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Jenis Kecerdasan</label>
		  <div class='col-xs-10'>     
		  <input type='text' class='form-control' id='inputText' name='nm_kecerdasan'>
		  </div>
		  </div>	

		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Definisi</label>
		  <div class='col-xs-10'> 
		  <textarea name='definisi' id='definisi' class='form-control' rows='3' required='required'></textarea>    
		  </div>
		  </div>

		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Saran Sekolah</label>
		  <div class='col-xs-10'>     
		  <textarea name='saran_sekolah' id='saran_sekolah' class='form-control' rows='3' required='required'></textarea>
		  </div>
		  </div>	

		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Pilihan Karir</label>
		  <div class='col-xs-10'>  
		  <textarea name='pilihan_karir' id='Pilihan_karir' class='form-control' rows='3' required='required'></textarea>  		  
		  </div>
		  </div>  
		    
          <div class='col-xs-offset-2'>
		  <input type='submit' class='btn btn-success' value='Simpan'> 
		  <input type='button' class='btn btn-default' value='Batal' onclick='self.history.back()'>
		  </div>
		  
          </div>
          </form>";
          break;
         case "editkecerdasan":
		      $query = "SELECT * FROM tb_kecerdasan WHERE kd_kecerdasan='$_GET[id]'";
		      $hasil = mysqli_query($koneksi, $query);
		      $data  = mysqli_fetch_array($hasil);

		  echo "<h3>Edit Kecerdasan</h3>
          <form class='form-horizontal' method='POST' action='$proses?page=kecerdasan&olah=edit'>		 
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Kode Kecerdasan</label>
		  <div class='col-xs-10'>
		  <input type='text' class='form-control' id='inputText' name='kd_kecerdasan' value='$data[kd_kecerdasan]'>
		  </div>
		  </div>
		  
		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Jenis Kecerdasan</label>
		  <div class='col-xs-10'>     
		  <input type='text' class='form-control' id='inputText' name='nm_kecerdasan' value='$data[nm_kecerdasan]'>
		  </div>
		  </div>

		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Definisi</label>
		  <div class='col-xs-10'> 
		  <textarea name='definisi' id='definisi' class='form-control' rows='3' required='required'>$data[definisi]</textarea>    
		  </div>
		  </div>

		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Saran Sekolah</label>
		  <div class='col-xs-10'>     
		  <textarea name='saran_sekolah' id='saran_sekolah' class='form-control' rows='3' required='required'>$data[saran_sekolah]</textarea>
		  </div>
		  </div>	

		  <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Pilihan Karir</label>
		  <div class='col-xs-10'>  
		  <textarea name='pilihan_karir' id='Pilihan_karir' class='form-control' rows='3' required='required'>$data[pilihan_karir]</textarea>  		  
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