<?php   
            
    
      $page=@$_GET['page'];
        if ($page=="konsultasi"){
         if ($_SESSION['level']=='user'){
         include "konsultasifm.php";
        }
        //hanya user yang sudah mendaftar yang bisa masuk halaman mendapatkan hasil konsultasi
        //menampilkan hasil konsultasi berdasarkan id_user
        } elseif ($page=="hasil"){
            if ($_SESSION['level']=='user'){
            include "hasil.php";
        }
      } elseif ($page=="logout"){
            if ($_SESSION['level']=='user'){
            include "logout.php";
        }
}
?>