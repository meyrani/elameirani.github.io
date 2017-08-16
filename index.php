<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link type="text/css" href="css/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link type="text/css" href="css/js/bootstrap.min.css" rel="stylesheet" media="screen">
	<link type="text/css" href="css/pakar.css" rel="stylesheet" media="screen">	 
	<title>SISTEM PAKAR KECERDASAN</title>
	<script src="css/bootstrap/js/jquery.min.js"></script>
  	<script src="css/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-lg-12">
			<header>
				<h1 class="title-site">Pakar Kecerdasan</h1>
				<p class= "description">Aplikasi ini dibuat untuk mengetahui jenis kecerdasan anak</p>
			</header>
			<!--menu-->
			<div class="menu">
			<ul class="nav nav-pills">
			  <li><a href="?page=home">Home</a></li>
			  <li><a href="?page=pendaftaran">Pendaftaran</a></li>
			  <li><a href="?page=info">Petunjuk </a></li>
			  <li><a href="?page=contact">Contact </a></li>
			</ul>
			</div>
		</div>
		<!-- content-->
		<div class="col-lg-9">
		<div class="box content">
			<?php 
			include "isi_pengguna.php";
			 ?>
			</div>
		</div>
		<!--sidebar-->
		<div class="col-lg-3">
		<div class="box content">
		<form class='form-vertikal' action='?page=logincek' method='POST' role='form'>
			<legend align='center'>Login</legend>	
				<div class="form-group">
				<input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
			</div>
					<div class="form-group">
						<select name="level" class="form-control" required>
							<option value="">Pilih Level User</option>
							<option value="1">Pakar</option>
							<option value="2">User</option>
						</select>
					</div>
			<input type="submit" class="btn btn-primary btn-block" value="Login">
			</div>
		</div>
	</form>
		<div class="col-lg-12">
		<footer class="copyright text-center">Copyright &copy 2017 by Ela Meirani</footer>
		</div>
		</div>
	</div>
</body>
</html>