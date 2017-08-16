<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<h1>ERROR!!! <br> <br> Maaf untuk mengakses halaman ini, Anda harus login dulu. <br> <br> Klik tombol di bawah ini</h1>
        <a href='../index.php?page=home'><button>Silahkan Login</button></a></div>";  
}
else{$tgl=date("d-m-Y");
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link type="text/css" href="../css/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link type="text/css" href="../css/js/bootstrap.min.css" rel="stylesheet" media="screen">
	<link type="text/css" href="../css/pakar.css" rel="stylesheet" media="screen">	 
	<title>SISTEM PAKAR KECERDASAN</title>
	<script src="../css/bootstrap/js/jquery.min.js"></script>
  	<script src="../css/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-lg-12">
<nav class="nav menu">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" style="color:#fff;" href="#">Halaman Konsultasi</a>
      </div>
       <ul class="nav navbar-nav navbar-right">
      <li><a href="?page=logout"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
    </ul>
  </nav>
		
		<!-- content-->
	<div class="row">
	<div class="col-lg-12">
	<div class="box box content">
	  <?php
          include "inc.konsultasi.php";
          ?>
		</div>
	</div>
		<div class="col-lg-12">
		<footer class="copyright text-center">Copyright &copy 2017 by Ela Meirani</footer>
		</div>
		</div>
	</div>
</body>
</html>
<?php } ?>
<?php } ?>