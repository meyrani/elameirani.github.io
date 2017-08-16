<?php              
      include "../librari/koneksi.php";
          $page=@$_GET['page'];
          //halaman beranda admin
            if($page=="beranda"){
              if ($_SESSION['level']=='pakar'){
                include "inc/beranda.php";
            } 
          } 
          //halaman atur pengguna
          elseif ($page=="pengguna"){
            if ($_SESSION['level']=='pakar'){
                include "inc/pengguna.php";
              }
            }
            //halaman atur kecerdasan
               elseif ($page=="kecerdasan"){
                if ($_SESSION['level']=='pakar'){
                include "inc/kecerdasan.php";
                }
              }
              //halaman atur ciri
               elseif ($page =="ciri"){
                if ($_SESSION['level']=='pakar'){
                include "inc/ciri.php";
                }
              } 
              //halaman Atur relasi
              elseif ($page =="relasi"){
                if ($_SESSION['level']=='pakar'){
                include "inc/relasi.php";
               }
              } 
              //halaman atur analisa
              elseif ($page =="hasil_analisa"){
                if ($_SESSION['level']=='pakar'){
                include "inc/analisa.php";
                }
              } 
              //halaman atur artikel
              elseif ($page =="artikel"){
                if ($_SESSION['level']=='pakar'){
                include "inc/artikel.php";
              }
            }
            
?>