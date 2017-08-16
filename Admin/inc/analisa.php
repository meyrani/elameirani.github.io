<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='http://localhost/Pakar_kecerdasan/index.php?page=home'><button>Silahkan Login</button></a></div>";  
}

else{

  $proses = "proses_analisa.php";

  $olah = isset($_GET['olah']) ? $_GET['olah'] : ''; 

  switch($olah){

    default:      
  
  echo "<h3>Halaman Hasil Analisa</h3>";
   echo "<p><a href='inc/lappakar.php' target='output' class='btn btn-primary'>
        <span class='glyphicon glyphicon-print'></span> Cetak </a></p>";
  $query="SELECT tb_kecerdasan.*,tb_analisa.*,tb_user.* FROM tb_kecerdasan,tb_analisa,tb_user 
  WHERE tb_kecerdasan.kd_kecerdasan=tb_analisa.kd_kecerdasan AND tb_user.id_user=tb_analisa.id_user ";
  $tampil = mysqli_query($koneksi, $query);
    echo "<table class='table table-striped table-bordered'>
          <thead>
          <tr>
      <th>No</th>
      <th>Tgl Konsultasi</th>
      <th>Nama Anak</th>
      <th>Alamat</th>
      <th>Tgl Lahir</th>
      <th>Nama Orang Tua</th>
      <th>Pekerjaan Orang Tua</th>
      <th>Hasil Analisa</th>
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
      echo "</tbody>
        </table>";
        break;

        case "tambahpengguna":
          echo "<h2>Tambah Pengguna</h2>
          <form class='form-horizontal' method='POST' action='#'>
      
      <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Username</label>
      <div class='col-xs-10'>
      <input type='text' class='form-control' id='inputText' name='username'>
      </div>
      </div>
      
      <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Password</label>
      <div class='col-xs-10'>     
      <input type='text' class='form-control' id='inputText' name='password'>
      </div>
      </div>
      
      <div class='form-group'>
          <label for='inputText' class='col-xs-2'>Nama Lengkap</label>
      <div class='col-xs-10'>
      <input type='text' class='form-control' id='inputText' name='nama_lengkap'>
      </div>
      </div>  
      
      <div class='form-group'>
          <label for='inputText' class='col-xs-2'>E-mail</label>
      <div class='col-xs-10'>
      <input type='text' class='form-control' id='inputText' name='email'>
      </div>
      </div>
      
      
          <div class='col-xs-offset-2'>
      <input type='submit' class='btn btn-success' value='Simpan'> 
      <input type='button' class='btn btn-default' value='Batal' onclick='self.history.back()'>
      </div>
      
          </div>
          </form>";
          break;
      }
  }
      
?>