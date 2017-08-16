<?php

   $page= @$_GET['page'];
            //halaman utama
            if($page=="home"){
                include "home_pengunjung.php";
                //masuk halaman pendaftaran untuk mendapatkan hak akses sbg user
              } elseif ($page=="pendaftaran"){
                include "daftarfm.php";
              } elseif ($page=="daftarsim"){
                include "prosesdaftar.php";
                //login
              } elseif ($page=="logincek"){
                include "proseslogin.php";
              } elseif ($page=="info"){
                echo "ini halaman petunjuk";
                //semua user dapat mengakses halaman artikel
              } elseif ($page=="artikel"){
                echo "ini halaman artikel";
                //semua user dapat mengakses halaman contact
                } elseif ($page =="contact"){
                echo "ini halaman contact";
              } 
 ?>