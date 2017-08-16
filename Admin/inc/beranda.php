<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='http://localhost/Pakar_kecerdasan/index.php?page=home'><button>Silahkan Login</button></a></div>";  
}
else{
  $tgl=date("d-m-Y");
  echo "<h2>Selamat Datang di Halaman Pakar</h2>
        <p>Hai, <b>$_SESSION[namauser]</b> Anda login saat ini pada tanggal <b>$tgl</b>.</p>";
}
?>