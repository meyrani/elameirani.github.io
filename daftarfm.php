<?php
echo " <!DOCTYPE html>
 <html lang='en'>
 <head>
 	<meta charset='UTF-8'>
 	<title>form masukan data pasien</title>
 </head>
 <body>
	<div class='row'>
		<div class='col-md-12'>
		<form class='form-horizontal' method='POST' action='?page=daftarsim'>
			<legend align='center'>Form Pendaftaran</legend>	
				<div class='form-group'>
				<label for='inputUsername' class='col-md-3'>Username</label>
				<div class='col-md-9 '>
				<input type='text' class='form-control' name='username' placeholder=''>
				</div>
				</div>

				<div class='form-group'>
				<label for='inputPassword' class='col-md-3'>Password</label>
				<div class='col-md-9'>
				<input type='password'  class='form-control' name='password' placeholder=''>
				</div>
				</div>	


				<div class='form-group'>
				<label for='inputEmail' class='col-md-3'>Email</label>
				<div class='col-md-9'>
				<input type='text' class='form-control' name='email' placeholder=''>
				</div>
				</div>


				<div class='form-group'>
				<label for='inputNama' class='col-md-3'>Nama Anak</label>
				<div class='col-md-9'>
				<input type='text' class='form-control' name='nama' placeholder=''>
				</div>
				</div>
				<div class='col-md-9 col-md-offset-3'>
				<input type='radio' name='jenis_kelamin' value='P' checked> Perempuan
 			    <input type='radio' name='jenis_kelamin' value='L'> Laki-laki
				</div>

				<div class='form-group'>
				<label for='inputTgl' class='col-md-3'>Tanggal Lahir</label>
				<div class='col-md-9'>
				<input type='text' class='form-control' name='tgl' placeholder=''>
				</div>
				</div>

				<div class='form-group'>
				<label for='inputNmOrtu' class='col-md-3'>Nama Orang Tua</label>
				<div class='col-md-9'>
				<input type='text' class='form-control' name='nm_ortu' placeholder=''>
				</div>
				</div>

				<div class='form-group'>
				<label for='inputpkortu' class='col-md-3'>Pekerjaan Orang Tua</label>
				<div class='col-md-9'>
				<input type='text' class='form-control' name='pekerjaan_ortu' placeholder=''>
				</div>
				</div>

				<div class='form-group'>
				<label for='inputTgl' class='col-md-3'>Alamat</label>
				<div class='col-md-9'>
				<input type='text' class='form-control' name='alamat' placeholder=''>
				</div>
				</div>
			<input type='hidden' name='level' value='2'>

		<div class='col-md-offset-3 col-md-6'><br>
			<input type='submit' class='btn btn-primary' value='Simpan'>
			<input type='reset' value='Reset' class='btn btn-default'> 
		</form></br></br>
		</div>
	</div>
</div> 	
 </body>
 </html>";
?>
