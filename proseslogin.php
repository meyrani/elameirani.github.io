<?php
include "librari/koneksi.php"; 

$username = $_POST['username'];
$password = md5($_POST['password']); 
$level    = $_POST['level'];

$query  ="SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
$login  = mysqli_query($koneksi, $query);
$cocok  = mysqli_num_rows($login);
$data   = mysqli_fetch_array($login);

// Apabila username dan password ditemukan (valid)
if ($cocok > 0){
  session_start(); // Untuk memulai session

  // bikin variabel session
  
  if($data['level'] =="1" && $level=="1")
        {
         $_SESSION['id_user'] = $data['id_user'];
         $_SESSION['namauser']= $data['username'];
         $_SESSION['passuser']= $data['password'];
         $_SESSION['level']='pakar';
        header("Location:admin/home.php?page=beranda");
        }
        
        else if($data['level'] =="2" && $level=="2")
        {
          $_SESSION['id_user']= $data['id_user'];
        	$_SESSION['namauser']= $data['username'];
        	$_SESSION['passuser']= $data['password'];
         	$_SESSION['level']='user';
          header("Location:konsultasi/home.php?page=konsultasi");  
        }
}
        else{
    
      echo "<div class ='alert alert-warning'>Data Tidak cocok ! Login Gagal</div>";
    }
	
?>