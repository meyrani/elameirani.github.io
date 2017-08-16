<?php  

if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='http://localhost/Pakar_kecerdasan/index.php?page=home'><button>Silahkan Login</button></a></div>";  
}
else{ 
    $id_user    = $_SESSION['id_user'];
    $proses = "proseskonsultasi.php";
    include "../librari/koneksi.php";
    $sqlp= "SELECT * FROM tb_ciri ORDER BY kd_ciri";
    $qryp= mysqli_query($koneksi, $sqlp);   
    
        
         
       echo "
       <form action='$proses?page=konsultasi&olah=konsulcek' method='POST' role='form'>
         <legend>Beri tanda Ceklist pada pertanyaan berikut yang memiliki jawaban <b>Ya</b></legend>";
       while ($datap= mysqli_fetch_array($qryp)) {
         echo "<div class='checkbox'>
           <label>
               <input name='cekciri[]' type='checkbox' value='$datap[kd_ciri]'>
        apakah anak $datap[ciri]
       </label>";
         }
       
       echo "</br>
       </br> <input type='submit' class='btn btn-primary'value='Proses'>
       <input type='reset' value='batal' class='btn btn-default'>
       </form>
       </label>
       ";
      
  } 

 ?>
 